<?php

namespace App\Services;

use App\Repositories\SubscriptionDurationRepository;

class SubscriptionDurationService extends Service
{
    /**
     * @var SubscriptionDurationRepository
     */
    protected $repository;

    public function __construct(SubscriptionDurationRepository $subscriptionDurationRepository)
    {
        $this->repository = $subscriptionDurationRepository;
    }

    //
}
