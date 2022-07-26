<?php

namespace App\Services;

use App\Repositories\SubscriptionPlanRepository;

class SubscriptionPlanService extends Service
{
    /**
     * @var SubscriptionPlanRepository
     */
    protected $repository;

    public function __construct(SubscriptionPlanRepository $subscriptionPlanRepository)
    {
        $this->repository = $subscriptionPlanRepository;
    }

    /**
     * @param $customer
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Get subscribed plan
     */
    public function getSubscribedPlan($customer)
    {
        return $customer->subscriptionPlans->last();
    }

    /**
     * @param $id
     * @param $customer
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-25
     * Summary: Buy subscription plan
     */
    public function buySubscriptionPlan($id, $customer)
    {
        $subscriptionPlan = $this->repository->find($id);

        $data[$subscriptionPlan->id] = [
            'start_date' => now(),
            'expiry_date' => now()->addMonth($subscriptionPlan->subscriptionDuration->months)
        ];

        return $customer->subscriptionPlans()->attach($data);
    }

    /**
     * @param $id
     * @param $customer
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-25
     * Summary: Renew subscription plan
     */
    public function renewSubscriptionPlan($id, $customer)
    {
        $subscriptionPlan = $this->repository->find($id);

        $data = [
            'start_date' => now(),
            'expiry_date' => now()->addMonth($subscriptionPlan->subscriptionDuration->months),
            'status' => 'Active'
        ];

        return $customer->subscriptionPlans()->updateExistingPivot($subscriptionPlan, $data);
    }

    /**
     * @param $id
     * @param $customer
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-25
     * Summary: Cancel subscription plan
     */
    public function cancelSubscriptionPlan($id, $customer)
    {
        $subscriptionPlan = $this->repository->find($id);

        return $customer->subscriptionPlans()->updateExistingPivot($subscriptionPlan, ['status' => 'Cancel']);
    }
}
