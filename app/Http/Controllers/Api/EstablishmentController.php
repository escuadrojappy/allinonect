<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Api\Services\EstablishmentService;
use App\Http\Requests\Establishment\{
    ScanEstablishmentVisitorRequest,
    ContactTracingEstablishmentRequest,
    GenerateContactTracingEstablishmentReportRequest,
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
     * Scan Visitor.
     *
     * @param \App\Http\Requests\Establishment\ScanEstablishmentVisitorRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function scan(ScanEstablishmentVisitorRequest $request)
    {
        return $this->establishmentService->scan($request->validated());
    }

    /**
     * Establishment Contact Tracing.
     *
     * @param \App\Http\Requests\Establishment\ContactTracingEstablishmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function contactTracing(ContactTracingEstablishmentRequest $request)
    {
        return $this->establishmentService->contactTracing($request->validated());
    }

    /**
     * Generate Report Contact Tracing.
     *
     * @param \App\Http\Requests\Establishment\GenerateContactTracingEstablishmentReportRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateContactTracingReport(GenerateContactTracingEstablishmentReportRequest $request)
    {
        return $this->establishmentService->generateContactTracingReport($request->validated());
    }
}
