<?php

namespace App\Repositories;

use App\Models\SubscriptionDuration;

class SubscriptionDurationRepository extends Repository
{
    public function __construct(SubscriptionDuration $subscriptionDuration)
    {
        parent::__construct($subscriptionDuration);
    }

    //
}
