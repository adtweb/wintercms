<?php

namespace System\Classes;

use ApplicationException;
use Cache;
use Config;
use Illuminate\Filesystem\FilesystemAdapter;
use Lang;
use Storage;
use SystemException;
use Url;
use Winter\Storm\Filesystem\Definitions as FileDefinitions;
use Winter\Storm\Support\Str;
use Winter\Storm\Support\Svg;

/**
 * Provides abstraction level for the Media Library operations.
 * Implements the library caching features and security checks.
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class MediaLibrary
{
    use \Winter\Storm\Support\Traits\Singleton;

    const SORT_BY_TITLE = 'title';

    const SORT_BY_SIZE = 'size';

    const SORT_BY_MODIFIED = 'modified';

    const SORT_DIRECTION_ASC = 'asc';

    const SORT_DIRECTION_DESC = 'desc';

    /**
     * @var string Cache key
     */
    protected $cacheKey = 'system-media-library-contents';

    /**
     * @var string Relative or absolute URL of the Library root folder.
     */
    protected $storagePath;

    /**
     * @var string The root Library folder path.
     */
    protected $storageFolder;

    /**
     * @var mixed A reference to the Media Library disk.
     */
    protected $storageDisk;

    /**
     * @var array Contains a list of files and directories to ignore.
     *            The list can be customized with cms.storage.media.ignore configuration option.
     */
    protected $ignoreNames;

    /**
     * @var array Contains a list of regex patterns to ignore in files and directories.
     *            The list can be customized with cms.storage.media.ignorePatterns configuration option.
     */
    protected $ignorePatterns;

    /**
     * @var int Cache for the storage folder name length.
     */
    protected $storageFolderNameLength;

    /**
     * Initialize this singleton.
     */
    protected function init()
    {
        $this->storageFolder = self::validatePath(Config::get('cms.storage.media.folder', 'media'), true);
        $this->storagePath = rtrim(Config::get('cms.storage.media.path', '/storage/app/media'), '/');

        $this->ignoreNames = Config::get('cms.storage.media.ignore', FileDefinitions::get('ignoreFiles'));

        $this->ignorePatterns = Config::get('cms.storage.media.ignorePatterns', ['^\..*']);

        $this->storageFolderNameLength = strlen($this->storageFolder);
    }

    /**
     * Set the cache key
     *
     * @param  string  $cacheKey  The key to set as the cache key for this instance
     */
    public function setCacheKey($cacheKey)
    {
        $this->cacheKey = $cacheKey;
    }

    /**
     * Get the cache key
     *
     * @return string The cache key to set as the cache key for this instance
     */
    public function getCacheKey()
    {
        return $this->cacheKey;
    }

    /**
     * Returns a list of folders and files in a Library folder.
     *
     * @param  string  $folder  Specifies the folder path relative the the Library root.
     * @param  mixed  $sortBy  Determines the sorting preference.
     *                         Supported values are 'title', 'size', 'lastModified' (see SORT_BY_XXX class constants), FALSE (to disable sorting), or an associative array with a 'by' key and a 'direction' key: ['by' => SORT_BY_XXX, 'direction' => SORT_DIRECTION_XXX].
     * @param  string  $filter  Determines the document type filtering preference.
     *                          Supported values are 'image', 'video', 'audio', 'document' (see FILE_TYPE_XXX constants of MediaLibraryItem class).
     * @param  bool  $ignoreFolders  Determines whether folders should be suppressed in the result list.
     * @return array Returns an array of MediaLibraryItem objects.
     */
    public function listFolderContents($folder = '/', $sortBy = 'title', $filter = null, $ignoreFolders = false)
    {
        $folder = self::validatePath($folder);
        $fullFolderPath = $this->getMediaPath($folder);

        /*
         * Try to load the contents from cache
         */

        $cached = Cache::get($this->cacheKey, false);
        $cached = $cached ? @unserialize(@base64_decode($cached)) : [];

        if (! is_array($cached)) {
            $cached = [];
        }

        if (array_key_exists($fullFolderPath, $cached)) {
            $folderContents = $cached[$fullFolderPath];
        } else {
            $folderContents = $this->scanFolderContents($fullFolderPath);

            $cached[$fullFolderPath] = $folderContents;
            $expiresAt = now()->addMinutes(Config::get('cms.storage.media.ttl', 10));
            Cache::put(
                $this->cacheKey,
                base64_encode(serialize($cached)),
                $expiresAt
            );
        }

        /*
         * Sort the result and combine the file and folder lists
         */

        if ($sortBy !== false) {
            $this->sortItemList($folderContents['files'], $sortBy);
            $this->sortItemList($folderContents['folders'], $sortBy);
        }

        $this->filterItemList($folderContents['files'], $filter);

        if (! $ignoreFolders) {
            $folderContents = array_merge($folderContents['folders'], $folderContents['files']);
        } else {
            $folderContents = $folderContents['files'];
        }

        return $folderContents;
    }

    /**
     * Finds files in the Library.
     *
     * @param  string  $searchTerm  Specifies the search term.
     * @param  mixed  $sortBy  Determines the sorting preference.
     *                         Supported values are 'title', 'size', 'lastModified' (see SORT_BY_XXX class constants), FALSE (to disable sorting), or an associative array with a 'by' key and a 'direction' key: ['by' => SORT_BY_XXX, 'direction' => SORT_DIRECTION_XXX].
     * @param  string  $filter  Determines the document type filtering preference.
     *                          Supported values are 'image', 'video', 'audio', 'document' (see FILE_TYPE_XXX constants of MediaLibraryItem class).
     * @return array Returns an array of MediaLibraryItem objects.
     */
    public function findFiles($searchTerm, $sortBy = 'title', $filter = null)
    {
        $words = explode(' ', Str::lower($searchTerm));
        $result = [];

        $findInFolder = function ($folder) use (&$findInFolder, $words, &$result, $sortBy, $filter) {
            $folderContents = $this->listFolderContents($folder, $sortBy, $filter);

            foreach ($folderContents as $item) {
                if ($item->type == MediaLibraryItem::TYPE_FOLDER) {
                    $findInFolder($item->path);
                } elseif ($this->pathMatchesSearch($item->path, $words)) {
                    $result[] = $item;
                }
            }
        };

        $findInFolder('/');

        /*
         * Sort the result
         */

        if ($sortBy !== false) {
            $this->sortItemList($result, $sortBy);
        }

        return $result;
    }

    /**
     * Deletes a file from the Library.
     *
     * @param  array  $paths  A list of file paths relative to the Library root to delete.
     */
    public function deleteFiles($paths)
    {
        $fullPaths = [];
        foreach ($paths as $path) {
            $path = self::validatePath($path);
            $fullPaths[] = $this->getMediaPath($path);
        }

        return $this->getStorageDisk()->delete($fullPaths);
    }

    /**
     * Deletes a folder from the Library.
     *
     * @param  string  $path  Specifies the folder path relative to the Library root.
     */
    public function deleteFolder($path)
    {
        $path = self::validatePath($path);
        $fullPaths = $this->getMediaPath($path);

        return $this->getStorageDisk()->deleteDirectory($fullPaths);
    }

    /**
     * Determines if a file with the specified path exists in the library.
     *
     * @param  string  $path  Specifies the file path relative the the Library root.
     * @return bool Returns TRUE if the file exists.
     */
    public function exists($path)
    {
        $path = self::validatePath($path);
        $fullPath = $this->getMediaPath($path);

        return $this->getStorageDisk()->exists($fullPath);
    }

    /**
     * Determines if a folder with the specified path exists in the library.
     *
     * @param  string  $path  Specifies the folder path relative the the Library root.
     * @return bool Returns TRUE if the folder exists.
     */
    public function folderExists($path)
    {
        $folderName = basename($path);
        $folderPath = dirname($path);

        $path = self::validatePath($folderPath);
        $fullPath = $this->getMediaPath($path);

        $folders = $this->getStorageDisk()->directories($fullPath);
        foreach ($folders as $folder) {
            if (basename($folder) == $folderName) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns a list of all directories in the Library, optionally excluding some of them.
     *
     * @param  array  $exclude  A list of folders to exclude from the result list.
     *                          The folder paths should be specified relative to the Library root.
     * @return array
     */
    public function listAllDirectories($exclude = [])
    {
        $fullPath = $this->getMediaPath('/');

        $folders = $this->getStorageDisk()->allDirectories($fullPath);

        $folders = array_unique($folders, SORT_LOCALE_STRING);

        $result = [];

        foreach ($folders as $folder) {
            $folder = $this->getMediaRelativePath($folder);
            if (! strlen($folder)) {
                $folder = '/';
            }

            if (Str::startsWith($folder, $exclude)) {
                continue;
            }
            if (! $this->isVisible($folder)) {
                $exclude[] = $folder.'/';

                continue;
            }

            $result[] = $folder;
        }

        if (! in_array('/', $result)) {
            array_unshift($result, '/');
        }

        return $result;
    }

    /**
     * Returns a file contents.
     *
     * @param  string  $path  Specifies the file path relative the the Library root.
     * @return string Returns the file contents
     */
    public function get($path)
    {
        $path = self::validatePath($path);
        $fullPath = $this->getMediaPath($path);

        return $this->getStorageDisk()->get($fullPath);
    }

    /**
     * Puts a file to the library.
     *
     * @param  string  $path  Specifies the file path relative the the Library root.
     * @param  string  $contents  Specifies the file contents.
     * @return bool
     */
    public function put($path, $contents)
    {
        $path = self::validatePath($path);
        $fullPath = $this->getMediaPath($path);

        return $this->getStorageDisk()->put($fullPath, $contents);
    }

    /**
     * Moves a file to another location.
     *
     * @param  string  $oldPath  Specifies the original path of the file.
     * @param  string  $newPath  Specifies the new path of the file.
     * @return bool
     */
    public function moveFile($oldPath, $newPath, $isRename = false)
    {
        $oldPath = self::validatePath($oldPath);
        $fullOldPath = $this->getMediaPath($oldPath);

        $newPath = self::validatePath($newPath);
        $fullNewPath = $this->getMediaPath($newPath);

        // If the file extension is changed to SVG, ensure that it has been sanitized
        $oldExt = pathinfo($oldPath, PATHINFO_EXTENSION);
        $newExt = pathinfo($newPath, PATHINFO_EXTENSION);
        if ($oldExt !== $newExt && strtolower($newExt) === 'svg') {
            $contents = $this->getStorageDisk()->get($fullOldPath);
            $contents = Svg::sanitize($contents);
            $this->getStorageDisk()->put($fullOldPath, $contents);
        }

        return $this->getStorageDisk()->move($fullOldPath, $fullNewPath);
    }

    /**
     * Copies a folder.
     *
     * @param  string  $originalPath  Specifies the original path of the folder.
     * @param  string  $newPath  Specifies the new path of the folder.
     * @return bool
     */
    public function copyFolder($originalPath, $newPath)
    {
        $disk = $this->getStorageDisk();

        $copyDirectory = function ($srcPath, $destPath) use (&$copyDirectory, $disk) {
            $srcPath = self::validatePath($srcPath);
            $fullSrcPath = $this->getMediaPath($srcPath);

            $destPath = self::validatePath($destPath);
            $fullDestPath = $this->getMediaPath($destPath);

            if (! $disk->makeDirectory($fullDestPath)) {
                return false;
            }

            $folderContents = $this->scanFolderContents($fullSrcPath);

            foreach ($folderContents['folders'] as $dirInfo) {
                if (! $copyDirectory($dirInfo->path, $destPath.'/'.basename($dirInfo->path))) {
                    return false;
                }
            }

            foreach ($folderContents['files'] as $fileInfo) {
                $fullFileSrcPath = $this->getMediaPath($fileInfo->path);

                if (! $disk->copy($fullFileSrcPath, $fullDestPath.'/'.basename($fileInfo->path))) {
                    return false;
                }
            }

            return true;
        };

        return $copyDirectory($originalPath, $newPath);
    }

    /**
     * Moves a folder.
     *
     * @param  string  $originalPath  Specifies the original path of the folder.
     * @param  string  $newPath  Specifies the new path of the folder.
     * @return bool
     */
    public function moveFolder($originalPath, $newPath)
    {
        if (Str::lower($originalPath) !== Str::lower($newPath)) {
            // If there is no risk that the directory was renamed
            // by just changing the letter case in the name -
            // copy the directory to the destination path and delete
            // the source directory.

            if (! $this->copyFolder($originalPath, $newPath)) {
                return false;
            }

            $this->deleteFolder($originalPath);
        } else {
            // If there's a risk that the directory name was updated
            // by changing the letter case - swap source and destination
            // using a temporary directory with random name.

            $tempraryDirPath = $this->generateRandomTmpFolderName(dirname($originalPath));

            if (! $this->copyFolder($originalPath, $tempraryDirPath)) {
                $this->deleteFolder($tempraryDirPath);

                return false;
            }

            $this->deleteFolder($originalPath);

            return $this->moveFolder($tempraryDirPath, $newPath);
        }

        return true;
    }

    /**
     * Creates a folder.
     *
     * @param  string  $path  Specifies the folder path.
     * @return bool
     */
    public function makeFolder($path)
    {
        $path = self::validatePath($path);
        $fullPath = $this->getMediaPath($path);

        return $this->getStorageDisk()->makeDirectory($fullPath);
    }

    /**
     * Resets the Library cache.
     *
     * The cache stores the library table of contents locally in order to optimize
     * the performance when working with remote storages. The default cache TTL is
     * 10 minutes. The cache is deleted automatically when an item is added, changed
     * or deleted. This method allows to reset the cache forcibly.
     */
    public function resetCache()
    {
        Cache::forget($this->cacheKey);
    }

    /**
     * Checks if file path doesn't contain any substrings that would pose a security threat.
     * Throws an exception if the path is not valid.
     *
     * @param  string  $path  Specifies the path.
     * @param  bool  $normalizeOnly  Specifies if only the normalization, without validation should be performed.
     * @return string Returns a normalized path.
     */
    public static function validatePath($path, $normalizeOnly = false)
    {
        $path = str_replace('\\', '/', $path);
        $path = '/'.trim($path, '/');

        if ($normalizeOnly) {
            return $path;
        }

        /*
         * Validate folder names
         */
        $regexWhitelist = [
            '\w', // any word character
            preg_quote('@', '/'),
            preg_quote('.', '/'),
            '\s', // whitespace character
            preg_quote('-', '/'),
            preg_quote('_', '/'),
            preg_quote('/', '/'),
            preg_quote('(', '/'),
            preg_quote(')', '/'),
            preg_quote('[', '/'),
            preg_quote(']', '/'),
            preg_quote(',', '/'),
            preg_quote('=', '/'),
            preg_quote("'", '/'),
            preg_quote('&', '/'),
        ];

        if (! preg_match('/^['.implode('', $regexWhitelist).']+$/iu', $path)) {
            throw new ApplicationException(Lang::get('system::lang.media.invalid_path', compact('path')));
        }

        $regexDirectorySeparator = preg_quote('/', '#');
        $regexDot = preg_quote('.', '#');
        $regex = [
            // Beginning of path
            '(^'.$regexDot.'+?'.$regexDirectorySeparator.')',

            // Middle of path
            '('.$regexDirectorySeparator.$regexDot.'+?'.$regexDirectorySeparator.')',

            // End of path
            '('.$regexDirectorySeparator.$regexDot.'+?$)',
        ];

        /*
         * Validate invalid paths
         */
        $regex = '#'.implode('|', $regex).'#';
        if (preg_match($regex, $path) !== 0 || strpos($path, '://') !== false) {
            throw new ApplicationException(Lang::get('system::lang.media.invalid_path', compact('path')));
        }

        return $path;
    }

    /**
     * Helper that makes a URL for a media file.
     *
     * @param  string  $file
     * @return string
     */
    public static function url($file)
    {
        return static::instance()->getPathUrl($file);
    }

    /**
     * Returns a public file URL.
     *
     * @param  string  $path  Specifies the file path relative the the Library root.
     * @return string
     */
    public function getPathUrl($path)
    {
        $path = $this->validatePath($path, true);

        $fullPath = $this->storagePath.implode('/', array_map('rawurlencode', explode('/', $path)));

        if (Config::get('cms.linkPolicy') === 'force') {
            return Url::to($fullPath);
        } else {
            return $fullPath;
        }
    }

    /**
     * Returns a file or folder path with the prefixed storage folder.
     *
     * @param  string  $path  Specifies a path to process.
     * @return string Returns a processed string.
     */
    public function getMediaPath($path)
    {
        return $this->storageFolder.$path;
    }

    /**
     * Returns path relative to the Library root folder.
     *
     * @param  string  $path  Specifies a path relative to the Library disk root.
     * @return string Returns the updated path.
     */
    protected function getMediaRelativePath($path)
    {
        $path = self::validatePath($path, true);

        if (substr($path, 0, $this->storageFolderNameLength) == $this->storageFolder) {
            return substr($path, $this->storageFolderNameLength);
        }

        throw new SystemException(sprintf('Cannot convert Media Library path "%s" to a path relative to the Library root.', $path));
    }

    /**
     * Determines if the path should be visible (not ignored).
     *
     * @param  string  $path  Specifies a path to check.
     * @return bool Returns TRUE if the path is visible.
     */
    protected function isVisible($path)
    {
        $baseName = basename($path);

        if (in_array($baseName, $this->ignoreNames)) {
            return false;
        }

        foreach ($this->ignorePatterns as $pattern) {
            if (preg_match('/'.$pattern.'/', $baseName)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Initializes a library item from file metadata and item type.
     *
     * @param  array  $item  Specifies the file metadata as returned by the storage adapter.
     * @param  string  $itemType  Specifies the item type.
     * @return mixed Returns the MediaLibraryItem object or NULL if the item is not visible.
     */
    protected function initLibraryItem($item, $itemType)
    {
        $relativePath = $this->getMediaRelativePath($item['path']);

        if (! $this->isVisible($relativePath)) {
            return;
        }

        /*
         * S3 doesn't allow getting the last modified timestamp for folders,
         * so this feature is disabled - folders timestamp is always NULL.
         */
        if ($itemType === MediaLibraryItem::TYPE_FILE) {
            $lastModified = $item['timestamp'] ?? $this->getStorageDisk()->lastModified($item['path']);
        } else {
            $lastModified = null;
        }

        /*
         * The folder size (number of items) doesn't respect filters. That
         * could be confusing for users, but that's safer than displaying
         * zero items for a folder that contains files not visible with a
         * currently applied filter. -ab
         */
        if ($itemType === MediaLibraryItem::TYPE_FILE) {
            $size = $item['size'] ?? $this->getStorageDisk()->size($item['path']);
        } else {
            $size = $this->getFolderItemCount($item['path']);
        }

        $publicUrl = $this->getPathUrl($relativePath);

        return new MediaLibraryItem($relativePath, $size, $lastModified, $itemType, $publicUrl);
    }

    /**
     * Returns a number of items on a folder.
     *
     * @param  string  $path  Specifies the folder path relative to the storage disk root.
     * @return int Returns the number of items in the folder.
     */
    protected function getFolderItemCount($path)
    {
        $folderItems = array_merge(
            $this->getStorageDisk()->files($path),
            $this->getStorageDisk()->directories($path)
        );

        $size = 0;
        foreach ($folderItems as $folderItem) {
            if ($this->isVisible($folderItem)) {
                $size++;
            }
        }

        return $size;
    }

    /**
     * Fetches the contents of a folder from the Library.
     *
     * @param  string  $fullFolderPath  Specifies the folder path relative the the storage disk root.
     * @return array Returns an array containing two elements - 'files' and 'folders', each is an array of MediaLibraryItem objects.
     */
    protected function scanFolderContents($fullFolderPath)
    {
        $result = [
            'files' => [],
            'folders' => [],
        ];

        $contents = $this->getStorageDisk()->listContents($fullFolderPath);

        foreach ($contents as $content) {
            if ($content['type'] === 'file') {
                $type = MediaLibraryItem::TYPE_FILE;
                $key = 'files';
            } elseif ($content['type'] === 'dir') {
                $type = MediaLibraryItem::TYPE_FOLDER;
                $key = 'folders';
            }

            $libraryItem = $this->initLibraryItem($content, $type);
            if (! is_null($libraryItem)) {
                $result[$key][] = $libraryItem;
            }
        }

        return $result;
    }

    /**
     * Sorts the item list by title, size or last modified date.
     *
     * @param  array  $itemList  Specifies the item list to sort.
     * @param  mixed  $sortSettings  Determines the sorting preference.
     *                               Supported values are 'title', 'size', 'lastModified' (see SORT_BY_XXX class constants) or an associative array with a 'by' key and a 'direction' key: ['by' => SORT_BY_XXX, 'direction' => SORT_DIRECTION_XXX].
     */
    protected function sortItemList(&$itemList, $sortSettings)
    {
        $files = [];
        $folders = [];

        // Convert string $sortBy to array
        if (is_string($sortSettings)) {
            $sortSettings = [
                'by' => $sortSettings,
                'direction' => self::SORT_DIRECTION_ASC,
            ];
        }

        usort($itemList, function ($a, $b) use ($sortSettings) {
            $result = 0;

            switch ($sortSettings['by']) {
                case self::SORT_BY_TITLE:
                    $result = strcasecmp($a->path, $b->path);
                    break;
                case self::SORT_BY_SIZE:
                    if ($a->size < $b->size) {
                        $result = -1;
                    } else {
                        $result = $a->size > $b->size ? 1 : 0;
                    }
                    break;
                case self::SORT_BY_MODIFIED:
                    if ($a->lastModified < $b->lastModified) {
                        $result = -1;
                    } else {
                        $result = $a->lastModified > $b->lastModified ? 1 : 0;
                    }
                    break;
            }

            // Reverse the polarity of the result to direct sorting in a descending order instead
            if ($sortSettings['direction'] === self::SORT_DIRECTION_DESC) {
                $result = 0 - $result;
            }

            return $result;
        });
    }

    /**
     * Filters item list by file type.
     *
     * @param  array  $itemList  Specifies the item list to sort.
     * @param  string  $filter  Determines the document type filtering preference.
     *                          Supported values are 'image', 'video', 'audio', 'document' (see FILE_TYPE_XXX constants of MediaLibraryItem class).
     */
    protected function filterItemList(&$itemList, $filter)
    {
        if (! $filter) {
            return;
        }

        $result = [];
        foreach ($itemList as $item) {
            if ($item->getFileType() == $filter) {
                $result[] = $item;
            }
        }

        $itemList = $result;
    }

    /**
     * Initializes and returns the Media Library disk.
     * This method should always be used instead of trying to access the
     * $storageDisk property directly as initializing the disc requires
     * communicating with the remote storage.
     *
     * @return mixed Returns the storage disk object.
     */
    public function getStorageDisk(): FilesystemAdapter
    {
        if ($this->storageDisk) {
            return $this->storageDisk;
        }

        return $this->storageDisk = Storage::disk(
            Config::get('cms.storage.media.disk', 'local')
        );
    }

    /**
     * Determines if file path contains all words form the search term.
     *
     * @param  string  $path  Specifies a path to examine.
     * @param  array  $words  A list of words to check against.
     * @return bool
     */
    protected function pathMatchesSearch($path, $words)
    {
        $path = Str::lower($path);

        foreach ($words as $word) {
            $word = trim($word);
            if (! strlen($word)) {
                continue;
            }

            if (! Str::contains($path, $word)) {
                return false;
            }
        }

        return true;
    }

    protected function generateRandomTmpFolderName($location)
    {
        $temporaryDirBaseName = time();

        $tmpPath = $location.'/tmp-'.$temporaryDirBaseName;

        while ($this->folderExists($tmpPath)) {
            $temporaryDirBaseName++;
            $tmpPath = $location.'/tmp-'.$temporaryDirBaseName;
        }

        return $tmpPath;
    }
}
