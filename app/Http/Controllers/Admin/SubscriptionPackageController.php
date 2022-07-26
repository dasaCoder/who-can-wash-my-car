<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\Admin\SubscriptionPackageDataTable;
use App\Http\Requests\Admin\SubscriptionPackageRequest;
use App\Services\SubscriptionPackageService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class SubscriptionPackageController extends Controller
{
    private $page = [
        'mainTitle' => 'Subscription Management',
        'subTitle' => 'Subscription Packages'
    ];

    private $name = 'Subscription Package';

    /**
     * @var SubscriptionPackageService
     */
    private $subscriptionPackageService;
    /**
     * @var UserService
     */
    private $userService;

    function __construct(SubscriptionPackageService $subscriptionPackageService, UserService $userService)
    {
        $this->subscriptionPackageService = $subscriptionPackageService;
        $this->userService = $userService;
    }

    /**
     * @param  SubscriptionPackageDataTable  $dataTable
     * @return mixed
     * @throws Exception
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-24
     * Summary: Display a listing of the resource.
     */
    public function index(SubscriptionPackageDataTable $dataTable)
    {
        $filters = View::make('admin.subscription_management.subscription_packages.filters')->render();

        return $dataTable->render('admin.common.datatable', ['page' => $this->page, 'filters' => $filters]);
    }

    /**
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-24
     * Summary: Show the form for creating a new resource.
     */
    public function create(): JsonResponse
    {
        DB::beginTransaction();
        try {

            $proPartners = $this->userService->getProPartners();
            $view = View::make('admin.subscription_management.subscription_packages.create', compact(['proPartners']))->render();

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
     * @param  SubscriptionPackageRequest  $request
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-24
     * Summary: Store a newly created resource in storage.
     */
    public function store(SubscriptionPackageRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {

            $subscriptionPackage = $this->subscriptionPackageService->create($request->validated());
            $this->userService->assign($request->validated(), $subscriptionPackage);

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
     * Created at: 2022-06-24
     * Summary: Show the form for editing the specified resource.
     */
    public function edit(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $subscriptionPackage = $this->subscriptionPackageService->find($id);
            $view = View::make('admin.subscription_management.subscription_packages.edit', compact(['subscriptionPackage']))->render();

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
     * @param  SubscriptionPackageRequest  $request
     * @param  int  $id
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-24
     * Summary: Update the specified resource in storage.
     */
    public function update(SubscriptionPackageRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->subscriptionPackageService->update($request->validated(), $id);

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
     * Created at: 2022-06-24
     * Summary: Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->subscriptionPackageService->delete($id);

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
     * Created at: 2022-06-24
     * Summary: Change the specified resource status in storage.
     */
    public function changeStatus(Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->subscriptionPackageService->changeStatus($request);

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
