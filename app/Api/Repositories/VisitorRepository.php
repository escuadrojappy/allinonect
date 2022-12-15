<?php

namespace App\Api\Repositories;

use App\Models\Visitor;
use App\Api\Traits\QueryBuilder;
use Illuminate\Support\Arr;

class VisitorRepository extends Repository
{
    use QueryBuilder;

    /**
     * Searchable Fields.
     *
     * @var array
     */
    protected $searchableFields = [
        'visitors.id',
        'last_name',
        'first_name',
        'middle_name',
        'philsys_card_number',
    ];

    /**
     * Joined Tables.
     *
     * @var array
     */
    // protected $joinTables = [
    //     'users' => [
    //         'columns' => ['users.id', 'establishments.user_id'],
    //         'type' => 'left_join',
    //     ],
    // ];

    /**
     * Create Model Instance.
     *
     * @param \App\Models\Visitor $visitor
     */
    public function __construct(Visitor $visitor)
    {
        $this->model = $visitor;
    }

    /**
     * Create Model Instance.
     *
     * @param string $pcn
     */
    public function checkIfPcnExists(string $cardNumber)
    {
        return $this->model->where('philsys_card_number', $cardNumber)->first();
    }
}
