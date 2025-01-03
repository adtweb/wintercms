<?php

namespace System\Models;

use Backend\Controllers\Files;
use Config;
use Storage;
use Url;
use Winter\Storm\Database\Attach\File as FileBase;

/**
 * File attachment model
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class File extends FileBase
{
    /**
     * @var string The database table used by the model.
     */
    protected $table = 'system_files';

    /**
     * {@inheritDoc}
     */
    public function getThumb($width, $height, $options = [])
    {
        $url = '';
        $width = ! empty($width) ? $width : 0;
        $height = ! empty($height) ? $height : 0;

        if (! $this->isPublic() && class_exists(Files::class)) {
            $options = $this->getDefaultThumbOptions($options);
            // Ensure that the thumb exists first
            parent::getThumb($width, $height, $options);

            // Return the Files controller handler for the URL
            $url = Files::getThumbUrl($this, $width, $height, $options);
        } else {
            $url = parent::getThumb($width, $height, $options);
        }

        return $url;
    }

    /**
     * {@inheritDoc}
     */
    public function getPath($fileName = null)
    {
        $url = '';
        if (! $this->isPublic() && class_exists(Files::class)) {
            $url = Files::getDownloadUrl($this);
        } else {
            $url = parent::getPath($fileName);
        }

        return $url;
    }

    /**
     * Define the public address for the storage path.
     */
    public function getPublicPath()
    {
        $uploadsPath = Config::get('cms.storage.uploads.path', '/storage/app/uploads');

        if ($this->isPublic()) {
            $uploadsPath .= '/public';
        } else {
            $uploadsPath .= '/protected';
        }

        return Url::asset($uploadsPath).'/';
    }

    /**
     * Define the internal storage path.
     */
    public function getStorageDirectory()
    {
        $uploadsFolder = Config::get('cms.storage.uploads.folder');

        if ($this->isPublic()) {
            return $uploadsFolder.'/public/';
        }

        return $uploadsFolder.'/protected/';
    }

    /**
     * Returns the storage disk the file is stored on
     *
     * @return FilesystemAdapter
     */
    public function getDisk()
    {
        return Storage::disk(Config::get('cms.storage.uploads.disk'));
    }
}
