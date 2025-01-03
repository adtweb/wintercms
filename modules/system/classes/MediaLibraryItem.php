<?php

namespace System\Classes;

use Carbon\Carbon;
use Config;
use File;
use Winter\Storm\Filesystem\Definitions as FileDefinitions;

/**
 * Represents a file or folder in the Media Library.
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class MediaLibraryItem
{
    const TYPE_FILE = 'file';

    const TYPE_FOLDER = 'folder';

    const FILE_TYPE_IMAGE = 'image';

    const FILE_TYPE_VIDEO = 'video';

    const FILE_TYPE_AUDIO = 'audio';

    const FILE_TYPE_DOCUMENT = 'document';

    /**
     * @var string Specifies the item path relative to the Library root.
     */
    public $path;

    /**
     * @var int Specifies the item size.
     *          For files the item size is measured in bytes. For folders it
     *          contains the number of files in the folder.
     */
    public $size;

    /**
     * @var int Contains the last modification time (Unix timestamp).
     */
    public $lastModified;

    /**
     * @var string Specifies the item type.
     */
    public $type;

    /**
     * @var string Specifies the public URL of the item.
     */
    public $publicUrl;

    /**
     * @var array Contains a default list of image files and directories to ignore.
     *            Override with config: cms.storage.media.imageExtensions
     */
    protected static $imageExtensions;

    /**
     * @var array Contains a default list of video files and directories to ignore.
     *            Override with config: cms.storage.media.videoExtensions
     */
    protected static $videoExtensions;

    /**
     * @var array Contains a default list of audio files and directories to ignore.
     *            Override with config: cms.storage.media.audioExtensions
     */
    protected static $audioExtensions;

    /**
     * @param  string  $path
     * @param  int  $size
     * @param  int  $lastModified
     * @param  string  $type
     * @param  string  $publicUrl
     */
    public function __construct($path, $size, $lastModified, $type, $publicUrl)
    {
        $this->path = $path;
        $this->size = $size;
        $this->lastModified = $lastModified;
        $this->type = $type;
        $this->publicUrl = $publicUrl;
    }

    /**
     * @return bool
     */
    public function isFile()
    {
        return $this->type == self::TYPE_FILE;
    }

    /**
     * Returns the file type by its name.
     * The known file types are: image, video, audio, document
     *
     * @return string Returns the file type or NULL if the item is a folder.
     */
    public function getFileType()
    {
        if (! $this->isFile()) {
            return null;
        }

        if (! self::$imageExtensions) {
            self::$imageExtensions = array_map('strtolower', Config::get('cms.storage.media.imageExtensions', FileDefinitions::get('imageExtensions')));
            self::$videoExtensions = array_map('strtolower', Config::get('cms.storage.media.videoExtensions', FileDefinitions::get('videoExtensions')));
            self::$audioExtensions = array_map('strtolower', Config::get('cms.storage.media.audioExtensions', FileDefinitions::get('audioExtensions')));
        }

        $extension = strtolower(pathinfo($this->path, PATHINFO_EXTENSION));
        if (! strlen($extension)) {
            return self::FILE_TYPE_DOCUMENT;
        }

        if (in_array($extension, self::$imageExtensions)) {
            return self::FILE_TYPE_IMAGE;
        }

        if (in_array($extension, self::$videoExtensions)) {
            return self::FILE_TYPE_VIDEO;
        }

        if (in_array($extension, self::$audioExtensions)) {
            return self::FILE_TYPE_AUDIO;
        }

        return self::FILE_TYPE_DOCUMENT;
    }

    /**
     * Returns the item size as string.
     * For file-type items the size is the number of bytes. For folder-type items
     * the size is the number of items contained by the item.
     *
     * @return string Returns the size as string.
     */
    public function sizeToString()
    {
        return $this->type == self::TYPE_FILE
            ? File::sizeToString($this->size)
            : $this->size.' '.trans_choice('system::lang.media.folder_size_items', $this->size);
    }

    /**
     * Returns the item last modification date as string.
     *
     * @return string Returns the item's last modification date as string.
     */
    public function lastModifiedAsString()
    {
        if (! ($date = $this->lastModified)) {
            return null;
        }

        return Carbon::createFromTimestamp($date)->toFormattedDateString();
    }
}
