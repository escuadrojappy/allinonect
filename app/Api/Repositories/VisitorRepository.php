<?php

namespace App\Api\Repositories;

use App\Models\Visitor;
use App\Api\Traits\QueryBuilder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
        $this->table = $this->model->getTable();
    }

    /**
     * Visitor Get Data with Covid Result.
     *
     * @param \App\Models\Visitor $visitor
     */
    // public function getVisitors()
    // {
    //     $query = DB::table($this->table)
    //         ->select($this->searchableFields)

    //     dd($query);
    // }
}
