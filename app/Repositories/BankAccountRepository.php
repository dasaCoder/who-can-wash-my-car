<?php

namespace App\Repositories;

use App\Models\BankAccount;

class BankAccountRepository extends Repository
{
    public function __construct(BankAccount $bankAccount)
    {
        parent::__construct($bankAccount);
    }

    //
}
