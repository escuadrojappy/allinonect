<?php

namespace App\Api\Repositories;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\Visitor;
use App\Api\Traits\QueryBuilder;

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
        'covid_result',
        'date_result',
    ];

    /**
     * Joined Tables.
     *
     * @var array
     */
    protected $joinTables;

    /**
     * Custom Joins.
     *
     * @var array
     */
    protected $customJoins;

    /**
     * Create Model Instance.
     *
     * @param \App\Models\Visitor $visitor
     */
    public function __construct(Visitor $visitor)
    {
        $this->model = $visitor;
        $this->customJoins = [
            [
                'query' => $this->getVisitorLatestHealthStatus(),
                'columns' => ['visitors.id', 'visitor_health_statuses.visitor_id'],
                'type' => 'left_join',
            ],
        ];
    }

    /**
     * Check PCN if exists.
     *
     * @param string $pcn
     * @return \App\Models\Visitor $visitor
     */
    public function checkIfPcnExists(string $cardNumber)
    {
        return $this->model->where('philsys_card_number', $cardNumber)->first();
    }

    /**
     * Get Visitor Latest Health Status.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getVisitorLatestHealthStatus()
    {
        return DB::raw('
            (
                select 
                    vhs2.* 
                from 
                    (
                        select
                            vhs.id,
                            max(vhs.date_result) as date_result 
                        from 
                            visitor_health_statuses vhs 
                        group by 
                            vhs.visitor_id
                    ) vhs 
                    inner join visitor_health_statuses vhs2 on vhs.id = vhs2.id
            ) as visitor_health_statuses
        ');
    }
}
