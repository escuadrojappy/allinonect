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

        return response()->json($response);
    }
}
