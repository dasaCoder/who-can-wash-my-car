<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Charith Gamage
 * @date 2022-06-18
 */
class Repository
{
    /**
     * Model property on class instances
     *
     * @var Model
     */
    protected $model;

    /**
     * Constructor to bind model to repo
     *
     * @param  Model  $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Return all records
     *
     * @return \Illuminate\Database\Eloquent\Collection|Model[]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Return all active records
     *
     * @return mixed
     */
    public function allActive()
    {
        return $this->model->active()->get();
    }

    /**
     * Find a record by id
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Create a record
     *
     * @param  array  $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
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
        return $this->model->findOrFail($id)->update($data);
    }

    /**
     * Update or create a record
     *
     * @param  array  $exist
     * @param  array  $data
     * @return mixed
     */
    public function updateOrCreate(array $exist, array $data)
    {
        return $this->model->updateOrCreate($exist, $data);
    }

    /**
     * Delete a record
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    /**
     * Delete many record with primary keys
     *
     * @param  array  $ids
     */
    public function deleteMany(array $ids)
    {
        $this->model->destroy($ids);
    }

    /**
     * Change the status of record
     *
     * @param $status
     * @param $id
     * @return mixed
     */
    public function changeStatus($status, $id)
    {
        return $this->model->findOrFail($id)->update(['status' => $status]);
    }
}
