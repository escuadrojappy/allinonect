<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Api\Services\AdminService;
use App\Http\Requests\Admin\ContactTracingAdminRequest;
use Illuminate\Http\Request;

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
}