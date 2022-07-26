<?php

namespace App\Repositories;

use App\Models\PageContent;

class PageContentRepository extends Repository
{
    public function __construct(PageContent $pageContent)
    {
        parent::__construct($pageContent);
    }

    public function getUsingPage($page)
    {
        return $this->model->where('page', $page)->first();
    }

    public function updateByPage($data, $page)
    {
        $pageContent = $this->model->where('page', $page)->first();
        $pageContent->content = json_encode($data);
        $pageContent->save();
    }
}
