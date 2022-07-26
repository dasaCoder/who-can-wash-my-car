<?php

namespace App\Services;

use App\Repositories\ServiceRepository;
use Illuminate\Support\Arr;

class ServiceService extends Service
{
    /**
     * @var ServiceRepository
     */
    protected $repository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->repository = $serviceRepository;
    }

    /**
     * @param  array  $data
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Store record
     */
    public function create(array $data)
    {
        $data = Arr::only($data, ['name', 'description', 'image']);

        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images/services', 'public');
        }

        return $this->repository->create($data);
    }

    /**
     * @param  array  $data
     * @param $id
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update record
     */
    public function update(array $data, $id)
    {
        $data = Arr::only($data, ['name', 'description', 'image']);

        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images/services', 'public');
        }

        return $this->repository->update($data, $id);
    }

    /**
     * @param  array  $data
     * @param $model
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Assign services to model
     */
    public function assign(array $data, $model)
    {
        return $model->services()->sync($data['services']);
    }
}
