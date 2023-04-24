<?php

namespace App\Api\Services;

use Carbon\Carbon;
use App\Api\Helpers\Cookie;
use App\Mail\{
    ForgotPasswordMail,
};
use App\Api\Repositories\{
    AuthRepository,
    EstablishmentRepository,
    ForgotPasswordRepository,
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
use Illuminate\Auth\Access\AuthorizationException;

class AuthService extends Service
{
    /**
     * Oauth token endpoint
     *
     * @var \App\Api\Helpers\Cookie
     */
    protected $cookie;

    /**
     * The Establishment Repository Instance.
     *
     * @var App\Api\Repositories\EstablishmentRepository
     */
    protected $establishmentRepository;

    /**
     * The Forgot Password Repository Instance.
     *
     * @var App\Api\Repositories\ForgotPasswordRepository
     */
    protected $forgotPasswordRepository;

    /**
     * Create repository instance.
     *
     * @param \App\Api\Repositories\AuthRepository $authRepository
     * @param \App\Api\Repositories\EstablishmentRepository $establishmentRepository
     * @param \App\Api\Repositories\ForgotPasswordRepository $forgotPasswordRepository
     * @param \App\Api\Helpers\Cookie $cookie
     */
    public function __construct(
        AuthRepository $repository,
        EstablishmentRepository $establishmentRepository,
        ForgotPasswordRepository $forgotPasswordRepository,
        Cookie $cookie
    ) {
        $this->repository = $repository;
        $this->establishmentRepository = $establishmentRepository;
        $this->forgotPasswordRepository = $forgotPasswordRepository;
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
     * Forgot Password.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function forgotPassword(array $request)
    {
        DB::beginTransaction();

        try {
            $email = Arr::get($request, 'email');
            $user = $this->repository->checkEmailIfExists($email);
            
            if (!$user) throw new AuthenticationException('Invalid Email Address');

            $userId = Arr::get($user, 'id');
            $expiresAt = Carbon::now()->addHours(3);
            $temporaryToken = Str::random(64);

            $this->forgotPasswordRepository->destroyByColumn('user_id', $userId);

            $forgotPassword = $this->forgotPasswordRepository->create([
                'user_id' => $userId,
                // 'email' => $email,
                'token' => $temporaryToken,
                'expires_at' => $expiresAt->format('Y-m-d H:i:s'),
            ]);

            $emailParam = [
                'temp_token' => encrypt($temporaryToken),
                'expires_at' => $expiresAt->format('F d, Y, h:i:sa'),
                'email' => $email,
            ];

            Mail::to($email)->send(new ForgotPasswordMail($emailParam));

            DB::commit();

            return response()->json($forgotPassword);

        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            throw $e;
        }
    }

    /**
     * Reset Password.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(array $request)
    {
        DB::beginTransaction();

        try {
            $token = decrypt(Arr::get($request, 'token'));
            $password = Arr::get($request, 'password');
            $resetPassword = $this->forgotPasswordRepository->findByColumn('token', $token);

            if (!$resetPassword) throw new AuthorizationException('Invalid Reset Password Token.');

            $expiresAt = Carbon::parse(Arr::get($resetPassword, 'expires_at'));

            if ($expiresAt->lessThan(Carbon::now())) {
                $resetPassword->delete();
                DB::commit();
                throw new AuthorizationException('Expired Password Token.');
            }

            $newPassword = $resetPassword->user()->first()->update([
                'password' => bcrypt($password),
            ]);

            $resetPassword->delete();

            DB::commit();

            return response()->json($resetPassword);

        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            throw $e;
        }
    }

    /**
     * Validate Reset Password.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateResetPasswordToken(array $request)
    {
        $token = decrypt(Arr::get($request, 'token'));
        $password = Arr::get($request, 'password');
        $validate = $this->forgotPasswordRepository->findByColumn('token', $token);

        if (!$validate) throw new AuthorizationException('Invalid Reset Password Token.');

        $expiresAt = Carbon::parse(Arr::get($validate, 'expires_at'));

        if ($expiresAt->lessThan(Carbon::now())) {
            $validate->delete();
            throw new AuthorizationException('Expired Password Token.');
        }

        return response()->json($validate);
    }

    /**
     * Change Password.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(array $request)
    {
        $user = $this->repository->currentUser();

        $credentials = [
            'email' => Arr::get($user, 'email'),
            'password' => Arr::get($request, 'old_password'),
        ];

        $validate = $this->repository->validate($credentials);

        if (!$validate) throw new AuthenticationException('Invalid Credentials');

        $user->update([
            'password' => bcrypt(Arr::get($request, 'new_password'))
        ]);

        return response()->json($user);
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
