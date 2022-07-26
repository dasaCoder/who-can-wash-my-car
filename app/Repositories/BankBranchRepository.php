<?php

namespace App\Repositories;

use App\Models\BankBranch;

class BankBranchRepository extends Repository
{
    public function __construct(BankBranch $bankBranch)
    {
        parent::__construct($bankBranch);
    }

    //
}
