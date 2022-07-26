<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PageContentService;
use App\Services\ServiceService;
use Illuminate\Http\JsonResponse;

class HomePageController extends Controller
{
    private $pageContentService;

    function __construct(PageContentService $pageContentService,ServiceService $serviceService)
    {
        $this->pageContentService = $pageContentService;
        $this->serviceService = $serviceService;
    }

    public function getHomePageContent()
    {

        $homePageContent = $this->pageContentService->getUsingPage('Home')->content;
        $aboutUsContent = $this->pageContentService->getUsingPage('AboutUs')->content;
        $links = $this->pageContentService->getUsingPage('Links');
        $service = $this->serviceService->allActive();
        return view(
            'web.index',
            [
                'homePageContent' => $homePageContent,
                'aboutUsContent' => $aboutUsContent,
                'links' => $links,
                'services' => $service
            ]
        );
    }
}
