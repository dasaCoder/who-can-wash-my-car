<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository extends Repository
{
    public function __construct(Blog $blog)
    {
        parent::__construct($blog);
    }

    public function getAllSortByDate()
    {
        return $this->model::orderBy('created_at','desc')->active()->get();
    }
}
