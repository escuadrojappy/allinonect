<?php

namespace App\Api\Repositories;

use App\Models\User;
use App\Api\Helpers\ApiResponseHandler;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    Http,
};

class AuthRepository extends Repository
{
    /**
     * The Api Response Handler Instance.
     *
     * @var String
     */
    protected $apiResponseHandler;

    /**
     * Oauth token endpoint
     *
     * @var String
     */
    protected $endpoint = 'oauth/token';

    /**
     * Create Model Instance.
     *
     * @param \App\Models\User $user
     * @param \App\Helpers\ApiResponseHandler $apiResponseHandler
     */
    public function __construct(
        User $user,
        ApiResponseHandler $apiResponseHandler
    ) {
        $this->model = $user;
        $this->apiResponseHandler = $apiResponseHandler;
    }

    /**
     * Validate the user.
     *
     * @param array $credentials
     * @return bool
     */
    public function validate(array $credentials)
    {
        return Auth::attempt($credentials);
    }

    /**
     * Get Token.
     *
     * @param array $credentials
     * @return array
     */
    public function getToken(array $credentials)
    {
        $url = sprintf('%s', config('app.url'). $this->endpoint);

        $params = [
            'grant_type' => 'password',
            'client_id' => config('services.auth.authentication_id'),
            'client_secret' => config('services.auth.authentication_secret'),
            'username' => Arr::get($credentials, 'email'),
            'password' => Arr::get($credentials, 'password'),
            'scope' => '*'
        ];

        $response = Http::asForm()->post($url, $params);
        
        $this->apiResponseHandler->check($response);

        $token = json_decode($response->body(), true);

        return $token;
    }

    /**
     * Request access token via refresh token
     *
     * @param String $token
     *
     * @return object
     */
    public function getTokenViaRefreshToken(String $token)
    {
        $url = sprintf('%s', config('app.url'). $this->endpoint);

        $params = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $token,
            'client_id' => config('services.auth.authentication_id'),
            'client_secret' => config('services.auth.authentication_secret'),
            'scope' => '*'
        ];

        $response = Http::asForm()->post($url, $params);

        $this->apiResponseHandler->check($response);

        $token = json_decode($response->body(), true);

        return $token;
    }
}
