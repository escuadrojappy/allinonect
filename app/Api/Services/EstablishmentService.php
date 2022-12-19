<?php

namespace App\Api\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{
    DB,
    Mail,
    Storage,
};
use App\Http\Resources\{
    ContactTracingResource,
    ContactTracingResourceCollection,
};
use App\Api\Repositories\{
    EstablishmentRepository,
    VisitorRepository,
    AuthRepository,
    ScannedVisitorRepository,
    EstablishmentContactTracingRepository,
};
use App\Exports\EstablishmentContactTracingExport;
use Excel;

class EstablishmentService extends Service
{
    /**
     * The Auth Repository Instance.
     *
     * @var App\Api\Repositories\AuthRepository
     */
    protected $authRepository;

    /**
     * The Establishment Repository Instance.
     *
     * @var App\Api\Repositories\EstablishmentRepository
     */
    protected $establishmentRepository;

    /**
     * The Visitor Repository Instance.
     *
     * @var App\Api\Repositories\VisitorRepository
     */
    protected $visitorRepository;

    /**
     * The Scanned Visitor Repository Instance.
     *
     * @var App\Api\Repositories\ScannedVisitorRepository
     */
    protected $scannedVisitorRepository;

    /**
     * The Contact Tracing Repository Instance.
     *
     * @var App\Api\Repositories\EstablishmentContactTracingRepository
     */
    protected $establishmentContactTracingRepository;

    /**
     * Create repository instance.
     *
     * @param App\Api\Repositories\EstablishmentRepository $establishmentRepository
     * @param App\Api\Repositories\VisitorRepository $visitorRepository
     * @param App\Api\Repositories\AuthRepository $authRepository
     * @param App\Api\Repositories\ScannedVisitorRepository $scannedVisitorRepository
     * @param App\Api\Repositories\EstablishmentContactTracingRepository $establishmentContactTracingRepository
     */
    public function __construct(
        EstablishmentRepository $establishmentRepository,
        VisitorRepository $visitorRepository,
        AuthRepository $authRepository,
        ScannedVisitorRepository $scannedVisitorRepository,
        EstablishmentContactTracingRepository $establishmentContactTracingRepository
    ) {
        $this->establishmentRepository = $establishmentRepository;
        $this->visitorRepository = $visitorRepository;
        $this->authRepository = $authRepository;
        $this->scannedVisitorRepository = $scannedVisitorRepository;
        $this->establishmentContactTracingRepository = $establishmentContactTracingRepository;
    }

    /**
     * Lists of Establishments.
     *
     * @param array $search
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(array $search)
    {
        $term = Arr::get($search, 'term');

        if ($term) {
            $result = $this->establishmentRepository->search(['search' => $term]);
        } else {
            $result = $this->establishmentRepository->search([]);
        }

        return response()->json($result);
    }

    /**
     * Search Establishment.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(array $request)
    {
        $result = $this->establishmentRepository->search($request);

        $response = $this->dataTableResponse($result, $request);

        return response()->json($response);
    }

    /**
     * Update Establishment.
     *
     * @param int $id
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, array $request)
    {
        $update = $this->establishmentRepository->update($id, $request);

        return response()->json($update);
    }

    /**
     * Scan Vistitor Establishment.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function scan(array $request)
    {
        DB::beginTransaction();

        try {
            // Convert QR Code Result to Array
            $qrcodeResult = json_decode(Arr::get($request, 'qrcode_result'), true);
            $pcnSubject = Arr::get($qrcodeResult, 'subject');
            $cardNumber = Arr::get($pcnSubject, 'PCN');
            $visitor = $this->visitorRepository->checkIfPcnExists(trim($cardNumber, ''));

            if (!$visitor) {
                $accounts = $this->createVisitorByQrCode($cardNumber, $pcnSubject);

                $visitor = Arr::get($accounts, 'visitor');

                $user = Arr::get($accounts, 'user');
            }

            $scanned = $this->scannedVisitorRepository->create([
                'visitor_id' => Arr::get($visitor, 'id'),
                'establishment_id' => Arr::get($request, 'establishment_id'),
                'entrance_timestamp' => date('Y-m-d H:i:s'),
            ]);

            DB::commit();

            return response()->json([
                'visitor' => $visitor,
                'scanned' => $scanned,
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
     * @param string $cardNumber
     * @param array $subject
     * @return array
     */
    private function createVisitorByQrCode(string $cardNumber, array $subject)
    {
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

        return [
            'user' => $user,
            'visitor' => $visitor,
        ];
    }

    /**
     * Contact Tracing.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function contactTracing(array $request)
    {
        $result = $this->establishmentContactTracingRepository->search($request);
        
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
        $result = $this->establishmentContactTracingRepository->search($request);

        $xlsxName = str_replace(' ', '-', Arr::get(auth()->user(), 'establishment.name')). '-contact-report-'. date('Y-m-d-H-i-s'). '.xlsx';

        Excel::store(new EstablishmentContactTracingExport($result), sprintf('%s/%s', 'contact-tracing', $xlsxName));
        
        $filePath = sprintf('%s/%s/%s', config('filesystems.disks.local.root'), 'contact-tracing', $xlsxName);

        return response()->download($filePath, $xlsxName, [
            'Content-type' => 'application/vnd.ms-excel',
            'filename' => $xlsxName
        ]);
    }

     /**
     * Destory Establishment.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $destroy = $this->establishmentRepository->destroy($id);

        return response()->json($destroy);
    }
}
