<?php

namespace App\Http\Controllers\Api\v1\Customer;

use App\Http\Controllers\Api\v1\ApiController;
use App\Services\ServiceService;
use App\Services\VehicleCategoryService;
use Illuminate\Support\Facades\Log;

class PackageController extends ApiController
{
    /**
     * @var VehicleCategoryService
     */
    private $vehicleCategoryService;
    /**
     * @var ServiceService
     */
    private $serviceService;

    function __construct(VehicleCategoryService $vehicleCategoryService, ServiceService $serviceService)
    {
        $this->vehicleCategoryService = $vehicleCategoryService;
        $this->serviceService = $serviceService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Get by Vehicle Category
     */
    public function getByVehicleCategory($vehicle_category_id)
    {
        try {

            $allServices = $this->serviceService->allActive();
            $data = $this->vehicleCategoryService->getRelatedPackages($vehicle_category_id)
                ->map(function ($item) use ($vehicle_category_id, $allServices) {
                    $data = $item->only(['id', 'name', 'description', 'image_url']);
                    $data['price'] = $item->pivot->price;
                    $data['estimated_time'] = $item->totalEstimatedTime($vehicle_category_id);

                    foreach ($item->services as $service) {
                        $data['include_services'][] = $service->only(['id', 'name', 'description', 'image_url']);
                    }

                    foreach ($allServices->whereNotIn('id', $item->services->pluck('id')) as $service) {
                        $extra_services = $service->only(['id', 'name', 'description', 'image_url']);

                        $extra_service = $service->vehicleCategories->find($vehicle_category_id);
                        $extra_services['price'] = $extra_service->pivot->price;
                        $extra_services['estimated_time'] = $extra_service->pivot->estimated_time;

                        $data['extra_services'][] = $extra_services;
                    }

                    return $data;
                });

            return $this->sendResponse('success', __('messages.get_success', ['name' => 'Packages']), $data, 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }
}
