<?php

namespace System\Traits;

use Carbon\Carbon;
use Config;
use Crypt;
use Request;
use Session;
use Symfony\Component\HttpFoundation\Cookie;

/**
 * Security Controller Trait
 * Adds cross-site scripting protection methods to a controller based class
 *
 * @author Alexey Bobkov, Samuel Georges
 */
trait SecurityController
{
    /**
     * Adds anti-CSRF cookie.
     * Adds a cookie with a token for CSRF checks to the response.
     *
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    protected function makeXsrfCookie()
    {
        $config = Config::get('session');

        return new Cookie(
            'XSRF-TOKEN',
            Session::token(),
            Carbon::now()->addMinutes((int) $config['lifetime'])->getTimestamp(),
            $config['path'],
            $config['domain'],
            $config['secure'],
            false,
            false,
            $config['same_site'] ?? null
        );
    }

    /**
     * Checks the request data / headers for a valid CSRF token.
     *
     * @return bool Returns false if a valid token is not found or cms.enableCsrfProtection is set to false
     */
    protected function verifyCsrfToken()
    {
        if (! Config::get('cms.enableCsrfProtection', true)) {
            return true;
        }

        $token = Request::input('_token') ?: Request::header('X-CSRF-TOKEN');

        if (! $token && $header = Request::header('X-XSRF-TOKEN')) {
            $token = Crypt::decrypt($header, false);
        }

        if (! strlen($token) || ! strlen(Session::token())) {
            return false;
        }

        return hash_equals(
            Session::token(),
            $token
        );
    }

    /**
     * Checks if the back-end should force a secure protocol (HTTPS) enabled by config.
     *
     * @return bool
     */
    protected function verifyForceSecure()
    {
        if (Request::secure() || Request::ajax()) {
            return true;
        }

        return ! Config::get('cms.backendForceSecure', false);
    }
}
