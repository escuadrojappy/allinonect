<?php

namespace App\Api\Services;

use App\Api\Repositories\{
    EstablishmentRepository,
};

class EstablishmentService extends Service
{
    /**
     * Create repository instance.
     *
     * @param App\Api\Repositories\EstablishmentRepository $establishmentRepository
     */
    public function __construct(EstablishmentRepository $establishmentRepository)
    {
        $this->establishmentRepository = $establishmentRepository;
    }

    /**
     * Search Establishment.
     *
     * @param array $request
     * @return
     */
    public function search(array $request)
    {
        return $this->establishmentRepository->search($request);
    }
}
