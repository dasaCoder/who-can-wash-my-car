<?php

namespace App\Services;

use App\Repositories\BusinessTypeRepository;
use Illuminate\Support\Arr;

class BusinessTypeService extends Service
{
    /**
     * @var BusinessTypeRepository
     */
    protected $repository;

    public function __construct(BusinessTypeRepository $businessTypeRepository)
    {
        $this->repository = $businessTypeRepository;
    }

    //
}
