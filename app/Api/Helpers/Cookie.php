<?php

namespace App\Api\Helpers;

use Illuminate\Http\Request;

class Cookie
{
    /**
     * Get token from request cookie
     *
     * @param Request $request
     * @return mixed
     */
    public function get(Request $request)
    {
        $token = null;

        if ($request->hasCookie('token')) {
            $token = decrypt($request->cookie('token'));
        }

        return $token;
    }

    /**
     * Set new cookie instance
     *
     * @param $token
     * @param int $expiration 
     * @return \Illuminate\Cookie\CookieJar|\Symfony\Component\HttpFoundation\Cookie
     */
    public function set($token, $expiration)
    {
        return cookie(
            'token', // name
            encrypt($token), // value
            $expiration,
            '/', // path
            null, // domain
            config('app.env') != 'local', // secure,
            true, // httpOnly
        );
    }

    public function forget() {
        return cookie(
            'token',
            null,
            -1,
            '/',
            null, // domain
            config('app.env') != 'local', // secure,
            true, // httpOnly
        );
    }
}
