<?php

namespace App\Api\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

trait QueryBuilder {

    /**
     * Soft Delete.
     *
     * @var bool
     */
    protected $hasSoftDelete = false;

    /**
     * Table Name.
     *
     * @var string
     */
    protected $table;

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
    public function search(array $request)
    {
        $this->request = $request;
        $this->table = $this->model->getTable();
        $this->query = DB::table($this->table);
        $this->hasSoftDelete = in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($this->model));
        
        return $this->selectFields()
            ->joinTables()
            ->customJoinTables()
            ->searchableFields()
            ->whereFields()
            ->orderByColumn()
            ->queryResult()
            ->transform();
    }

    /**
     * Get Select Fields.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function selectFields()
    {
        if (isset($this->searchableFields)) {
            $this->query = $this->query->select($this->searchableFields);
        }

        return $this;
    }

    /**
     * Get Joined Tables.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function joinTables()
    {
        if (isset($this->joinTables)) {
            foreach ($this->joinTables as $table => $values) {
                $joinType = Arr::get($values, 'type');
                $columns = Arr::get($values, 'columns');
                switch ($joinType) {
                    case 'left_join':
                        $this->query = $this->query->leftJoin($table, $columns[0], '=', $columns[1]);
                        break;
                }
            }
        }

        return $this;
    }

    /**
     * Custom Query Joins.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function customJoinTables()
    {
        if (isset($this->customJoins)) {
            foreach ($this->customJoins as $value) {
                $columns = Arr::get($value, 'columns');
                switch (Arr::get($value, 'type')) {
                    case 'left_join':
                        $this->query = $this->query->leftJoin(Arr::get($value, 'query'), $columns[0], '=', $columns[1]);
                        break;
                }
            }
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

        $this->query = $this->query->where(function ($query) use ($search) {
            if ($search) {
                foreach ($this->searchableFields as $key => $field) {
                    $query->orWhere($field, 'LIKE', '%' . $search . '%');
                }
            }

            if ($this->hasSoftDelete) {
                $this->query = $this->query->where(function ($query2) {
                    $query2->whereNull($this->table. '.deleted_at');
                });
            }
        });

        return $this;
    }

    /**
     * Where fields.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function whereFields()
    {
        if (isset($this->whereFields)) {
            foreach ($this->request as $key => $param) {
                if (in_array($key, $this->whereFields)) {
                    $this->query = $this->query->where(function ($query) use ($key, $param) {
                        switch ($key) {
                            case 'date_range':
                                foreach ($this->dateRangeField as $field) {
                                    foreach ($param as $value) {
                                        $this->query = $query->where($field, '>=', Arr::get($value, 'start_date'))
                                            ->where($field, '<=', Arr::get($value, 'end_date'));
                                    }
                                }
                                break;
                            default:
                                $this->query = $query->where($key, $param);
                                // for testing
                                // if ($key == 'covid_result') {
                                //     $this->query = $query->where('covid_result', $param);
                                // }
                        }
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
            $this->query = $this->query->orderBy(Arr::get($order, 'column'), Arr::get($order, 'dir'));
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
     * Transform Result.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\LengthAwarePaginator
     */
    protected function transform()
    {
        foreach ($this->query as $key => $row) {
            $row = json_decode(json_encode($row, true), true);
            $this->query[$key] = collect($row);
        }

        return $this->query;
    }

}