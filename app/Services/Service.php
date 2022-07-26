<?php

namespace App\Services;

use App\Repositories\Repository;

/**
 * @author Charith Gamage
 * @date 2022-06-18
 */
class Service
{
    /**
     * Return all records
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function all()
    {
        return $this->repository->all();
    }

    /**
     * Return all active records
     *
     * @return mixed
     */
    public function allActive()
    {
        return $this->repository->allActive();
    }

    /**
     * Find a record by id
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * Create a record
     *
     * @param  array  $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * Update a record
     *
     * @param  array  $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

    /**
     * Delete a record
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    /**
     * Delete many record with primary keys
     *
     * @param  array  $ids
     */
    public function deleteMany(array $ids)
    {
        $this->repository->deleteMany($ids);
    }

    /**
     * Change the status of record
     *
     * @param $request
     * @return mixed
     */
    public function changeStatus($request)
    {
        $id = $request->id;
        $status = $request->status;

        return $this->repository->changeStatus($status, $id);
    }
}
