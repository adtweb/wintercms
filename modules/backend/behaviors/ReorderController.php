<?php

namespace Backend\Behaviors;

use ApplicationException;
use Backend;
use Backend\Classes\ControllerBehavior;
use Lang;

/**
 * Used for reordering and sorting records.
 *
 * This behavior is implemented in the controller like so:
 *
 *     public $implement = [
 *         \Backend\Behaviors\ReorderController::class,
 *     ];
 *
 *     public $reorderConfig = 'config_reorder.yaml';
 *
 * The `$reorderConfig` property makes reference to the configuration
 * values as either a YAML file, located in the controller view directory,
 * or directly as a PHP array.
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class ReorderController extends ControllerBehavior
{
    /**
     * @var array Configuration values that must exist when applying the primary config file.
     */
    protected $requiredConfig = ['modelClass'];

    /**
     * @var array Visible actions in context of the controller
     */
    protected $actions = ['reorder'];

    /**
     * @var Model Import model
     */
    public $model;

    /**
     * @var string Model attribute to use for the display name
     */
    public $nameFrom = 'name';

    /**
     * @var bool Display parent/child relationships in the list.
     */
    protected $showTree = false;

    /**
     * @var string Reordering mode:
     *             - simple: Winter\Storm\Database\Traits\Sortable
     *             - nested: Winter\Storm\Database\Traits\NestedTree
     */
    protected $sortMode;

    /**
     * @var Backend\Classes\WidgetBase Reference to the widget used for the toolbar.
     */
    protected $toolbarWidget;

    /**
     * @var mixed Configuration for this behaviour
     */
    public $reorderConfig = 'config_reorder.yaml';

    /**
     * Behavior constructor
     *
     * @param  Backend\Classes\Controller  $controller
     */
    public function __construct($controller)
    {
        parent::__construct($controller);

        /*
         * Build configuration
         */
        $this->config = $this->makeConfig($controller->reorderConfig ?: $this->reorderConfig, $this->requiredConfig);

        /*
         * Widgets
         */
        if ($this->toolbarWidget = $this->makeToolbarWidget()) {
            $this->toolbarWidget->bindToController();
        }

        /*
         * Populate from config
         */
        $this->nameFrom = $this->getConfig('nameFrom', $this->nameFrom);
    }

    //
    // Controller actions
    //

    public function reorder()
    {
        $this->addJs('js/winter.reorder.js', 'core');

        $this->controller->pageTitle = $this->controller->pageTitle
            ?: Lang::get($this->getConfig('title', 'backend::lang.reorder.default_title'));

        $this->validateModel();
        $this->prepareVars();
    }

    //
    // AJAX
    //

    public function onReorder()
    {
        $model = $this->validateModel();

        /*
         * Simple
         */
        if ($this->sortMode == 'simple') {
            if (
                (! $ids = post('record_ids')) ||
                (! $orders = post('sort_orders'))
            ) {
                return;
            }

            $model->setSortableOrder($ids, $orders);
        }
        /*
         * Nested set
         */
        elseif ($this->sortMode == 'nested') {
            $sourceNode = $model->find(post('sourceNode'));
            $targetNode = post('targetNode') ? $model->find(post('targetNode')) : null;

            if ($sourceNode == $targetNode) {
                return;
            }

            switch (post('position')) {
                case 'before':
                    $sourceNode->moveBefore($targetNode);
                    break;

                case 'after':
                    $sourceNode->moveAfter($targetNode);
                    break;

                case 'child':
                    $sourceNode->makeChildOf($targetNode);
                    break;

                default:
                    $sourceNode->makeRoot();
                    break;
            }
        }
    }

    //
    // Reordering
    //

    /**
     * Prepares common form data
     */
    protected function prepareVars()
    {
        $this->vars['reorderRecords'] = $this->getRecords();
        $this->vars['reorderModel'] = $this->model;
        $this->vars['reorderSortMode'] = $this->sortMode;
        $this->vars['reorderShowTree'] = $this->showTree;
        $this->vars['reorderToolbarWidget'] = $this->toolbarWidget;
    }

    public function reorderRender()
    {
        return $this->reorderMakePartial('container');
    }

    public function reorderGetModel()
    {
        if ($this->model !== null) {
            return $this->model;
        }

        $modelClass = $this->getConfig('modelClass');

        if (! $modelClass) {
            throw new ApplicationException('Please specify the modelClass property for reordering');
        }

        return $this->model = new $modelClass;
    }

    /**
     * Returns the display name for a record.
     *
     * @return string
     */
    public function reorderGetRecordName($record)
    {
        return $record->{$this->nameFrom};
    }

    /**
     * Validate the supplied form model.
     *
     * @return void
     */
    protected function validateModel()
    {
        $model = $this->controller->reorderGetModel();
        $modelTraits = class_uses($model);

        if (
            isset($modelTraits[\Winter\Storm\Database\Traits\Sortable::class]) ||
            $model->isClassExtendedWith(\Winter\Storm\Database\Behaviors\Sortable::class) ||
            isset($modelTraits[\October\Rain\Database\Traits\Sortable::class]) ||
            $model->isClassExtendedWith(\October\Rain\Database\Behaviors\Sortable::class)
        ) {
            $this->sortMode = 'simple';
        } elseif (
            isset($modelTraits[\Winter\Storm\Database\Traits\NestedTree::class]) ||
            isset($modelTraits[\October\Rain\Database\Traits\NestedTree::class])
        ) {
            $this->sortMode = 'nested';
            $this->showTree = true;
        } else {
            throw new ApplicationException('The model must implement the Sortable trait/behavior or the NestedTree trait.');
        }

        return $model;
    }

    /**
     * Returns all the records from the supplied model.
     *
     * @return Collection
     */
    protected function getRecords()
    {
        $records = null;
        $model = $this->controller->reorderGetModel();
        $query = $model->newQuery();

        $this->controller->reorderExtendQuery($query);

        if ($this->sortMode == 'simple') {
            $records = $query
                ->orderBy($model->getSortOrderColumn())
                ->get();
        } elseif ($this->sortMode == 'nested') {
            $records = $query->getNested();
        }

        return $records;
    }

    /**
     * Extend the query used for finding reorder records. Extra conditions
     * can be applied to the query, for example, $query->withTrashed();
     *
     * @param  Winter\Storm\Database\Builder  $query
     * @return void
     */
    public function reorderExtendQuery($query) {}

    //
    // Widgets
    //

    protected function makeToolbarWidget()
    {
        if ($toolbarConfig = $this->getConfig('toolbar')) {
            $toolbarConfig = $this->makeConfig($toolbarConfig);
            $toolbarWidget = $this->makeWidget('Backend\Widgets\Toolbar', $toolbarConfig);
        } else {
            $toolbarWidget = null;
        }

        return $toolbarWidget;
    }

    //
    // Helpers
    //

    /**
     * Controller accessor for making partials within this behavior.
     *
     * @param  string  $partial
     * @param  array  $params
     * @return string Partial contents
     */
    public function reorderMakePartial($partial, $params = [])
    {
        $contents = $this->controller->makePartial(
            'reorder_'.$partial,
            $params + $this->vars,
            false
        );

        if (! $contents) {
            $contents = $this->makePartial($partial, $params);
        }

        return $contents;
    }
}
