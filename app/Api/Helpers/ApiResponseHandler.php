<?php

namespace App\Api\Helpers;

use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class ApiResponseHandler
{
    /**
     * Check API if has error
     *
     * @param \Illuminate\Http\Client\Response $response
     * @return void
     */
    public function check($response)
    {
        dd($response);
        if ($response->getStatusCode() != 200) {
            // throw new \Exception($response->body());
            throw new AuthenticationException();
        }
    }
}
