<?php

namespace App\Api\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository
{
    /**
     * The Primary Eloquent Model.
     *
     */
    protected $model;

    /**
     * Repository Model Instance.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function model()
    {
        return $this->model;
    }

    /**
     * Insert Repository Instance.
     *
     * @param array $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $request)
    {
        return $this->model->create($request);
    }

    /**
     * Update Repository Instance.
     *
     * @param array $request
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, array $request)
    {
        $model = $this->model->findOrFail($id);
        
        $model->update($request);
        
        return $model;
    }

    /**
     * Destroy Repository Instance.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        
        $model->delete();
        
        return $model;
    }
    

}
