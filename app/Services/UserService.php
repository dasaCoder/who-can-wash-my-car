<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserService extends Service
{
    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Return all pro partners
     */
    public function getProPartners()
    {
        return $this->repository->getProPartners();
    }

    /**
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-26
     * Summary: Get the nearest pro partners
     */
    public function getNearestProPartners($latitude, $longitude)
    {
        return $this->repository->getNearestProPartners($latitude, $longitude);
    }

    /**
     * @param  array  $data
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Create user
     */
    public function create(array $data)
    {
        $data = Arr::only($data, ['username', 'email', 'phone', 'password', 'account_type']);
        $data['password'] = Hash::make($data['password']);

        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images/users', 'public');
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
     * Summary: Update user
     */
    public function update(array $data, $id)
    {
        $data = Arr::only($data, ['phone', 'password']);
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->repository->update($data, $id);
    }

    /**
     * @param  array  $data
     * @param $model
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Assign users to model
     */
    public function assign(array $data, $model)
    {
        return $model->proPartners()->sync($data['users']);
    }
}
