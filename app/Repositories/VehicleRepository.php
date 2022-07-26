<?php

namespace App\Repositories;

use App\Models\Vehicle;

class VehicleRepository extends Repository
{
    public function __construct(Vehicle $vehicle)
    {
        parent::__construct($vehicle);
    }

    /**
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Get by user
     */
    public function getByUser($id)
    {
        return $this->model->where('user_id', $id)->active()->get();
    }
}
