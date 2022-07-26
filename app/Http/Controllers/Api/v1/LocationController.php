<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\LocationRequest;
use App\Services\LocationService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LocationController extends ApiController
{
    /**
     * @var LocationService
     */
    private $locationService;

    function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Get locations by user
     */
    public function getByUser()
    {
        try {

            $data = auth()->user()->locations
                ->map(function ($item) {
                    return $item->only(['id', 'location_name', 'line_1', 'line_2', 'city', 'state', 'country', 'postal_code', 'latitude', 'longitude', 'is_default_location']);
                });

            return $this->sendResponse('success', __('messages.get_success', ['name' => 'Locations']), $data, 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  LocationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Store Location
     */
    public function store(LocationRequest $request)
    {
        DB::beginTransaction();
        try {

            $this->locationService->createAndAssign($request->validated(), auth()->user());

            DB::commit();
            return $this->sendResponse('success', __('messages.store_success', ['name' => 'Location']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  LocationRequest  $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update Location
     */
    public function update(LocationRequest $request, $id)
    {
        DB::beginTransaction();
        try {

            $this->locationService->update($request->validated(), $id);

            DB::commit();
            return $this->sendResponse('success', __('messages.update_success', ['name' => 'Location']), [], 200);

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

            $this->locationService->delete($id);

            DB::commit();
            return $this->sendResponse('success', __('messages.destroy_success', ['name' => 'Location']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }
}
