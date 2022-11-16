<?php

namespace App\Api\Services;

use App\Mail\RegisteredEstablishmentMail;
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
        DB::beginTransaction();

        try {
            $temporaryPassword = Str::random(10);

            $paramsUser = [
                'email' => Arr::get($request, 'email'),
                'role_id' => Arr::get($request, 'role_id'),
                'password' => bcrypt($temporaryPassword),
            ];

            $user = $this->repository->create($paramsUser);

            $paramsEstablishment = [
                'name' => Arr::get($request, 'name'),
                'address' => Arr::get($request, 'name'),
                'contact_number' => Arr::get($request, 'contact_number'),
                'user_id' => Arr::get($user, 'id'),
            ];

            $establishment = $this->establishmentRepository->create($paramsEstablishment);

            DB::commit();

            $emailParam = [
                'email' => Arr::get($request, 'email'),
                'name' => Arr::get($request, 'name'),
                'password' => $temporaryPassword,
            ];

            Mail::to(Arr::get($request, 'email'))->send(new RegisteredEstablishmentMail($emailParam));

            return $establishment;

        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            throw $e;
        }
    }
}
