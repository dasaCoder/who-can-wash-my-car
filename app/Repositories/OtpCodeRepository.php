<?php

namespace App\Repositories;

use App\Models\OtpCode;

class OtpCodeRepository extends Repository
{
    public function __construct(OtpCode $otpCode)
    {
        parent::__construct($otpCode);
    }

    /**
     * @param $phone
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-27
     * Summary: Find by phone
     */
    public function findByPhone($phone)
    {
        return $this->model->where('phone', $phone)->first();
    }
}
