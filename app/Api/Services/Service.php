<?php

namespace App\Api\Services;

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
}
