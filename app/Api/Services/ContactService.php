<?php

namespace App\Api\Services;

use App\Api\Repositories\ContactRepository;
use Illuminate\Support\Arr;

class ContactService extends Service
{
    /**
     * Create repository instance.
     *
     * @param App\Api\Repositories\ContactRepository $contactRepository
     */
    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create Contact.
     *
     * @param array $request
     * @return
     */
    public function store(array $request)
    {
        return $this->repository->create($request);
    }
}
