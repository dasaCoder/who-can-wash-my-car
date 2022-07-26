<?php

namespace App\Services;

use App\Repositories\OtpCodeRepository;
use Illuminate\Support\Facades\Http;

class OtpCodeService extends Service
{
    /**
     * @var OtpCodeRepository
     */
    protected $repository;

    public function __construct(OtpCodeRepository $serviceRepository)
    {
        $this->repository = $serviceRepository;
    }

    /**
     * @param  array  $data
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-27
     * Summary: Send new OTP code
     */
    public function otpSend(array $data)
    {
        $data = [
            'phone' => $data['phone'],
            'otp_code' => rand(1000, 9999)
        ];

        $this->sendOtpCode($data);

        return $this->repository->updateOrCreate(['phone' => $data['phone']], ['otp_code' => $data['otp_code']]);
    }

    /**
     * @param  array  $data
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-27
     * Summary: Verify OTP code
     */
    public function otpVerify(array $data)
    {

        $otpCode = $this->repository->findByPhone($data['phone']);

        if(isset($otpCode->otp_code) && $otpCode->otp_code == $data['otp_code']) {
            $otpCode->delete();
            return true;
        } else {
            return false;
        }

    }

    /**
     * @param  array  $data
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-27
     * Summary: Send OTP code to phone
     */
    private function sendOtpCode(array $data)
    {
        $token = config('custom.sms_gateway_token');

        $message = "Dear, Please use this OTP : ".$data['otp_code']." to continue your process.";

        $number = $data['phone'];
        $number = ltrim($number, '0');

        Http::get('https://cpsolutions.dialog.lk/index.php/cbs/sms/send?destination=94'.$number. '&q=' . $token . '&message=' .$message);
    }
}
