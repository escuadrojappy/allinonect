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
}
