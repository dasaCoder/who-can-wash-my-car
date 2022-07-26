<?php

namespace App\Services;

use App\Repositories\BankAccountRepository;

class BankAccountService extends Service
{
    /**
     * @var BankAccountRepository
     */
    protected $repository;

    public function __construct(BankAccountRepository $bankAccountRepository)
    {
        $this->repository = $bankAccountRepository;
    }

    /**
     * @param  array  $data
     * @param $model
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Store record
     */
    public function createAndAssign(array $data, $model)
    {
        return $model->bankAccounts()->create($data);
    }
}
