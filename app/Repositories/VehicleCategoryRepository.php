<?php

namespace App\Repositories;

use App\Models\VehicleCategory;

class VehicleCategoryRepository extends Repository
{
    public function __construct(VehicleCategory $vehicleCategory)
    {
        parent::__construct($vehicleCategory);
    }

    //
}
