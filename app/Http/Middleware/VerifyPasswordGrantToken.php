<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;
use App\Api\Repositories\AuthRepository;
use App\Api\Helpers\Cookie;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Carbon\Carbon;
class VerifyPasswordGrantToken
{
    /**
     * The Auth Repository Instance.
     *
     * @return \App\Api\Repositories\AuthRepository $authRepository
     */
    protected $authRepository;

    /**
     * The cookie instance.
     *
     * @return \App\Api\Helpers\Cookie $cookie
     */
    protected $cookie;

    /**
     * Create Repository instance.
     *
     * @param \App\Api\Repositories\AuthRepository $authRepository
     * @param \App\Api\Helpers\Cookie $cookie
     */
    public function __construct(AuthRepository $authRepository, Cookie $cookie)
    {
        $this->authRepository = $authRepository;
        $this->cookie = $cookie;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $this->cookie->get($request);
        $accessToken = Arr::get($token, 'access_token');

        if (!$token) throw new AuthenticationException();

        if (!$request->bearerToken() && $token) {
            $request->headers->set('Authorization', "Bearer {$accessToken}");
        }

        $verify = $this->verifyPasswordGrandToken($request, $token);

        if (Arr::has($verify, 'refresh_token')) {
            $cookie = $this->cookie->set($verify, config('auth.refresh_token_timeout'));
            return $next($request)->cookie($cookie);
        } 

        return $next($request);
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $token
     * @return bool
     */
    protected function verifyPasswordGrandToken(Request $request, $token)
    {
        $user = auth('api')->user();

        if ($user) {
            auth()->login($user);
            return $user;
        }

        $refreshToken = $this->authRepository->getTokenViaRefreshToken(Arr::get($token, 'refresh_token'));

        if (!Arr::has($refreshToken, 'refresh_token')) throw new AuthenticationException();

        $request->headers->set('Authorization', "Bearer {$refreshToken['access_token']}");
        
        auth()->login(auth('api')->user());

        return $refreshToken;
    }
}
