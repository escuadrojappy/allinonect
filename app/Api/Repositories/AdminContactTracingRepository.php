<?php

namespace App\Api\Repositories;

use App\Models\ViewContactTracing;
use App\Api\Traits\QueryBuilder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;

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
        'establishment_id',
        'id',
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

    /**
     * Get Visitors to contact.
     *
     * @param $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getVisitorsToContact($request)
    {
        $dateResult = Carbon::createFromDate(Arr::get($request, 'date_result'))->toDateString();
        $minusTwoDays = Carbon::createFromDate($dateResult)->subDays(2)->toDateString();

        $query = $this->model
            ->select(
                'id',
                'establishment_id',
                'establishment_name',
                'visitor_id',
                'visitor_philsys_card_number',
                'visitor_fullname',
                'visitor_contact_number',
                'entrance_timestamp',
            )
            ->whereNotNull('id')
            ->where('visitor_id', '!=', Arr::get($request, 'visitor_id'))
            ->whereIn('establishment_id', function ($query) use ($request, $dateResult, $minusTwoDays) {
                $query->select('establishment_id')
                    ->from('view_contact_tracings')
                    ->whereNotNull('id')
                    ->where('visitor_id', Arr::get($request, 'visitor_id'))
                    ->where(function ($query2) use ($request, $dateResult, $minusTwoDays) {
                        $query2->whereDate('entrance_timestamp', '>=', $minusTwoDays)->whereDate('entrance_timestamp', '<=', $dateResult);
                    });
            })
            ->where(function ($query) use ($dateResult, $minusTwoDays) {
                $query->whereDate('entrance_timestamp', '>=', $minusTwoDays)->whereDate('entrance_timestamp', '<=', $dateResult);
            })
            ->whereNotExists(function ($query) use ($dateResult, $minusTwoDays) {
                $query->from('sent_sms_users')
                    ->whereRaw('sent_sms_users.visitor_id = view_contact_tracings.visitor_id')
                    ->whereRaw('sent_sms_users.establishment_id = view_contact_tracings.establishment_id')
                    ->whereRaw(sprintf('
                        (date(sent_sms_users.entrance_timestamp) >= date("%s") and date(sent_sms_users.entrance_timestamp) <= date("%s"))',
                        $minusTwoDays, 
                        $dateResult
                    ));
            })
            ->groupBy('visitor_id');
        
        return $query->get();
    }
}
