<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\Admin\SubscriptionPlanDataTable;
use App\Http\Requests\Admin\SubscriptionPlanRequest;
use App\Services\SubscriptionPackageService;
use App\Services\SubscriptionDurationService;
use App\Services\SubscriptionPaymentTermService;
use App\Services\SubscriptionPlanService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class SubscriptionPlanController extends Controller
{
    private $page = [
        'mainTitle' => 'Subscription Management',
        'subTitle' => 'Subscription Plans'
    ];

    private $name = 'Subscription Plan';

    /**
     * @var SubscriptionPackageService
     */
    private $subscriptionPackageService;
    /**
     * @var SubscriptionDurationService
     */
    private $subscriptionDurationService;
    /**
     * @var SubscriptionPaymentTermService
     */
    private $subscriptionPaymentTermService;
    /**
     * @var SubscriptionPlanService
     */
    private $subscriptionPlanService;

    function __construct(
        SubscriptionPackageService $subscriptionPackageService,
        SubscriptionDurationService $subscriptionDurationService,
        SubscriptionPaymentTermService $subscriptionPaymentTermService,
        SubscriptionPlanService $subscriptionPlanService
    ) {
        $this->subscriptionPackageService = $subscriptionPackageService;
        $this->subscriptionDurationService = $subscriptionDurationService;
        $this->subscriptionPaymentTermService = $subscriptionPaymentTermService;
        $this->subscriptionPlanService = $subscriptionPlanService;
    }

    /**
     * @param  SubscriptionPlanDataTable  $dataTable
     * @return mixed
     * @throws Exception
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-24
     * Summary: Display a listing of the resource.
     */
    public function index(SubscriptionPlanDataTable $dataTable)
    {
        $filters = View::make('admin.subscription_management.subscription_plans.filters')->render();

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

            $subscriptionPackages = $this->subscriptionPackageService->allActive();
            $subscriptionDurations = $this->subscriptionDurationService->allActive();
            $subscriptionPaymentTerms = $this->subscriptionPaymentTermService->allActive();
            $view = View::make('admin.subscription_management.subscription_plans.create', compact(['subscriptionPackages', 'subscriptionDurations', 'subscriptionPaymentTerms']))->render();

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => $view, 'popupType' => 'modal', 'modalSize' => 'md'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }

    /**
     * @param  SubscriptionPlanRequest  $request
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-24
     * Summary: Store a newly created resource in storage.
     */
    public function store(SubscriptionPlanRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->subscriptionPlanService->create($request->validated());

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

            $subscriptionPackages = $this->subscriptionPackageService->allActive();
            $subscriptionDurations = $this->subscriptionDurationService->allActive();
            $subscriptionPaymentTerms = $this->subscriptionPaymentTermService->allActive();
            $subscriptionPlan = $this->subscriptionPlanService->find($id);
            $view = View::make('admin.subscription_management.subscription_plans.edit', compact(['subscriptionPackages', 'subscriptionDurations', 'subscriptionPaymentTerms', 'subscriptionPlan']))->render();

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => $view, 'popupType' => 'modal', 'modalSize' => 'md'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }

    /**
     * @param  SubscriptionPlanRequest  $request
     * @param  int  $id
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-24
     * Summary: Update the specified resource in storage.
     */
    public function update(SubscriptionPlanRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->subscriptionPlanService->update($request->validated(), $id);

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

            $this->subscriptionPlanService->delete($id);

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

            $this->subscriptionPlanService->changeStatus($request);

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
