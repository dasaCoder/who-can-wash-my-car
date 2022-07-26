<?php

namespace App\Http\Controllers\Api\v1\Customer;

use App\Http\Controllers\Api\v1\ApiController;
use App\Services\SubscriptionPlanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubscriptionPlanController extends ApiController
{
    /**
     * @var SubscriptionPlanService
     */
    private $subscriptionPlanService;

    function __construct(SubscriptionPlanService $subscriptionPlanService)
    {
        $this->subscriptionPlanService = $subscriptionPlanService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-25
     * Summary: Get Subscription Plans
     */
    public function getAll()
    {
        try {

            $data = $this->subscriptionPlanService->allActive()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'subscription_package_name' => $item->subscriptionPackage->name,
                        'subscription_package_description' => $item->subscriptionPackage->description,
                        'subscription_duration' => $item->subscriptionDuration->months,
                        'subscription_payment_term' => $item->subscriptionPaymentTerm->term,
                        'price' => $item->price,
                        'image' => $item->subscriptionPackage->image
                    ];
                });

            return $this->sendResponse('success', __('messages.get_success', ['name' => 'Subscription plans']), $data, 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-25
     * Summary: Get subscribed plan
     */
    public function getSubscribedPlan()
    {
        try {

            $data = $this->subscriptionPlanService->getSubscribedPlan(auth()->user());

            return $this->sendResponse('success', __('messages.get_success', ['name' => 'Subscribed plan']), $data, 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-25
     * Summary: Buy Subscription Plan
     */
    public function buySubscriptionPlan(Request $request)
    {
        DB::beginTransaction();
        try {

            $this->subscriptionPlanService->buySubscriptionPlan($request->subscription_plan_id, auth()->user());

            DB::commit();
            return $this->sendResponse('success', __('messages.buy_success', ['name' => 'Subscription plan']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-25
     * Summary: Renew Subscription Plan
     */
    public function renewSubscriptionPlan(Request $request)
    {
        DB::beginTransaction();
        try {

            $this->subscriptionPlanService->renewSubscriptionPlan($request->subscription_plan_id, auth()->user());

            DB::commit();
            return $this->sendResponse('success', __('messages.renew_success', ['name' => 'Subscription plan']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-25
     * Summary: Cancel Subscription Plan
     */
    public function cancelSubscriptionPlan(Request $request)
    {
        DB::beginTransaction();
        try {

            $this->subscriptionPlanService->cancelSubscriptionPlan($request->subscription_plan_id, auth()->user());

            DB::commit();
            return $this->sendResponse('success', __('messages.cancel_success', ['name' => 'Subscription plan']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }
}
