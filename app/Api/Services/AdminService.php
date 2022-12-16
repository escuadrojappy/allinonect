<?php

namespace App\Api\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{
    DB,
    Mail,
};
use App\Http\Resources\{
    ContactTracingResource,
    ContactTracingResourceCollection,
};
use App\Api\Repositories\{
    AdminContactTracingRepository
};
use App\Exports\AdminContactTracingExport;
use Excel;

class AdminService extends Service {
    /**
     * The Contact Tracing Repository Instance.
     *
     * @var App\Api\Repositories\AdminContactTracingRepository
     */
    protected $adminContactTracingRepository;
    
    /**
     * Create repository instance.
     *
     * @param App\Api\Repositories\AdminContactTracingRepository $adminContactTracingRepository
     */
    public function __construct(
        AdminContactTracingRepository $adminContactTracingRepository
    ) {
        
        $this->adminContactTracingRepository = $adminContactTracingRepository;
    }

    /**
     * Contact Tracing.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function contactTracing(array $request)
    {
        $result = $this->adminContactTracingRepository->search($request);
        
        $response = $this->dataTableResponse($result, $request);

        $data = new ContactTracingResourceCollection(Arr::get($response, 'data'));

        Arr::set($response, 'data', $data);

        return response()->json($response);
    }


     /**
     * Generate Report Contact Tracing.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateContactTracingReport(array $request)
    {
        $result = $this->adminContactTracingRepository->search($request);

        $xlsxName = str_replace(' ', '-', Arr::get(auth()->user(), 'admin.name')). '-contact-report-'. date('Y-m-d-H-i-s'). '.xlsx';
        
        Excel::store(new AdminContactTracingExport($result), sprintf('%s/%s', 'contact-tracing', $xlsxName));

        $filePath = sprintf('%s\%s\%s', config('filesystems.disks.local.root'), 'contact-tracing', $xlsxName);

        return response()->download($filePath, $xlsxName, [
            'Content-type' => 'application/vnd.ms-excel',
            'filename' => $xlsxName
        ]);
    }
}