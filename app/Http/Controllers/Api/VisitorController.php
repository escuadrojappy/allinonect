<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Api\Services\VisitorService;
use App\Http\Requests\Admin\{
   VisitorRequest,
};

class VisitorController extends Controller
{
   /**
     * The service instance.
     *
     * @return \App\Api\Services\VisitorService $visitorService
     */
    protected $visitorService;

    /**
     * Create service instance.
     *
     * @param \App\Api\Services\VisitorService $visitorService
     */
    public function __construct(VisitorService $visitorService)
    {
        $this->visitorService = $visitorService;
    }

 /**
     * Search Visitor.
     *
     * @param \App\Http\Requests\Search\VisitorRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(VisitorRequest $request)
    {
        return $this->visitorService->search($request->validated());
    }
}
