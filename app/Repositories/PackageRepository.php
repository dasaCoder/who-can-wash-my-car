<?php

namespace App\Repositories;

use App\Models\Package;

class PackageRepository extends Repository
{
    public function __construct(Package $package)
    {
        parent::__construct($package);
    }

    //
}
