<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BlogService;

class BlogPageController extends Controller
{
    private $blogService;

    function __construct(blogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function getBlogs(){
        $blogs = $this->blogService->getAllSortByDate();
        //dd($blogs);
        return view(
            'web.blog',
            [
                'blogs' => $blogs,
            ]
        );
    }
}
