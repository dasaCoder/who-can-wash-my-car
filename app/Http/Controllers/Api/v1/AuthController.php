<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\AuthRequest;
use App\Services\AvailabilityService;
use App\Services\LocationService;
use App\Services\BusinessProfileService;
use App\Services\PersonalProfileService;
use App\Services\ServiceService;
use App\Services\UserService;
use App\Services\VehicleService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class AuthController extends ApiController
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var PersonalProfileService
     */
    private $personalProfileService;
    /**
     * @var BusinessProfileService
     */
    private $businessProfileService;
    /**
     * @var LocationService
     */
    private $locationService;
    /**
     * @var ServiceService
     */
    private $serviceService;
    /**
     * @var AvailabilityService
     */
    private $availabilityService;
    /**
     * @var VehicleService
     */
    private $vehicleService;

    function __construct(
        UserService $userService,
        PersonalProfileService $personalProfileService,
        BusinessProfileService $businessProfileService,
        LocationService $locationService,
        ServiceService $serviceService,
        AvailabilityService $availabilityService,
        VehicleService $vehicleService
    ) {
        $this->userService = $userService;
        $this->personalProfileService = $personalProfileService;
        $this->businessProfileService = $businessProfileService;
        $this->locationService = $locationService;
        $this->serviceService = $serviceService;
        $this->availabilityService = $availabilityService;
        $this->vehicleService = $vehicleService;
    }

    /**
     * @param  AuthRequest  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-18
     * Summary: User Login
     */
    public function login(AuthRequest $request)
    {
        try {

            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();

                if ((Request::is('api/v1/pro-partner/*') && !$user->hasRole('pro-partner')) || (Request::is('api/v1/customer/*') && !$user->hasRole('customer'))) {
                    Auth::logout();

                    return $this->sendResponse('error', __('messages.unauthorised'), [], 401);
                }

                if ($user->account_type == 'Personal') {
                    $data['user'] = [
                        'id' => $user->id,
                        'account_type' => $user->account_type,
                        'username' => $user->username,
                        'email' => $user->email,
                        'phone' => $user->phone,

                        'first_name' => $user->personalProfile->first_name,
                        'last_name' => $user->personalProfile->last_name,
                        'full_name' => $user->personalProfile->full_name,
                        'image_url' => $user->personalProfile->image_url
                    ];
                } elseif ($user->account_type == 'Business') {
                    $data['user'] = [
                        'id' => $user->id,
                        'account_type' => $user->account_type,
                        'username' => $user->username,
                        'email' => $user->email,
                        'phone' => $user->phone,

                        'business_type_id' => $user->businessProfile->business_type_id,
                        'business_type' => $user->businessProfile->businessType->name,
                        'business_name' => $user->businessProfile->business_name,
                        'image_url' => $user->businessProfile->image_url
                    ];
                }

                $data['token'] = $user->createToken('auth-token')->plainTextToken;

                return $this->sendResponse('success', __('messages.login_success'), $data, 200);
            }

            return $this->sendResponse('error', __('messages.unauthorised'), [], 401);
        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-18
     * Summary: User Logout
     */
    public function logout()
    {
        try {

            Auth::user()->tokens()->delete();

            return $this->sendResponse('success', __('messages.logout_success'), [], 200);
        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  RegisterRequest  $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-18
     * Summary: User register
     */
    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {

            if (Request::is('api/v1/pro-partner/*')) {
                $proPartner = $this->userService->create($request->validated())->assignRole('pro-partner'); //Create pro partner and assign role

                if ($request->account_type == "Personal") {

                    $this->personalProfileService->createAndAssign($request->validated(), $proPartner); //Create personal profile and assign to pro partner

                    $this->locationService->createManyAndAssign($request->validated(), $proPartner); //Create multiple locations and assign to pro partner

                    $this->serviceService->assign($request->validated(), $proPartner); //Services assign to pro partner

                    $this->availabilityService->createManyAndAssign($request->validated(), $proPartner); //Create multiple availabilities and assign to pro partner

                } elseif ($request->account_type == "Business") {

                    $this->businessProfileService->createAndAssign($request->validated(), $proPartner); //Create business profile and assign to pro partner

                }
            } elseif (Request::is('api/v1/customer/*')) {

                $customer = $this->userService->create($request->validated())->assignRole('customer'); //Create customer and assign role

                if ($request->account_type == "Personal") {

                    $this->personalProfileService->createAndAssign($request->validated(), $customer); //Create profile and assign to customer

                } elseif ($request->account_type == "Business") {

                    $this->businessProfileService->createAndAssign($request->validated(), $customer); //Create business profile and assign to customer

                }

                $this->locationService->createManyAndAssign($request->validated(), $customer); //Create multiple locations and assign to customer

                $this->vehicleService->createManyAndAssign($request->validated(), $customer); //Create vehicle and assign to customer

            }

            DB::commit();
            return $this->sendResponse('success', __('messages.register_success'), [], 200);
        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }
}
