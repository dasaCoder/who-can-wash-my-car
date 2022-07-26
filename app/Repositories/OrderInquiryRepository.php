<?php

namespace App\Repositories;

use App\Models\OrderInquiry;

class OrderInquiryRepository extends Repository
{
    public function __construct(OrderInquiry $orderInquiry)
    {
        parent::__construct($orderInquiry);
    }

    //
}
