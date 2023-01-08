<?php

namespace App\Api\Repositories;

use App\Models\SentSmsUser;
use App\Api\Traits\QueryBuilder;
use Illuminate\Support\Arr;

class SentSmsUserRepository extends Repository
{
    /**
     * Create Model Instance.
     *
     * @param \App\Models\SentSmsUser $sentSmsUser
     */
    public function __construct(SentSmsUser $sentSmsUser)
    {
        $this->model = $sentSmsUser;
    }

    /**
     * Get Last batch number.
     *
     * @return \App\Models\SentSmsUser
     */
    public function getLastBatchNumber()
    {
        $batchNumber = $this->model->select('batch_no')->orderBy('id', 'desc')->first();

        if ($batchNumber) return Arr::get($batchNumber, 'batch_no') + 1;

        return 1;
    }
}
