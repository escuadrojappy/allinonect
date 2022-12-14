<?php

namespace App\Api\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{
    DB,
    Mail,
};
use App\Api\Repositories\{
    VisitorRepository
};
use App\Http\Resources\{
    VisitorResource,
    VisitorResourceCollection,
};
use App\Mail\{
    RegisteredVisitorMail,
};

class VisitorService extends Service {
    /**
     * The Visitor Repository Instance.
     *
     * @var App\Api\Repositories\VisitorRepository
     */
    protected $visitorRepository;

    public function __construct(
        VisitorRepository $visitorRepository,
    ) {
        $this->visitorRepository = $visitorRepository;
    }

    /**
     * Search Visitor.
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(array $request)
    {
        $result = $this->visitorRepository->search($request);

        $response = $this->dataTableResponse($result, $request);

        $data = new VisitorResourceCollection(Arr::get($response, 'data'));

        Arr::set($response, 'data', $data);
        
        return response()->json($response);
    }

    /**
     * Update Visitor.
     *
     * @param int $id
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, array $request)
    {
        DB::beginTransaction();
        
        try {
            $update = $this->visitorRepository->update($id, $request);

            if (Arr::get($request, 'email')) {
                if (!Arr::get($update, 'user.email')) {
                    $lastFourCardNumber = substr(Arr::get($update, 'philsys_card_number'), -4);
                    $lastName = strtoupper(Arr::get($update, 'last_name'));
                    $generatePassword = $lastName. '-'. $lastFourCardNumber;
                    $emailParam = [
                        'email' => Arr::get($request, 'email'),
                        'name' => Arr::get($update, 'first_name'). ' '. Arr::get($update, 'last_name'),
                        'password' => $generatePassword,
                    ];
                    Mail::to(Arr::get($request, 'email'))->send(new RegisteredVisitorMail($emailParam));
                }
                $email = ['email' => Arr::get($request, 'email')];
                $update->user()->update($email);
            }

            DB::commit();
            
            return response()->json($update);

        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            throw $e;
        }
    }

    /**
     * Destory Visitor.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $destroy = $this->visitorRepository->destroy($id);

        return response()->json($destroy);
    }
}