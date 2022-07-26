<?php

namespace App\Repositories;

use App\Models\SubscriptionPlan;

class SubscriptionPlanRepository extends Repository
{
    public function __construct(SubscriptionPlan $subscriptionPlan)
    {
        parent::__construct($subscriptionPlan);
    }

    //
}
