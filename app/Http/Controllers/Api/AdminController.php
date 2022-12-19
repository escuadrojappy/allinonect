<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\Services\{
    AdminService,
    EstablishmentService,
};
use App\Http\Requests\Admin\{
    ContactTracingAdminRequest,
    GenerateContactTracingAdminReportRequest,
    RegistrationEstablishmentRequest,
};
use App\Http\Requests\Establishment\{
    IndexEstablishmentRequest,
    DestroyEstablishmentRequest,
    UpdateEstablishmentRequest,
};
use App\Http\Requests\Search\{
    AdminSearchEstablishmentRequest
};

class AdminController extends Controller
{
    /**
     * The admin service instance.
     *
     * @return \App\Api\Services\AdminService $adminService
     */
    protected $adminService;

    /**
     * The Establishment service instance.
     *
     * @return \App\Api\Services\EstablishmentService $establishmentService
     */
    protected $establishmentService;

    /**
     * Create service instance.
     *
     * @param \App\Api\Services\AdminService $adminService
     * @param \App\Api\Services\EstablishmentService $establishmentService
     */
    public function __construct(
        AdminService $adminService,
        EstablishmentService $establishmentService
    ) {
        $this->adminService = $adminService;
        $this->establishmentService = $establishmentService;
    }

    /**
     *  Lists of Establishments.
     *
     * @param \App\Http\Requests\Establishment\IndexEstablishmentRequest @request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEstablishment(IndexEstablishmentRequest $request)
    {
        return $this->establishmentService->index($request->get('term'));
    }

    /**
     * Register Establishment User.
     *
     * @param \App\Http\Requests\Admin\RegistrationEstablishmentRequest @request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registrationEstablishment(RegistrationEstablishmentRequest $request)
    {
        return $this->adminService->registrationEstablishment($request->validated());
    }

    /**
     * Admin Contact Tracing.
     *
     * @param \App\Http\Requests\Admin\ContactTracingAdminRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function contactTracing(ContactTracingAdminRequest $request)
    {
        return $this->adminService->contactTracing($request->validated());
    }

      /**
     * Generate Report Contact Tracing.
     *
     * @param \App\Http\Requests\Admin\GenerateContactTracingAdminReportRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateContactTracingReport(GenerateContactTracingAdminReportRequest $request)
    {
        return $this->adminService->generateContactTracingReport($request->validated());
    }

    /**
     * Search Establishment.
     *
     * @param \App\Http\Requests\Search\AdminSearchEstablishmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchEstablishment(AdminSearchEstablishmentRequest $request)
    {
        return $this->establishmentService->search($request->validated());
    }

    /**
     * Update Establishment.
     *
     * @param int $id
     * @param \App\Http\Requests\Establishment\UpdateEstablishmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEstablishment($id, UpdateEstablishmentRequest $request)
    {
        return $this->establishmentService->update($id, $request->validated());
    }

    /**
     * Destroy Establishment.
     *
     * @param int $id
     * @param \App\Http\Requests\Establishment\DestroyEstablishmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyEstablishment($id, DestroyEstablishmentRequest $request)
    {
        return $this->establishmentService->destroy($id);
    }
}
