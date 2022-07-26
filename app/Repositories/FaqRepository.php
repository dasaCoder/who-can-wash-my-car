<?php

namespace App\Repositories;

use App\Models\Faq;

class FaqRepository extends Repository
{
    public function __construct(Faq $faq)
    {
        parent::__construct($faq);
    }

    //
}
