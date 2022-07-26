<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\Admin\PackageDataTable;
use App\Http\Requests\Admin\PackageRequest;
use App\Services\PackageService;
use App\Services\ServiceService;
use App\Services\VehicleCategoryService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class PackageController extends Controller
{
    private $page = [
        'mainTitle' => 'Package Management',
        'subTitle' => 'Packages'
    ];

    private $name = 'Package';

    /**
     * @var PackageService
     */
    private $packageService;
    /**
     * @var ServiceService
     */
    private $serviceService;
    /**
     * @var VehicleCategoryService
     */
    private $vehicleCategoryService;

    function __construct(
        PackageService $packageService,
        ServiceService $serviceService,
        VehicleCategoryService $vehicleCategoryService
    ) {
        $this->packageService = $packageService;
        $this->serviceService = $serviceService;
        $this->vehicleCategoryService = $vehicleCategoryService;
    }

    /**
     * @param  PackageDataTable  $dataTable
     * @return mixed
     * @throws Exception
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Display a listing of the resource.
     */
    public function index(PackageDataTable $dataTable)
    {
        $filters = View::make('admin.package_management.packages.filters')->render();

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

            $services = $this->serviceService->allActive();
            $vehicleCategories = $this->vehicleCategoryService->allActive();
            $view = View::make('admin.package_management.packages.create', compact(['services', 'vehicleCategories']))->render();

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
     * @param  PackageRequest  $request
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Store a newly created resource in storage.
     */
    public function store(PackageRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {

            $package = $this->packageService->create($request->validated());
            $this->serviceService->assign($request->validated(), $package);
            $this->vehicleCategoryService->assign($request->validated(), $package);

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

            $package = $this->packageService->find($id);
            $services = $this->serviceService->allActive();
            $vehicleCategories = $this->vehicleCategoryService->allActive();
            $view = View::make('admin.package_management.packages.edit', compact(['package', 'services', 'vehicleCategories']))->render();

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
     * @param  PackageRequest  $request
     * @param  int  $id
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update the specified resource in storage.
     */
    public function update(PackageRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->packageService->update($request->validated(), $id);
            $package = $this->packageService->find($id);
            $this->serviceService->assign($request->validated(), $package);
            $this->vehicleCategoryService->assign($request->validated(), $package);

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

            $this->packageService->delete($id);

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

            $this->packageService->changeStatus($request);

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
