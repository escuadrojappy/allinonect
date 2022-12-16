<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\Services\AdminService;
use App\Http\Requests\Admin\{
    ContactTracingAdminRequest,
    GenerateContactTracingAdminReportRequest,
};


class AdminController extends Controller
{
    /**
     * The service instance.
     *
     * @return \App\Api\Services\AdminService $adminService
     */
    protected $adminService;

    /**
     * Create service instance.
     *
     * @param \App\Api\Services\AdminService $adminService
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
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
        alert ('hi');
    }
}
