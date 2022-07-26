<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Customer\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use App\Services\UserService;
use App\Services\OtpCodeService;

class AuthController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var OtpCodeService
     */
    private $otpCodeService;

    function __construct(
        UserService $userService,
        OtpCodeService $otpCodeService
    ) {
        $this->userService = $userService;
        $this->otpCodeService = $otpCodeService;
    }

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
            $request->merge(['username' => $request->email]);
            // dd($request->all());
            if ($request->customer_role == 'PRO_PARTNER') {
                $proPartner = $this->userService->create($request->all())->assignRole('pro-partner'); //Create pro partner and assign role
            } else {
                // for nomal customer login
            }

            DB::commit();

            $this->sendOTP(['phone' => $request->phone]);

            return view(
                'web.auth.otp-verification',
                [
                    'user' => $proPartner
                ]
            );
        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            dd($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    public function sendOTP($data)
    {
        $this->otpCodeService->otpSend($data);
    }
}
