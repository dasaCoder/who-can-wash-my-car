<?php

namespace App\Services;

use App\Repositories\PageContentRepository;

class PageContentService extends Service
{
    /**
     * @var PageContentRepository
     */
    protected $repository;

    public function __construct(PageContentRepository $pageContentRepository)
    {
        $this->repository = $pageContentRepository;
    }

    public function getUsingPage($page)
    {
        return $this->repository->getUsingPage($page);
    }

    public function updateHome(array $data, $page)
    {
        if (isset($data['light_logo'])) {
            $data['light_logo'] = $data['light_logo']->store('images/page_content/home', 'public');
        } else {
            $data['light_logo'] = $this->repository->getUsingPage($page)->content->light_logo;
        }

        if (isset($data['dark_logo'])) {
            $data['dark_logo'] = $data['dark_logo']->store('images/page_content/home', 'public');
        } else {
            $data['dark_logo'] = $this->repository->getUsingPage($page)->content->dark_logo;
        }

        return $this->repository->updateByPage($data, $page);
    }

    public function updateAboutUs(array $data, $page)
    {
        if (isset($data['first_image'])) {
            $data['first_image'] = $data['first_image']->store('images/page_content/about_us', 'public');
        } else {
            $data['first_image'] = $this->repository->getUsingPage($page)->content->first_image;
        }

        if (isset($data['second_image'])) {
            $data['second_image'] = $data['second_image']->store('images/page_content/about_us', 'public');
        } else {
            $data['second_image'] = $this->repository->getUsingPage($page)->content->second_image;
        }

        return $this->repository->updateByPage($data, $page);
    }

    public function updateContactDetails(array $data, $page)
    {
        return $this->repository->updateByPage($data, $page);
    }

    public function updateLinks(array $data, $page)
    {
        return $this->repository->updateByPage($data, $page);
    }
}
