<?php

namespace App\Api\Services;

use App\Api\Helpers\Cookie;
use App\Api\Repositories\{
    AuthRepository,
    EstablishmentRepository,
};
use Illuminate\Support\Facades\{
    DB,
    Mail,
};
use Illuminate\Support\{
    Arr,
    Str,
};
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class AuthService extends Service
{
    /**
     * Oauth token endpoint
     *
     * @var \App\Api\Helpers\Cookie
     */
    protected $cookie;

    /**
     * Create repository instance.
     *
     * @param App\Api\Repositories\AuthRepository $authRepository
     * @param App\Api\Repositories\EstablishmentRepository $establishmentRepository
     * @param \App\Api\Helpers\Cookie $cookie
     */
    public function __construct(
        AuthRepository $repository,
        EstablishmentRepository $establishmentRepository,
        Cookie $cookie
    ) {
        $this->repository = $repository;
        $this->establishmentRepository = $establishmentRepository;
        $this->cookie = $cookie;
    }

    /**
     * Authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function auth()
    {
        $auth = $this->repository->auth();

        return response()->json($auth);
    }

    /**
     * Login User.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(array $request)
    {
        $validate = $this->repository->validate($request);

        if (!$validate) throw new AuthenticationException('Invalid Credentials');

        $token = $this->repository->getToken($request);

        $cookie = $this->cookie->set($token, config('auth.refresh_token_timeout'));

        $response = [
            'user' => $this->repository->auth(),
            'token' => $token,
        ];

        return response()->json($response)->cookie($cookie);
    }

    /**
     * Logout User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $logout = $this->repository->logout();

        $cookie = $this->cookie->forget();

        return response()->json($logout)->cookie($cookie);
    }
}
