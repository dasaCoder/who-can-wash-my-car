<?php

namespace App\Services;

use App\Repositories\FaqRepository;

class FaqService extends Service
{
    /**
     * @var FaqRepository
     */
    protected $repository;

    public function __construct(FaqRepository $faqRepository)
    {
        $this->repository = $faqRepository;
    }

    //
}
