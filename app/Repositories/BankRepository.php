<?php

namespace App\Repositories;

use App\Models\Bank;

class BankRepository extends Repository
{
    public function __construct(Bank $bank)
    {
        parent::__construct($bank);
    }

    //
}
