<?php

namespace App\Http\Controllers\Api\v1\ProPartner;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Requests\Api\AvailabilityRequest;
use App\Services\AvailabilityService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AvailabilityController extends ApiController
{
    /**
     * @var AvailabilityService
     */
    private $availabilityService;

    function __construct(AvailabilityService $availabilityService)
    {
        $this->availabilityService = $availabilityService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Get availability by user
     */
    public function getByUser()
    {
        try {

            $data = auth()->user()->availabilities
                ->map(function ($item) {
                    return $item->only(['id', 'date', 'start', 'end']);
                });

            return $this->sendResponse('success', __('messages.get_success', ['name' => 'Availabilities']), $data, 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  AvailabilityRequest  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Store Availability
     */
    public function store(AvailabilityRequest $request)
    {
        DB::beginTransaction();
        try {

            $this->availabilityService->createAndAssign($request->validated(), auth()->user());

            DB::commit();
            return $this->sendResponse('success', __('messages.store_success', ['name' => 'Availability']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  AvailabilityRequest  $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update Availability
     */
    public function update(AvailabilityRequest $request, $id)
    {
        DB::beginTransaction();
        try {

            $this->availabilityService->update($request->validated(), $id);

            DB::commit();
            return $this->sendResponse('success', __('messages.update_success', ['name' => 'Availability']), [], 200);

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
     * Summary: Destroy Availability
     */
    public function destroy(int $id)
    {
        DB::beginTransaction();
        try {

            $this->availabilityService->delete($id);

            DB::commit();
            return $this->sendResponse('success', __('messages.destroy_success', ['name' => 'Availability']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }
}
