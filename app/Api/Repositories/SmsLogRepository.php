<?php

namespace App\Api\Repositories;

use App\Models\SmsLog;
use App\Api\Traits\QueryBuilder;
use Illuminate\Support\Arr;

class SmsLogRepository extends Repository
{
    /**
     * Create Model Instance.
     *
     * @param \App\Models\SentSmsUser $sentSmsUser
     */
    public function __construct(SmsLog $smsLog)
    {
        $this->model = $smsLog;
    }
}
