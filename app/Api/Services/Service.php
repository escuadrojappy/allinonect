<?php

namespace App\Api\Services;

use Illuminate\Support\Arr;

abstract class Service
{
    /**
     * The Primary Repository Instance.
     *
     */
    protected $repository;

    /**
     * The Repository Instance.
     *
     * @return App\Repositories\Repository
     */
    public function repository()
    {
        return $this->repository;
    }

    /**
     * The DataTable response.
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $result
     * @param array $request
     * @return array
     */
    public function dataTableResponse($result, $request)
    {
        $result = $result->toArray();

        return [
            'data' => Arr::has($result, 'data') ? Arr::get($result, 'data') : $result,
            'draw' => Arr::get($request, 'draw'),
            'recordsTotal' => Arr::get($result, 'to') ? Arr::get($result, 'to') : 0,
            'recordsFiltered' => Arr::get($result, 'total'),
        ];
    }
}
