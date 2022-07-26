<?php

namespace App\Services;

use App\Repositories\VehicleCategoryRepository;
use Illuminate\Support\Arr;

class VehicleCategoryService extends Service
{
    /**
     * @var VehicleCategoryRepository
     */
    protected $repository;

    public function __construct(VehicleCategoryRepository $vehicleCategoryRepository)
    {
        $this->repository = $vehicleCategoryRepository;
    }

    /**
     * @param $id
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-24
     * Summary: Get Related Packages
     */
    public function getRelatedPackages($id)
    {
        return $this->repository->find($id)->packages;
    }

    /**
     * @param $vehicleCategories
     * @param $model
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-20
     * Summary: Assign vehicle categories to model
     */
    public function assign($data, $model)
    {
        $data = Arr::only($data, ['vehicleCategories']);

        $array = [];
        foreach ($data['vehicleCategories'] as $key => $vehicleCategory) {
            if (isset($vehicleCategory['price'])) {
                $array[$key] = $vehicleCategory;
            }
        }

        return $model->vehicleCategories()->sync($array);
    }
}
