<?php

namespace App\Services;

use App\Repositories\OrderInquiryRepository;

class OrderInquiryService extends Service
{
    /**
     * @var OrderInquiryRepository
     */
    private $repository;

    public function __construct(OrderInquiryRepository $orderInquiryRepository)
    {
        $this->repository = $orderInquiryRepository;
    }

    /**
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-20
     * Summary: Get Order Inquiries
     */
    public function getOrderInquiries()
    {
        return $this->orderInquiryRepository->getLocations();
    }

    /**
     * @param $request
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Store Location
     */
    public function store($request)
    {
        $data = $request->only(['location_name', 'line_1', 'line_2', 'city', 'state', 'country', 'postal_code', 'latitude', 'longitude']);
        $data['profile_id'] = auth()->user()->profile->id;

        return $this->locationRepository->store($data);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update Location
     */
    public function update($request, $id)
    {
        $data = $request->only(['location_name', 'line_1', 'line_2', 'city', 'state', 'country', 'postal_code', 'latitude', 'longitude']);

        return $this->locationRepository->update($data, $id);
    }

    /**
     * @param $id
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Destroy Location
     */
    public function destroy($id)
    {
        $this->locationRepository->destroy($id);
    }
}
