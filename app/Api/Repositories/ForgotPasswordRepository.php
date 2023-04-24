<?php

namespace App\Api\Repositories;

use App\Models\ForgotPassword;
use App\Api\Traits\QueryBuilder;
use Illuminate\Support\Arr;

class ForgotPasswordRepository extends Repository
{
    /**
     * Create Model Instance.
     *
     * @param \App\Models\ForgotPassword $forgotPassword
     */
    public function __construct(ForgotPassword $forgotPassword)
    {
        $this->model = $forgotPassword;
    }
}
