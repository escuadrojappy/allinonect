<?php

namespace App\Http\Resources;

use Illuminate\Support\Arr;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ContactTracingResource extends JsonResource
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
        
        $entranceTimestamp = date('F j, Y g:i a', strtotime(Arr::get($data, 'entrance_timestamp')));

        $covidResult = Arr::get($data, 'covid_result');
        
        Arr::set($data, 'entrance_timestamp', $entranceTimestamp);

        Arr::set($data, 'covid_result', $covidResult ? 'Positive' : 'Negative');
        
        return $data;
    }
}
