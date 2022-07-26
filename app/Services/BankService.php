<?php

namespace App\Services;

use App\Repositories\BankRepository;

class BankService extends Service
{
    /**
     * @var BankRepository
     */
    protected $repository;

    public function __construct(BankRepository $bankRepository)
    {
        $this->repository = $bankRepository;
    }

    /**
     * @param $id
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Get related branches
     */
    public function getRelatedBranches($id)
    {
        return $this->repository->find($id)->branchesActive;
    }
}
