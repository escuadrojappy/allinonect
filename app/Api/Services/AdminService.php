<?php

namespace App\Api\Services;

use Illuminate\Support\{
    Arr,
    Str
};
use Illuminate\Support\Facades\{
    DB,
    Mail,
};
use App\Mail\RegisteredEstablishmentMail;
use App\Http\Resources\{
    ContactTracingResource,
    ContactTracingResourceCollection,
};
use App\Api\Repositories\{
    AuthRepository,
    EstablishmentRepository,
    AdminContactTracingRepository
};
use App\Exports\AdminContactTracingExport;
use Excel;

class AdminService extends Service {

    /**
     * The Admin Contact Tracing Repository Instance.
     *
     * @var App\Api\Repositories\AdminContactTracingRepository
     */
    protected $adminContactTracingRepository;

    /**
     * The Establishment Repository Instance.
     *
     * @var App\Api\Repositories\EstablishmentRepository
     */
    protected $establishmentRepository;

    /**
     * The Auth Repository Instance.
     *
     * @var App\Api\Repositories\AuthRepository
     */
    protected $authRepository;
    
    /**
     * Create repository instance.
     *
     * @param App\Api\Repositories\AdminContactTracingRepository $adminContactTracingRepository
     * @param App\Api\Repositories\EstablishmentRepository $establishmentRepository
     * @param App\Api\Repositories\AuthRepository $authRepository
     */
    public function __construct(
        AdminContactTracingRepository $adminContactTracingRepository,
        EstablishmentRepository $establishmentRepository,
        AuthRepository $authRepository
    ) {
        $this->adminContactTracingRepository = $adminContactTracingRepository;
        $this->establishmentRepository = $establishmentRepository;
        $this->authRepository = $authRepository;
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

        $filePath = sprintf('%s/%s/%s', config('filesystems.disks.local.root'), 'contact-tracing', $xlsxName);

        return response()->download($filePath, $xlsxName, [
            'Content-type' => 'application/vnd.ms-excel',
            'filename' => $xlsxName
        ]);
    }

    /**
     * Registration User.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registrationEstablishment(array $request)
    {
        DB::beginTransaction();

        try {
            $temporaryPassword = Str::random(10);

            $paramsUser = [
                'email' => Arr::get($request, 'email'),
                'role_id' => Arr::get($request, 'role_id'),
                'password' => bcrypt($temporaryPassword),
            ];

            $user = $this->authRepository->create($paramsUser);

            $paramsEstablishment = [
                'name' => Arr::get($request, 'name'),
                'address' => Arr::get($request, 'address'),
                'contact_number' => Arr::get($request, 'contact_number'),
                'user_id' => Arr::get($user, 'id'),
            ];

            $establishment = $this->establishmentRepository->create($paramsEstablishment);

            DB::commit();

            $emailParam = [
                'email' => Arr::get($request, 'email'),
                'name' => Arr::get($request, 'name'),
                'password' => $temporaryPassword,
            ];

            Mail::to(Arr::get($request, 'email'))->send(new RegisteredEstablishmentMail($emailParam));

            return response()->json($establishment);

        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            throw $e;
        }
    }
}