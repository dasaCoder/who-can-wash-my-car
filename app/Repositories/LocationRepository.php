<?php

namespace App\Repositories;

use App\Models\Location;
use Illuminate\Support\Facades\DB;

class LocationRepository extends Repository
{
    public function __construct(Location $location)
    {
        parent::__construct($location);
    }

    //
}
