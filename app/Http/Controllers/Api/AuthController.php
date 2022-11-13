<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Api\Services\AuthService;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * The service instance.
     *
     * @return \App\Api\Services\AuthService $service
     */
    protected $authService;

    /**
     * Create service instance.
     *
     * @param \App\Api\Services\AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Login User.
     *
     * @param \App\Http\Requests\LoginRequest @request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        return $this->authService->login($request->validated());
    }

    /**
     * test.
     *
     * @param \App\Http\Requests\LoginRequest @request
     * @return \Illuminate\Http\JsonResponse
     */
    public function test(Request $request)
    {
        // $request = [
        //     'name' => $request->get('fname'),
        //     ''
        // ]
        // \App\Models\User::create($reques)
        return \App\Models\User::all();
        return view('page', 'users', App\Models\User::all());
    }
}
