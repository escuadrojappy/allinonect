<?php

namespace App\Api\Repositories;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    Http,
};

class AuthRepository extends Repository
{
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
     */
    public function __construct(User $user)
    {
        $this->model = $user;
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

        $token = json_decode($response->body(), true);

        return $token;
    }
}
