<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\Admin\ServiceDataTable;
use App\Http\Requests\Admin\ServiceRequest;
use App\Services\ServiceService;
use App\Services\VehicleCategoryService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class ServiceController extends Controller
{
    private $page = [
        'mainTitle' => 'Service Management',
        'subTitle' => 'Services'
    ];

    private $name = 'Service';

    /**
     * @var ServiceService
     */
    private $serviceService;
    /**
     * @var VehicleCategoryService
     */
    private $vehicleCategoryService;

    function __construct(ServiceService $serviceService, VehicleCategoryService $vehicleCategoryService)
    {
        $this->serviceService = $serviceService;
        $this->vehicleCategoryService = $vehicleCategoryService;
    }

    /**
     * @param  ServiceDataTable  $dataTable
     * @return mixed
     * @throws Exception
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Display a listing of the resource.
     */
    public function index(ServiceDataTable $dataTable)
    {
        $filters = View::make('admin.service_management.services.filters')->render();

        return $dataTable->render('admin.common.datatable', ['page' => $this->page, 'filters' => $filters]);
    }

    /**
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Show the form for creating a new resource.
     */
    public function create(): JsonResponse
    {
        DB::beginTransaction();
        try {

            $vehicleCategories = $this->vehicleCategoryService->allActive();
            $view = View::make('admin.service_management.services.create', compact(['vehicleCategories']))->render();

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => $view, 'popupType' => 'modal', 'modalSize' => 'lg'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }

    /**
     * @param  ServiceRequest  $request
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {

            $service = $this->serviceService->create($request->validated());
            $this->vehicleCategoryService->assign($request->validated(), $service);

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => __('messages.store_success', ['name' => $this->name]), 'popupType' => 'notification'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }

    /**
     * @param  int  $id
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Show the form for editing the specified resource.
     */
    public function edit(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $service = $this->serviceService->find($id);
            $vehicleCategories = $this->vehicleCategoryService->allActive();
            $view = View::make('admin.service_management.services.edit', compact(['service', 'vehicleCategories']))->render();

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => $view, 'popupType' => 'modal', 'modalSize' => 'lg'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }

    /**
     * @param  ServiceRequest  $request
     * @param  int  $id
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->serviceService->update($request->validated(), $id);
            $service = $this->serviceService->find($id);
            $this->vehicleCategoryService->assign($request->validated(), $service);

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => __('messages.update_success', ['name' => $this->name]), 'popupType' => 'notification'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }

    /**
     * @param  int  $id
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->serviceService->delete($id);

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => __('messages.destroy_success', ['name' => $this->name]), 'popupType' => 'notification'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Change the specified resource status in storage.
     */
    public function changeStatus(Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->serviceService->changeStatus($request);

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => __('messages.status_change_success'), 'popupType' => 'notification'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }
}
