<?php

namespace App\Services;

use App\Repositories\BlogRepository;

class BlogService extends Service
{
    /**
     * @var BlogRepository
     */
    protected $repository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->repository = $blogRepository;
    }

    /**
     * @param  array  $data
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Store record
     */
    public function create(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images/blogs', 'public');
        }

        return $this->repository->create($data);
    }

    /**
     * @param  array  $data
     * @param $id
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update record
     */
    public function update(array $data, $id)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images/blogs', 'public');
        }

        return $this->repository->update($data, $id);
    }


    public function getAllSortByDate(){
        return $this->repository->getAllSortByDate();
    }
}
