<?php

namespace App\Api\Services;

use App\Api\Repositories\{
    EstablishmentRepository,
};

class EstablishmentService extends Service
{
    /**
     * Create repository instance.
     *
     * @param App\Api\Repositories\EstablishmentRepository $establishmentRepository
     */
    public function __construct(EstablishmentRepository $establishmentRepository)
    {
        $this->establishmentRepository = $establishmentRepository;
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
