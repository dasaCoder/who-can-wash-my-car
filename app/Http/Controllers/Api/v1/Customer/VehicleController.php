<?php

namespace App\Http\Controllers\Api\v1\Customer;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Requests\Api\VehicleRequest;
use App\Services\VehicleService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VehicleController extends ApiController
{
    /**
     * @var VehicleService
     */
    private $vehicleService;

    function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Get vehicle by user
     */
    public function getByUser()
    {
        try {

            $data = $this->vehicleService->getRelatedVehicles(auth()->user())
                ->map(function ($item) {
                    return $item->only(['id', 'vehicle_category_id', 'registration_number', 'make', 'name', 'year_of_manufacture', 'mot_expiry_date', 'mot_status', 'tax_due_date', 'tax_status', 'image_url']);
                });

            return $this->sendResponse('success', __('messages.get_success', ['name' => 'Vehicles']), $data, 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  VehicleRequest  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Store Location
     */
    public function store(VehicleRequest $request)
    {
        DB::beginTransaction();
        try {

            $this->vehicleService->createAndAssign($request->validated(), auth()->user());

            DB::commit();
            return $this->sendResponse('success', __('messages.store_success', ['name' => 'Vehicle']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  VehicleRequest  $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update Location
     */
    public function update(VehicleRequest $request, $id)
    {
        DB::beginTransaction();
        try {

            $this->vehicleService->update($request->validated(), $id);

            DB::commit();
            return $this->sendResponse('success', __('messages.update_success', ['name' => 'Vehicle']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Destroy Location
     */
    public function destroy(int $id)
    {
        DB::beginTransaction();
        try {

            $this->vehicleService->delete($id);

            DB::commit();
            return $this->sendResponse('success', __('messages.destroy_success', ['name' => 'Vehicle']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }
}
