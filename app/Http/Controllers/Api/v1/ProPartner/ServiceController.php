<?php

namespace App\Http\Controllers\Api\v1\ProPartner;

use App\Http\Controllers\Api\v1\ApiController;
use App\Services\ServiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServiceController extends ApiController
{
    /**
     * @var ServiceService
     */
    private $serviceService;

    function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-20
     * Summary: Get all services
     */
    public function getAll()
    {
        try {

            $data = $this->serviceService->allActive()
                ->map(function ($item) {
                    return $item->only(['id', 'name', 'description', 'image_url']);
                });

            return $this->sendResponse('success', __('messages.get_success', ['name' => 'Services']), $data, 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-20
     * Summary: Assign Services
     */
    public function assignServices(Request $request)
    {
        DB::beginTransaction();
        try {

            $this->serviceService->assign($request->toArray(), auth()->user());

            DB::commit();
            return $this->sendResponse('success', __('messages.assign_success', ['name' => 'Services']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }
}
