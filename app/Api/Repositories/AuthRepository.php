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
use Laravel\Passport\{
    TokenRepository,
    RefreshTokenRepository,
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
     * Authenticated User.
     *
     * @return \App\Models\User
     */
    public function auth()
    {
        $user = Auth::user();
        $roleId = Arr::get($user, 'role_id');
        
        switch ($roleId) {
            case 1:
                return $user->load('admin');
                break;
            case 2:
                return $user->load('establishment');
                break;
            case 3:
                $user = $user->load(['visitor.healthStatus' => function ($query) {
                    $query->orderBy('date_result', 'desc')->first();
                }]);
                $healthStatus = Arr::get($user, 'visitor.healthStatus');
                $user = $user->toArray();
                if ($healthStatus->count()) {
                    Arr::set($user, 'visitor.health_status', $healthStatus->first()->toArray());
                } else {
                    Arr::set($user, 'visitor.health_status', null);
                }
                return $user;
                break;
          }
    }

    /**
     * Logout user.
     *
     * @return bool
     */
    public function logout()
    {
        return Auth::user()->token()->revoke();
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

    /**
     * Check if email is exists
     *
     * @param string $email
     * @return object
     */
    public function checkEmailIfExists(string $email)
    {
        return $this->model->where('email', $email)->first();
    }

    /**
     * Get Current User
     *
     * @return \App\Models\User
     */
    public function currentUser()
    {
        return auth()->user();
    }
}
