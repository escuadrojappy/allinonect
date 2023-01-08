<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\Services\{
    AdminService,
    EstablishmentService,
    VisitorService,
};
use App\Http\Requests\Admin\{
    ContactTracingAdminRequest,
    GenerateContactTracingAdminReportRequest,
    RegistrationEstablishmentRequest,
    CreateVisitorRequest,
    CreateVisitorByQrCodeRequest,
    DestroyVisitorRequest,
    CreateVisitorHealthStatusRequest,
};
use App\Http\Requests\Establishment\{
    IndexEstablishmentRequest,
    DestroyEstablishmentRequest,
    UpdateEstablishmentRequest,
};
use App\Http\Requests\Search\{
    AdminSearchEstablishmentRequest,
};
use App\Http\Requests\Visitor\{
    UpdateVisitorRequest,
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
     * The Visitor service instance.
     *
     * @return \App\Api\Services\VisitorService $visitorService
     */
    protected $visitorService;

    /**
     * Create service instance.
     *
     * @param \App\Api\Services\AdminService $adminService
     * @param \App\Api\Services\EstablishmentService $establishmentService
     */
    public function __construct(
        AdminService $adminService,
        EstablishmentService $establishmentService,
        VisitorService $visitorService
    ) {
        $this->adminService = $adminService;
        $this->establishmentService = $establishmentService;
        $this->visitorService = $visitorService;
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

    /**
     * Create Visitor using form.
     *
     * @param \App\Http\Requests\Admin\CreateVisitorRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createVisitor(CreateVisitorRequest $request)
    {
        return $this->adminService->createVisitor($request->validated());
    }

    /**
     * Create Visitor using form.
     *
     * @param \App\Http\Requests\Admin\CreateVisitorByQrCodeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createVisitorByQrCode(CreateVisitorByQrCodeRequest $request)
    {
        return $this->adminService->createVisitorByQrCode($request->validated());
    }

    /**
     * Create Visitor using form.
     *
     * @param int $id
     * @param \App\Http\Requests\Visitor\UpdateVisitorRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateVisitor($id, UpdateVisitorRequest $request)
    {
        return $this->visitorService->update($id, $request->validated());
    }

    /**
     * Destroy Visitor.
     *
     * @param int $id
     * @param \App\Http\Requests\Admin\DestroyVisitorRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyVisitor($id, DestroyVisitorRequest $request)
    {
        return $this->visitorService->destroy($id, $request->validated());
    }

    /**
     * Create Visitor Health Status.
     *
     * @param \App\Http\Requests\Admin\CreateVisitorHealthStatusRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createVisitorHealthStatus(CreateVisitorHealthStatusRequest $request)
    {
        return $this->adminService->createVisitorHealthStatus($request->validated());
    }
}
