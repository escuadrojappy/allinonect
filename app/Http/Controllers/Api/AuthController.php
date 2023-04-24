<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Api\Services\AuthService;
use App\Http\Requests\Auth\{
    LoginRequest,
    ForgotPasswordRequest,
    ResetPasswordRequest,
    ResetPasswordTokenRequest,
    ChangePasswordRequest,
};
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
     * Get Authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->authService->auth();
    }

    /**
     * Login User.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        return $this->authService->login($request->validated());
    }

    /**
     * Forgot Password.
     *
     * @param \App\Http\Requests\Auth\ForgotPasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $validated = $request->validated();

        return $this->authService->forgotPassword($validated);
    }

    /**
     * Reset Password.
     *
     * @param \App\Http\Requests\Auth\ResetPasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        $validated = $request->validated();

        return $this->authService->resetPassword($validated);
    }

    /**
     * Validate Reset Password.
     *
     * @param \App\Http\Requests\Auth\ResetPasswordTokenRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateResetPasswordToken(ResetPasswordTokenRequest $request)
    {
        $validated = $request->validated();

        return $this->authService->validateResetPasswordToken($validated);
    }

    /**
     * Change Password.
     *
     * @param \App\Http\Requests\Auth\ChangePasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $validated = $request->validated();

        return $this->authService->changePassword($validated);
    }

    /**
     * Logout User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        return $this->authService->logout();
    }

    /**
     * test.
     *
     * @param \App\Http\Requests\LoginRequest $request
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
    }
}
