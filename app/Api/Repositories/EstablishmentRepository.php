<?php

namespace App\Api\Repositories;

use App\Models\Establishment;
use App\Api\Traits\QueryBuilder;
use Illuminate\Support\Arr;

class EstablishmentRepository extends Repository
{
    use QueryBuilder;

    /**
     * Searchable Fields.
     *
     * @var array
     */
    protected $searchableFields = [
        'establishments.id',
        'name',
        'address',
        'users.email',
        'contact_number',
    ];

    /**
     * Joined Tables.
     *
     * @var array
     */
    protected $joinTables = [
        'users' => [
            'columns' => ['users.id', 'establishments.user_id'],
            'type' => 'left_join',
        ],
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
