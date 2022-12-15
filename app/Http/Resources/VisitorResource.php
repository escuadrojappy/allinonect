<?php

namespace App\Http\Resources;

use Illuminate\Support\Arr;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);

        $dateResult = 'None';

        if (Arr::get($data, 'date_result')) $dateResult = date('F j, Y g:i a', strtotime(Arr::get($data, 'date_result')));

        $covidResult = Arr::get($data, 'covid_result');

        Arr::set($data, 'date_result', $dateResult);

        Arr::set($data, 'covid_result', $covidResult ? 'Positive' : 'Negative');
        
        return $data;
    }
}
