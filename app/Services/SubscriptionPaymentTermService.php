<?php

namespace App\Services;

use App\Repositories\SubscriptionPaymentTermRepository;

class SubscriptionPaymentTermService extends Service
{
    /**
     * @var SubscriptionPaymentTermRepository
     */
    protected $repository;

    public function __construct(SubscriptionPaymentTermRepository $subscriptionPaymentTermRepository)
    {
        $this->repository = $subscriptionPaymentTermRepository;
    }

    //
}
