<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository extends Repository
{
    public function __construct(Service $service)
    {
        parent::__construct($service);
    }

    //
}
