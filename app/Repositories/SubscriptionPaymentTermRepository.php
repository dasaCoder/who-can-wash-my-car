<?php

namespace App\Repositories;

use App\Models\SubscriptionPaymentTerm;

class SubscriptionPaymentTermRepository extends Repository
{
    public function __construct(SubscriptionPaymentTerm $subscriptionPaymentTerm)
    {
        parent::__construct($subscriptionPaymentTerm);
    }

    //
}
