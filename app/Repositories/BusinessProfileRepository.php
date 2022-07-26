<?php

namespace App\Repositories;

use App\Models\BusinessProfile;

class BusinessProfileRepository extends Repository
{
    public function __construct(BusinessProfile $businessProfile)
    {
        parent::__construct($businessProfile);
    }

    //
}
