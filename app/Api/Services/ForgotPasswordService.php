<?php

namespace App\Api\Services;

use App\Api\Repositories\EstablishmentRepository;
use Illuminate\Support\Arr;
use App\Mail\{
    ForgotPasswordMail,
};

class ForgotPasswordService extends Service
{
    /**
     * Create repository instance.
     *
     * @param App\Api\Repositories\EstablishmentRepository $contactRepository
     */
    public function __construct(EstablishmentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create Contact.
     *
     * @param array $request
     * @return
     */
    public function forgotPassword(array $request)
    {
            $emailParam = [
                'email' => Arr::get($request, 'email'),
            ];

            Mail::to(Arr::get($request, 'email'))->send(new ForgotPasswordMail($emailParam));



    }
}
