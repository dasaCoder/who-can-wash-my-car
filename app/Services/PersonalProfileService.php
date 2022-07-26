<?php

namespace App\Services;

use App\Repositories\PersonalProfileRepository;
use Illuminate\Support\Arr;

class PersonalProfileService extends Service
{
    /**
     * @var PersonalProfileRepository
     */
    protected $repository;

    public function __construct(PersonalProfileRepository $profileRepository)
    {
        $this->repository = $profileRepository;
    }

    /**
     * @param  array  $data
     * @param $model
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Create profile
     */
    public function createAndAssign(array $data, $model)
    {
        $data = Arr::only($data, ['first_name', 'last_name', 'image']);

        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images/users', 'public');
        }

        return $model->personalProfile()->create($data);
    }

    /**
     * @param  array  $data
     * @param $model
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update profile
     */
    public function updateAndAssign(array $data, $model)
    {
        $data = Arr::only($data, ['first_name', 'last_name', 'image']);

        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images/users', 'public');
        }

        return $model->personalProfile()->update($data);
    }
}
