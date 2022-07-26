<?php

namespace App\Services;

use App\Repositories\VehicleRepository;
use Illuminate\Support\Arr;

class VehicleService extends Service
{
    /**
     * @var VehicleRepository
     */
    protected $repository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->repository = $vehicleRepository;
    }

    /**
     * @param $model
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Get related vehicles
     */
    public function getRelatedVehicles($model)
    {
        return $model->vehicles;
    }

    /**
     * @param  array  $data
     * @param $model
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Create vehicle and assign to model
     */
    public function createAndAssign(array $data, $model)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images/services', 'public');
        }

        $model->vehicles()->create($data);
    }

    /**
     * @param  array  $data
     * @param $model
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Create multiple vehicles and assign to model
     */
    public function createManyAndAssign(array $data, $model)
    {
        if(isset($data['vehicles'])) {
            foreach ($data['vehicles'] as $vehicle) {
                if (isset($vehicle['image'])) {
                    $vehicle['image'] = $vehicle['image']->store('images/services', 'public');
                }
                $model->vehicles()->create($vehicle);
            }
        }
    }
}
