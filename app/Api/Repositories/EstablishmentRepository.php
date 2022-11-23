<?php

namespace App\Api\Repositories;

use App\Models\Establishment;
use App\Api\Traits\Searchable;
use Illuminate\Support\Arr;

class EstablishmentRepository extends Repository
{
    use Searchable;

    /**
     * Searchable Fields.
     *
     * @var array
     */
    protected $searchableFields = [
        'name',
        'address',
        'user.email',
        'contact_number',
    ];

    /**
     * Searchable Fields.
     *
     * @var array
     */
    protected $relationFields = [
        'user',
    ];

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
