<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\Admin\BankBranchDataTable;
use App\Http\Requests\Admin\BankBranchRequest;
use App\Services\BankBranchService;
use App\Services\BankService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class BankBranchController extends Controller
{
    private $page = [
        'mainTitle' => 'Bank Management',
        'subTitle' => 'Branches'
    ];

    private $name = 'Branch';

    /**
     * @var BankBranchService
     */
    private $bankBranchService;
    /**
     * @var BankService
     */
    private $bankService;

    function __construct(BankBranchService $bankBranchService, BankService $bankService)
    {
        $this->bankBranchService = $bankBranchService;
        $this->bankService = $bankService;
    }

    /**
     * @param  BankBranchDataTable  $dataTable
     * @return mixed
     * @throws Exception
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Display a listing of the resource.
     */
    public function index(BankBranchDataTable $dataTable)
    {
        $banks = $this->bankService->all();
        $filters = View::make('admin.bank_management.bank_branches.filters', compact(['banks']))->render();

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

            $banks = $this->bankService->allActive();
            $view = View::make('admin.bank_management.bank_branches.create', compact(['banks']))->render();

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
     * @param  BankBranchRequest  $request
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Store a newly created resource in storage.
     */
    public function store(BankBranchRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->bankBranchService->create($request->validated());

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => __('messages.store_success', ['name' => $this->name]),
                'popupType' => 'notification'
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

            $banks = $this->bankService->allActive();
            $bankBranch = $this->bankBranchService->find($id);
            $view = View::make('admin.bank_management.bank_branches.edit', compact(['banks', 'bankBranch']))->render();

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
     * @param  BankBranchRequest  $request
     * @param  int  $id
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update the specified resource in storage.
     */
    public function update(BankBranchRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->bankBranchService->update($request->validated(), $id);

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => __('messages.update_success', ['name' => $this->name]),
                'popupType' => 'notification'
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

            $this->bankBranchService->delete($id);

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => __('messages.destroy_success', ['name' => $this->name]),
                'popupType' => 'notification'
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

            $this->bankBranchService->changeStatus($request);

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
