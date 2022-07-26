<?php

namespace App\Repositories;

use App\Models\PersonalProfile;

class PersonalProfileRepository extends Repository
{
    public function __construct(PersonalProfile $personalProfile)
    {
        parent::__construct($personalProfile);
    }

    //
}
