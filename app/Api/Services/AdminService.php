<?php

namespace App\Api\Services;

use Illuminate\Support\{
    Arr,
    Str
};
use Illuminate\Support\Facades\{
    App,
    DB,
    Mail,
};
use App\Mail\{
    RegisteredEstablishmentMail,
    RegisteredVisitorMail,
};
use App\Http\Resources\{
    ContactTracingResource,
    ContactTracingResourceCollection,
};
use App\Api\Repositories\{
    AuthRepository,
    EstablishmentRepository,
    AdminContactTracingRepository,
    VisitorRepository,
};
use App\Api\Services\SmsService;
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
     * The Visitor Repository Instance.
     *
     * @var App\Api\Repositories\VisitorRepository
     */
    protected $visitorRepository;
    
    /**
     * Create repository instance.
     *
     * @param App\Api\Repositories\AdminContactTracingRepository $adminContactTracingRepository
     * @param App\Api\Repositories\EstablishmentRepository $establishmentRepository
     * @param App\Api\Repositories\AuthRepository $authRepository
     * @param App\Api\Repositories\VisitorRepository $visitorRepository
     */
    public function __construct(
        AdminContactTracingRepository $adminContactTracingRepository,
        EstablishmentRepository $establishmentRepository,
        AuthRepository $authRepository,
        VisitorRepository $visitorRepository
    ) {
        $this->adminContactTracingRepository = $adminContactTracingRepository;
        $this->establishmentRepository = $establishmentRepository;
        $this->authRepository = $authRepository;
        $this->visitorRepository = $visitorRepository;
    }

    /**
     * Contact Tracing.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function contactTracing(array $request)
    {
        Arr::set($request, 'id', 'isNotNull');
        
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

    /**
     * Create Visitor using form.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createVisitor(array $request)
    {
        DB::beginTransaction();
        
        try {
            $cardNumber = Arr::get($request, 'philsys_card_number');
            $lastFourCardNumber = substr($cardNumber, -4);

            // Generate Password Example: CANCIO-{lastFourCardNumber}
            $generatePassword = strtoupper(Arr::get($request, 'last_name')). '-'. $lastFourCardNumber;
            
            $user = $this->authRepository->create([
                'email' => Arr::get($request, 'email'),
                'password' => bcrypt($generatePassword),
                'role_id' => config('models.roles.visitor'),
            ]);
            
            Arr::set($request, 'user_id', Arr::get($user, 'id'));

            $visitor = $this->visitorRepository->create(Arr::except($request, 'email'));

            DB::commit();

            $emailParam = [
                'email' => Arr::get($request, 'email'),
                'name' => Arr::get($request, 'first_name'). ' '. Arr::get($request, 'last_name'),
                'password' => $generatePassword,
            ];

            Mail::to(Arr::get($request, 'email'))->send(new RegisteredVisitorMail($emailParam));

            return response()->json([
                'visitor' => $visitor,
                'user' => $user,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            throw $e;
        }
    }

    /**
     * Create Visitor By Qr Code.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createVisitorByQrCode(array $request)
    {
        DB::beginTransaction();
        
        try {
            $request = Arr::get($request, 'result');
            $subject = Arr::get($request, 'subject');
            $cardNumber = Arr::get($subject, 'PCN');

            $lastFourCardNumber = substr($cardNumber, -4);

            // Generate Password Example: CANCIO-{lastFourCardNumber}
            $generatePassword = strtoupper(Arr::get($subject, 'lName')). '-'. $lastFourCardNumber;

            $user = $this->authRepository->create([
                'password' => bcrypt($generatePassword),
                'role_id' => config('models.roles.visitor'),
            ]);

            $visitor = $this->visitorRepository->create([
                'user_id' => Arr::get($user, 'id'),
                'first_name' => Arr::get($subject, 'fName'),
                'middle_name' => Arr::get($subject, 'mName'),
                'last_name' => Arr::get($subject, 'lName'),
                'birthdate' => date('Y-m-d', strtotime(Arr::get($subject, 'DOB'))),
                'place_of_birth' => Arr::get($subject, 'POB'),
                'philsys_card_number' => $cardNumber,
            ]);

            DB::commit();

            return response()->json([
                'user' => $user,
                'visitor' => $visitor,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            throw $e;
        }
    }

    /**
     * Create Visitor Health Status.
     *
     * @param array $request
     * @return array
     */
    public function createVisitorHealthStatus(array $request)
    {
        dd($request);
    }
}