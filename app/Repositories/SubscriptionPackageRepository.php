<?php

namespace App\Repositories;

use App\Models\SubscriptionPackage;

class SubscriptionPackageRepository extends Repository
{
    public function __construct(SubscriptionPackage $subscriptionPackage)
    {
        parent::__construct($subscriptionPackage);
    }

    //
}
