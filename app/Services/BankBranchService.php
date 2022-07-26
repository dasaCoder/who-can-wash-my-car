<?php

namespace App\Services;

use App\Repositories\BankBranchRepository;

class BankBranchService extends Service
{
    /**
     * @var BankBranchRepository
     */
    protected $repository;

    public function __construct(BankBranchRepository $bankBranchRepository)
    {
        $this->repository = $bankBranchRepository;
    }

    //
}
