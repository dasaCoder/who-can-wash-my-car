<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Customer\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller
{
    /**
     * @param  RegisterRequest  $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     *
     * Created by: Ishara Nadeeshan
     * Created at: 2022-07-26
     * Summary: User register
     */
    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {

            if ($request->customer_role == 'PRO_PARTNER') {
                $proPartner = $this->userService->create($request->validated())->assignRole('pro-partner'); //Create pro partner and assign role
            } else {
                // for nomal customer login
            }

            DB::commit();
            return view(
                'web.blog-details',
                [
                    'blog' => $blog
                ]
            );
        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }
}
