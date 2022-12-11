<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Api\Services\EstablishmentService;
use App\Http\Requests\Search\AdminSearchRequest;
use App\Http\Requests\Establishment\{
    DestroyEstablishmentRequest,
    UpdateEstablishmentRequest,
    ScanEstablishmentVisitorRequest,
    IndexRequest,
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
     *  Lists of Establishments.
     *
     * @param \App\Http\Requests\Establishment\IndexRequest @request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return $this->establishmentService->index($request->validated());
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
     * Scan Visitor.
     *
     * @param \App\Http\Requests\Establishment\ScanEstablishmentVisitorRequest @request
     * @return \Illuminate\Http\JsonResponse
     */
    public function scan(ScanEstablishmentVisitorRequest $request)
    {
        return $this->establishmentService->scan($request->validated());
    }

    /**
     * Destroy Establishment.
     *
     * @param int $id
     * @param \App\Http\Requests\Establishment\DestroyEstablishmentRequest @request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, DestroyEstablishmentRequest $request)
    {
        return $this->establishmentService->destroy($id);
    }
}
