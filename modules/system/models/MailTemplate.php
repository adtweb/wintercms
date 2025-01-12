<?php

namespace System\Models;

use File as FileHelper;
use Model;
use System\Classes\MailManager;
use View;
use Winter\Storm\Mail\MailParser;

/**
 * Mail template
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class MailTemplate extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    protected $table = 'system_mail_templates';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'code' => 'required|unique:system_mail_templates',
        'subject' => 'required',
        'description' => 'required',
        'content_html' => 'required',
    ];

    public $belongsTo = [
        'layout' => MailLayout::class,
    ];

    /**
     * Returns an array of template codes and descriptions.
     *
     * @return array
     */
    public static function listAllTemplates()
    {
        $fileTemplates = (array) MailManager::instance()->listRegisteredTemplates();
        $dbTemplates = (array) self::lists('code', 'code');
        $templates = $fileTemplates + $dbTemplates;
        ksort($templates);

        return $templates;
    }

    /**
     * Returns a list of all mail templates.
     *
     * @return array Returns an array of the MailTemplate objects.
     */
    public static function allTemplates()
    {
        $result = [];
        $codes = array_keys(self::listAllTemplates());

        foreach ($codes as $code) {
            if (View::exists($code)) {
                $result[] = self::findOrMakeTemplate($code);
            }
        }

        return $result;
    }

    /**
     * Syncronise all file templates to the database.
     *
     * @return void
     */
    public static function syncAll()
    {
        MailLayout::createLayouts();
        MailPartial::createPartials();

        $templates = MailManager::instance()->listRegisteredTemplates();
        $dbTemplates = self::lists('is_custom', 'code');
        $newTemplates = array_diff_key($templates, $dbTemplates);

        /*
         * Clean up non-customized templates
         */
        foreach ($dbTemplates as $code => $isCustom) {
            if ($isCustom) {
                continue;
            }

            if (! array_key_exists($code, $templates)) {
                self::whereCode($code)->delete();
            }
        }

        /*
         * Create new templates
         */
        foreach ($newTemplates as $code) {
            $sections = self::getTemplateSections($code);
            $layoutCode = array_get($sections, 'settings.layout', 'default');
            $description = array_get($sections, 'settings.description');

            $template = self::make();
            $template->code = $code;
            $template->description = $description;
            $template->is_custom = 0;
            $template->layout_id = MailLayout::getIdFromCode($layoutCode);
            $template->forceSave();
        }
    }

    /**
     * Fired after the model has been fetched.
     *
     * @return void
     */
    public function afterFetch()
    {
        if (! $this->is_custom) {
            $this->fillFromView($this->code);
        }
    }

    /**
     * Fill model using provided content.
     *
     * @param  string  $content
     * @return void
     */
    public function fillFromContent($content)
    {
        $this->fillFromSections(MailParser::parse($content));
    }

    /**
     * Fill model using a view file path.
     *
     * @param  string  $path
     * @return void
     */
    public function fillFromView($path)
    {
        $this->fillFromSections(self::getTemplateSections($path));
    }

    /**
     * Fill model using provided section array.
     *
     * @param  array  $sections
     * @return void
     */
    protected function fillFromSections($sections)
    {
        $this->content_html = array_get($sections, 'html');
        $this->content_text = array_get($sections, 'text');
        $this->subject = array_get($sections, 'settings.subject', 'No subject');

        $layoutCode = array_get($sections, 'settings.layout', 'default');
        $this->layout = MailLayout::findOrMakeLayout($layoutCode);
    }

    /**
     * Get section array from a view file retrieved by code.
     *
     * @param  string  $code
     * @return array|null
     */
    protected static function getTemplateSections($code)
    {
        if (! View::exists($code)) {
            return null;
        }
        $view = View::make($code);

        return MailParser::parse(FileHelper::get($view->getPath()));
    }

    /**
     * Find a MailTemplate record by code or create one from a view file.
     *
     * @param  string  $code
     * @return MailTemplate model
     */
    public static function findOrMakeTemplate($code)
    {
        $template = self::whereCode($code)->first();

        if (! $template && View::exists($code)) {
            $template = new self;
            $template->code = $code;
            $template->fillFromView($code);
        }

        return $template;
    }

    /**
     * @deprecated see System\Classes\MailManager::registerCallback
     * Remove if year >= 2019
     */
    public static function registerCallback(callable $callback)
    {
        traceLog('MailTemplate::registerCallback is deprecated, use '.MailManager::class.'::registerCallback instead');
        MailManager::instance()->registerCallback($callback);
    }
}
