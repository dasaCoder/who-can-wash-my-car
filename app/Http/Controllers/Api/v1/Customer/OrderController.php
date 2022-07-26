<?php

namespace App\Http\Controllers\Api\v1\Customer;

use App\Http\Controllers\Api\v1\ApiController;
use App\Services\AvailabilityService;
use App\Services\OrderService;
use App\Services\LocationService;
use App\Services\UserService;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends ApiController
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var LocationService
     */
    private $locationService;
    /**
     * @var AvailabilityService
     */
    private $availabilityService;
    /**
     * @var OrderService
     */
    private $orderService;

    function __construct(
        UserService $userService,
        LocationService $locationService,
        AvailabilityService $availabilityService,
        OrderService $orderService
    ) {
        $this->userService = $userService;
        $this->locationService = $locationService;
        $this->availabilityService = $availabilityService;
        $this->orderService = $orderService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-30
     * Summary: Get available pro partners
     */
    public function getAvailableProPartners(Request $request)
    {
        try {

            $customer = auth()->user();
            $customerLocation = $this->locationService->find($request->location_id); //Get customer location

            $proPartners = $this->userService->getNearestProPartners($customerLocation->latitude, $customerLocation->longitude); //Get nearest pro partners

            if(!count($proPartners) > 0) {
                return $this->sendResponse('error', 'Pro partners are not in this area', [], 200);
            }

            if($customer->account_type == "Personal") {

                $proPartners = $this->locationService->travelEstimation($proPartners, $request->job_date, $request->job_start, $request->job_end, $customerLocation);
                $proPartners = $this->availabilityService->filterByAvailability($proPartners);
                $proPartners = $this->orderService->filterByExistingOrders($proPartners);

                if (count($proPartners) > 0) {
                    return $this->sendResponse('success', 'Pro partners near you', [$this->mapProPartners($proPartners)], 200);
                }

                return $this->sendResponse('error', 'Pro Partners are not available for your selected time', [], 200);
            }

            if($customer->account_type == "Business") {

                $subscriptionPlan = $customer->subscriptionPlans->last();

                if(isset($subscriptionPlan) && $subscriptionPlan->status == "Active") {

                    $proPartners = $subscriptionPlan->subscriptionPackage->proPartners->pluck('id');
                    $subscriptionPlanProPartners = $nearestProPartners->whereIn('id', $proPartners);

                    $availableProPartners = $this->userService->filterByAvailability($subscriptionPlanProPartners, $request->job_date, $request->job_start, $request->job_end);

                    if(count($availableProPartners) > 0) {
                        return $this->sendResponse('success', 'Pro partners for your subscription plan', [$this->mapProPartners($availableProPartners)], 200);
                    } else {
                        return $this->sendResponse('success', 'Pro partners are not in this area', [], 200);
                    }

                } else {
                    return $this->sendResponse('success', 'Pro partners near you', [], 200); // check this again
                }

            }

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param $proPartners
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-30
     * Summary: Map pro partners response JSON
     */
    private function mapProPartners($proPartners)
    {
        return $proPartners->map(function ($proPartner) {
            $data = [
                'id' => $proPartner->id,
                'first_name' => $proPartner->personalProfile->first_name,
                'last_name' => $proPartner->personalProfile->last_name,
                'full_name' => $proPartner->personalProfile->full_name,
                'image_url' => $proPartner->personalProfile->image_url,
                'rating' => $proPartner->assignedOrders()->avg('ratings') ?? 0,
                'date' => $proPartner->date,
                'traveling_duration' => $proPartner->traveling_duration,
                'slot_start' => $proPartner->slot_start,
                'job_start' => $proPartner->job_start,
                'job_end' => $proPartner->job_end,
                'slot_end' => $proPartner->slot_end
            ];

            if(isset($proPartner->business_id)) {
                $data['employee'] = $proPartner->bussines->name;
            }

            return $data;
        })->take(5);
    }
}
