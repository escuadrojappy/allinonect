<?php

namespace App\Api\Traits;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Builder;

trait EloquentBuilder {

    /**
     * Order By using collection.
     *
     * @var bool
     */
    protected $orderByUsingCollection = false;

    /**
     * Request Parameters.
     *
     * @var array
     */
    protected $request;

    /**
     * Query Builder.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected $query;

    /**
     * Create Model Instance.
     *
     * @param array $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function eloquentSearch(array $request)
    {
        $this->request = $request;
        $this->query = $this->model->query();

        return $this->relationFields()
            ->searchableFields()
            ->orderByColumn()
            ->queryResult()
            ->sortByCollection();
    }

    /**
     * Get Relation Fields.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function relationFields()
    {
        if (isset($this->relationFields)) {
            $this->query = $this->query->with($this->relationFields);
        }

        return $this;
    }

    /**
     * Search on searchable fields.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function searchableFields()
    {
        $search = Arr::get($this->request, 'search');

        if ($search) {
            $count = 0;
            foreach ($this->searchableFields as $key => $field) {
                if (!str_contains($field, '.')) {
                    $this->query = $this->query->orWhere($field, 'LIKE', '%' . $search . '%');
                } else {
                    $splitField = explode('.', $field);
                    $this->query = $this->query->orWhereHas($splitField[0], function (Builder $query) use ($search, $splitField, $count) {
                        $query->where(function ($query) use ($search, $splitField, $count) {
                            if ($count == 0) {
                                $query->where($splitField[1], 'like', '%'.$search.'%');
                            } else {
                                $query->orWhere($splitField[1], 'like', '%'.$search.'%');
                            }
                            $count = $count + 1;
                        });
                    });
                }
            }
        }
        
        return $this;
    }

    /**
     * Order By specific column.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function orderByColumn()
    {
        $order = Arr::get($this->request, 'order');

        if (Arr::has($this->request, 'order')) {
            if (!str_contains(Arr::get($order, 'column'), '.')) {
                $this->query = $this->query->orderBy(Arr::get($order, 'column'), Arr::get($order, 'dir'));
            } else {
                // $this->orderByUsingCollection = true;
            }
        }

        return $this;
    }

    /**
     * Query Result.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Pagination\LengthAwarePaginator
     */
    protected function queryResult()
    {
        if (Arr::has($this->request, 'per_page')) {
            $this->query = $this->query->paginate(Arr::get($this->request, 'per_page'));
        } else {
            $this->query = $this->query->get();
        }

        return $this;
    }

    /**
     * Query Result.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\LengthAwarePaginator
     */
    protected function sortByCollection()
    {
        $order = Arr::get($this->request, 'order');

        if ($this->orderByUsingCollection) {
            $result = $this->query->toArray();
            if (Arr::get($order, 'dir') == 'asc') {
                $this->query = $this->query->sortBy(Arr::get($order, 'column'))->values();
            } else {
                $this->query = $this->query->sortByDesc(Arr::get($order, 'column'))->values();
            }
            Arr::set($result, 'data', $this->query);
            return collect($result);
        }

        return $this->query;
    }

}