<?php

namespace System\Classes;

use Config;
use Exception;
use Illuminate\Routing\Controller as ControllerBase;
use Lang;
use Response;
use SystemException;

/**
 * The is the master controller for system related routing.
 * It is currently only responsible for serving up the asset combiner contents.
 *
 * @see System\Classes\CombineAssets Asset combiner class
 *
 * @author Alexey Bobkov, Samuel Georges, Luke Towers
 */
class SystemController extends ControllerBase
{
    /**
     * Combines JavaScript and StyleSheet assets.
     *
     * @param  string  $name  Combined file code
     * @return Response Combined content.
     */
    public function combine($name)
    {
        try {
            if (! strpos($name, '-')) {
                return Response::make('/* '.e(Lang::get('system::lang.combiner.not_found', ['name' => $name])).' */', 404);
            }

            $parts = explode('-', $name);

            $cacheId = $parts[0];

            $combiner = CombineAssets::instance();

            return $combiner->getContents($cacheId);
        } catch (Exception $ex) {
            return Response::make('/* '.e($ex->getMessage()).' */', 500);
        }
    }

    /**
     * Resizes an image using the provided configuration
     * and returns a redirect to the resized image
     *
     * @param  string  $identifier  The identifier used to retrieve the image configuration
     * @param  string  $encodedUrl  The double-encoded URL of the resized image, see https://github.com/octobercms/october/issues/3592#issuecomment-671017380
     * @return RedirectResponse
     */
    public function resizer(string $identifier, string $encodedUrl)
    {
        $resizedUrl = ImageResizer::getValidResizedUrl($identifier, $encodedUrl);
        if (empty($resizedUrl)) {
            return response('Invalid identifier or redirect URL', 400);
        }

        // Attempt to process the resize
        try {
            $resizer = ImageResizer::fromIdentifier($identifier);
            $resizer->resize();
        } catch (SystemException $ex) {
            // If the resizing failed with a SystemException, it was most
            // likely because it is in progress or has already finished
            // although it could also be because the cache system used to store
            // configuration data is broken
            if (Config::get('cache.default', 'file') === 'array') {
                throw new Exception('Image resizing requires a persistent cache driver, "array" is not supported. Try changing config/cache.php -> default to a persistent cache driver.');
            }
        } catch (Exception $ex) {
            // If it failed for any other reason, restore the config so that
            // the resizer route will continue to work until it succeeds
            if (! empty($resizer)) {
                $resizer->storeConfig();
            }

            // Rethrow the exception
            throw $ex;
        }

        return redirect()->to($resizedUrl);
    }
}
