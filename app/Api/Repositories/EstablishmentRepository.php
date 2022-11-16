<?php

namespace App\Api\Repositories;

use App\Models\Establishment;
use Illuminate\Support\Arr;

class EstablishmentRepository extends Repository
{

    /**
     * Create Model Instance.
     *
     * @param \App\Models\Establishment $establishment
     */
    public function __construct(Establishment $establishment)
    {
        $this->model = $establishment;
    }
}
