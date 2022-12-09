<?php

namespace App\Api\Repositories;

use App\Models\ScannedVisitor;
use App\Api\Traits\QueryBuilder;
use Illuminate\Support\Arr;

class ScannedVisitorRepository extends Repository
{
    /**
     * Create Model Instance.
     *
     * @param \App\Models\ScannedVisitor $scannedVisitor
     */
    public function __construct(ScannedVisitor $scannedVisitor)
    {
        $this->model = $scannedVisitor;
    }
}
