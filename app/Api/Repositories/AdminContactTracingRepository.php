<?php

namespace App\Api\Repositories;

use App\Models\ViewContactTracing;
use App\Api\Traits\QueryBuilder;
use Illuminate\Support\Arr;

class AdminContactTracingRepository extends Repository
{
    use QueryBuilder;

    /**
     * Searchable Fields.
     *
     * @var array
     */
    protected $searchableFields = [
        'visitor_id',
        'visitor_first_name',
        'visitor_middle_name',
        'visitor_last_name',
        'visitor_philsys_card_number',
        'entrance_timestamp',
        'visitor_contact_number',
        'establishment_name',
        'covid_result',
    ];

    /**
     * Where fields.
     *
     * @var array
     */
    protected $whereFields = [
        'date_range',
        'covid_result',
    ];

    /**
     * Date Range Field.
     *
     * @var array
     */
    protected $dateRangeField = [
        'entrance_timestamp',
    ];

    /**
     * Create Model Instance.
     *
     * @param \App\Models\ViewContactTracing $viewContactTracing
     */
    public function __construct(ViewContactTracing $viewContactTracing)
    {
        $this->model = $viewContactTracing;
    }
}
