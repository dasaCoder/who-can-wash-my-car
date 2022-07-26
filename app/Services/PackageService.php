<?php

namespace App\Services;

use App\Repositories\PackageRepository;
use Illuminate\Support\Arr;

class PackageService extends Service
{
    /**
     * @var PackageRepository
     */
    protected $repository;

    public function __construct(PackageRepository $packageRepository)
    {
        $this->repository = $packageRepository;
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
            $data['image'] = $data['image']->store('images/packages', 'public');
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
            $data['image'] = $data['image']->store('images/packages', 'public');
        }

        return $this->repository->update($data, $id);
    }
}
