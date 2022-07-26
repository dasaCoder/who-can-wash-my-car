<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\OtpSendRequest;
use App\Http\Requests\Api\OtpVerifyRequest;
use App\Services\BankService;
use App\Services\BusinessTypeService;
use App\Services\OtpCodeService;
use App\Services\VehicleCategoryService;
use Illuminate\Support\Facades\Log;

class CommonController extends ApiController
{
    /**
     * @var OtpCodeService
     */
    private $otpCodeService;
    /**
     * @var BankService
     */
    private $bankService;
    /**
     * @var BusinessTypeService
     */
    private $businessTypeService;
    /**
     * @var VehicleCategoryService
     */
    private $vehicleCategoryService;

    function __construct(
        OtpCodeService $otpCodeService,
        BankService $bankService,
        BusinessTypeService $businessTypeService,
        VehicleCategoryService $vehicleCategoryService
    ) {
        $this->otpCodeService = $otpCodeService;
        $this->bankService = $bankService;
        $this->businessTypeService = $businessTypeService;
        $this->vehicleCategoryService = $vehicleCategoryService;
    }

    public function otpSend(OtpSendRequest $request)
    {
        try {

            $this->otpCodeService->otpSend($request->validated());

            return $this->sendResponse('success', __('messages.otp_send'), [], 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    public function otpVerify(OtpVerifyRequest $request)
    {
        try {

            if ($this->otpCodeService->otpVerify($request->validated())) {
                return $this->sendResponse('success', __('messages.otp_correct'), [], 200);
            } else {
                return $this->sendResponse('error', __('messages.otp_incorrect'), [], 422);
            }

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Get Banks
     */
    public function getAllBanks()
    {
        try {

            $data = $this->bankService->allActive()
                ->map(function ($item) {
                    return $item->only(['id', 'bank_name']);
                });

            return $this->sendResponse('success', __('messages.get_success', ['name' => 'Banks']), $data, 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Get branches by bank
     */
    public function getBranchesByBank($bank_id)
    {
        try {

            $data = $this->bankService->getRelatedBranches($bank_id)
                ->map(function ($item) {
                    return $item->only(['id', 'branch_name']);
                });

            return $this->sendResponse('success', __('messages.get_success', ['name' => 'Branches']), $data, 200);

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
     * Summary: Get all business types
     */
    public function getAllBusinessTypes()
    {
        try {

            $data = $this->businessTypeService->allActive()
                ->map(function ($item) {
                    return $item->only(['id', 'name']);
                });

            return $this->sendResponse('success', __('messages.get_success', ['name' => 'Business types']), $data, 200);

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
     * Summary: Get all vehicle categories
     */
    public function getAllVehicleCategories()
    {
        try {

            $data = $this->vehicleCategoryService->allActive()
                ->map(function ($item) {
                    return $item->only(['id', 'name', 'image_url']);
                });

            return $this->sendResponse('success', __('messages.get_success', ['name' => 'Vehicle categories']), $data, 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }
}
