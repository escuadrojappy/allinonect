<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Api\Repositories\AuthRepository;

class IdentifyUser
{
    /**
     * The Auth Repository Instance.
     *
     * @return \App\Api\Repositories\AuthRepository $authRepository
     */
    protected $authRepository;

    /**
     * Create Repository instance.
     *
     * @param \App\Api\Repositories\AuthRepository $authRepository
     */
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
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
        $auth = $this->authRepository->auth();
        $roleId = Arr::get($auth, 'role_id');
        
        switch ($roleId) {
            case 1:
                $request->merge(['admin_id' => Arr::get($auth, 'id')]);
                break;
            case 2:
                $request->merge(['establishment_id' => Arr::get($auth, 'id')]);
                break;
            case 3:
                $request->merge(['visitor_id' => Arr::get($auth, 'id')]);
                break;
        }

        return $next($request);
    }
}
