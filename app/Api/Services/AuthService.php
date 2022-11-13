<?php

namespace App\Api\Services;

use App\Api\Helpers\Cookie;
use App\Api\Repositories\AuthRepository;
use Illuminate\Support\Arr;
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
     * @param \App\Api\Helpers\Cookie $cookie
     */
    public function __construct(AuthRepository $repository, Cookie $cookie)
    {
        $this->repository = $repository;
        $this->cookie = $cookie;
    }

    /**
     * Login User.
     *
     * @param array $request
     * @return
     */
    public function login(array $request)
    {
        $validate = $this->repository->validate($request);

        if (!$validate) throw new AuthenticationException('Invalid Credentials');

        $token = $this->repository->getToken($request);

        $cookie = $this->cookie->set($token, config('auth.refresh_token_timeout'));

        return response()->json($token)->cookie($cookie);
    }

    /**
     * Registration User.
     *
     * @param array $request
     * @return
     */
    public function registration(array $request)
    {
        $password = Arr::get($request, 'password');

        Arr::set($request, 'password', bcrypt($password));

        return $this->repository->create($request);
    }
}
