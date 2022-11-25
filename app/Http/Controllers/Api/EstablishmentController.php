<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Api\Services\EstablishmentService;
use App\Http\Requests\Search\AdminSearchRequest;
use App\Http\Requests\Establishment\{
    DestroyEstablishment,
    UpdateEstablishmentRequest,
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
     * @param \App\Http\Requests\Search\AdminSearchRequest @request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(AdminSearchRequest $request)
    {
        return $this->establishmentService->search($request->validated());
    }

    /**
     * Update Establishment.
     *
     * @param int $id
     * @param \App\Http\Requests\Establishment\UpdateEstablishmentRequest @request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, UpdateEstablishmentRequest $request)
    {
        return $this->establishmentService->update($id, $request->validated());
    }

    /**
     * Destroy Establishment.
     *
     * @param int $id
     * @param \App\Http\Requests\Establishment\DestroyEstablishment @request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, DestroyEstablishment $request)
    {
        return $this->establishmentService->destroy($id);
    }
}
