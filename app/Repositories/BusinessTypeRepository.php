<?php

namespace App\Repositories;

use App\Models\BusinessType;

class BusinessTypeRepository extends Repository
{
    public function __construct(BusinessType $businessType)
    {
        parent::__construct($businessType);
    }

    //
}
