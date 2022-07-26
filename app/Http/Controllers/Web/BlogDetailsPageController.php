<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BlogService;
//use App\Services\Service;

class BlogDetailsPageController extends Controller
{
    private $blogService;

    function __construct(blogService $blogService)
    {
        $this->blogService = $blogService;
        //$this->service = $service;
    }

    public function getBlog($id){
        //dd($id);
        $blog = $this->blogService->find($id);
        //dd($blog);
        return view(
            'web.blog-details',
            [
                'blog'=>$blog
            ]
        );
    }
}
