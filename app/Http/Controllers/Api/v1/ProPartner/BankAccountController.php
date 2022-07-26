<?php

namespace App\Http\Controllers\Api\v1\ProPartner;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Requests\Api\BankAccountRequest;
use App\Services\BankAccountService;
use App\Services\BankService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BankAccountController extends ApiController
{
    /**
     * @var BankAccountService
     */
    private $bankAccountService;

    function __construct(BankAccountService $bankAccountService)
    {
        $this->bankAccountService = $bankAccountService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Get by user
     */
    public function getByUser()
    {
        try {

            $data = auth()->user()->bankAccounts
                ->map(function ($item) {
                    return $item->only(['id', 'bank_id', 'bank_branch_id', 'holder_name', 'account_no']);
                });

            return $this->sendResponse('success', __('messages.get_success', ['name' => 'Bank accounts']), $data, 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  BankAccountRequest  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Store Location
     */
    public function store(BankAccountRequest $request)
    {
        DB::beginTransaction();
        try {

            $this->bankAccountService->createAndAssign($request->validated(), auth()->user());

            DB::commit();
            return $this->sendResponse('success', __('messages.store_success', ['name' => 'Bank account']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  BankAccountRequest  $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update Location
     */
    public function update(BankAccountRequest $request, $id)
    {
        DB::beginTransaction();
        try {

            $this->bankAccountService->update($request->validated(), $id);

            DB::commit();
            return $this->sendResponse('success', __('messages.update_success', ['name' => 'Bank account']), [], 200);

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

            $this->bankAccountService->delete($id);

            DB::commit();
            return $this->sendResponse('success', __('messages.destroy_success', ['name' => 'Bank account']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }
}
