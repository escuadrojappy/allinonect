<?php

namespace App\Exports;

use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\{
    FromCollection,
    WithHeadingRow,
    WithMapping,
};


class AdminContactTracingExport implements FromCollection, WithHeadingRow, WithMapping
{
    protected $result;

    /**
     * Initiate Result.
     * 
    */
    public function __construct($result)
    {
        $this->result = $result;
    }

    /**
    * @var $result
    */
    public function map($result): array
    {
        if (!Arr::has($result, 'visitor_id')) return $result->toArray();
        
        $contactNumber = Arr::get($result, 'visitor_contact_number') ? Arr::get($result, 'visitor_contact_number') : 'None';
        $covidResult = Arr::get($result, 'covid_result') ? 'Positive' : 'Negative';

        Arr::set($result, 'visitor_contact_number', $contactNumber);
        Arr::set($result, 'covid_result', $covidResult);

        return $result->toArray();
    }

    /**
     *
     * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $this->result = $this->result->prepend(collect($this->headings()));

        return $this->result;
    }

    /**
     *
     * @return array
    */
    public function headings(): array
    {
        return [
            'visitor_id',
            'visitor_first_name',
            'visitor_middle_name',
            'visitor_last_name',
            'visitor_philsys_card_number',
            'entrance_timestamp',
            'visitor_contact_number',
            'establishment_name',
            'covid_result'
        ];
    }
}
