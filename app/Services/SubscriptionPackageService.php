<?php

namespace App\Services;

use App\Repositories\SubscriptionPackageRepository;
use Illuminate\Support\Arr;

class SubscriptionPackageService extends Service
{
    /**
     * @var SubscriptionPackageRepository
     */
    protected $repository;

    public function __construct(SubscriptionPackageRepository $packageRepository)
    {
        $this->repository = $packageRepository;
    }

    /**
     * @param  array  $data
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-24
     * Summary: Store record
     */
    public function create(array $data)
    {
        $data = Arr::only($data, ['name', 'description', 'image']);

        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images/subscriptions', 'public');
        }

        return $this->repository->create($data);
    }

    /**
     * @param  array  $data
     * @param $id
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-24
     * Summary: Update record
     */
    public function update(array $data, $id)
    {
        $data = Arr::only($data, ['name', 'description', 'image']);

        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images/subscriptions', 'public');
        }

        return $this->repository->update($data, $id);
    }
}
