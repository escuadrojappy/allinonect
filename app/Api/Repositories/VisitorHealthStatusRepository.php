<?php

namespace App\Api\Repositories;

use App\Models\VisitorHealthStatus;
use App\Api\Traits\QueryBuilder;
use Illuminate\Support\Arr;

class VisitorHealthStatusRepository extends Repository
{
    /**
     * Create Model Instance.
     *
     * @param \App\Models\ScannedVisitor $scannedVisitor
     */
    public function __construct(VisitorHealthStatus $visitorHealthStatus)
    {
        $this->model = $visitorHealthStatus;
    }
}
