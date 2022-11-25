<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Api\Services\EstablishmentService;
use App\Http\Requests\{
    AdminSearchRequest,
};

class EstablishmentController extends Controller
{
    /**
     * The service instance.
     *
     * @return \App\Api\Services\EstablishmentService $establishmentService
     */
    protected $establishmentService;

    /**
     * Create service instance.
     *
     * @param \App\Api\Services\EstablishmentService $establishmentService
     */
    public function __construct(EstablishmentService $establishmentService)
    {
        $this->establishmentService = $establishmentService;
    }

    /**
     * Search Establishment.
     *
     * @param \App\Http\Requests\AdminSearchRequest @request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(AdminSearchRequest $request)
    {
        return $this->establishmentService->search($request->validated());
    }
}
