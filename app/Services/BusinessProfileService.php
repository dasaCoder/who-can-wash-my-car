<?php

namespace App\Services;

use App\Repositories\BusinessProfileRepository;
use Illuminate\Support\Arr;

class BusinessProfileService extends Service
{
    /**
     * @var BusinessProfileRepository
     */
    protected $repository;

    public function __construct(BusinessProfileRepository $businessProfileRepository)
    {
        $this->repository = $businessProfileRepository;
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
        $data = Arr::only($data, ['business_type_id', 'business_name', 'company_reg_no', 'vat_no', 'brd', 'insurance', 'image']);

        if (isset($data['brd'])) {
            $data['brd'] = $data['brd']->store('images/brds', 'public');
        }

        if (isset($data['insurance'])) {
            $data['insurance'] = $data['insurance']->store('images/insurances', 'public');
        }

        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images/business_logos', 'public');
        }

        return $model->businessProfile()->create($data);
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
        $data = Arr::only($data, ['image']);

        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('images/business_logos', 'public');
        }

        return $model->businessProfile()->update($data);
    }
}
