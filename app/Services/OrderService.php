<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService extends Service
{
    /**
     * @var OrderRepository
     */
    protected $repository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->repository = $orderRepository;
    }

    /**
     * @param $proPartners
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-07-02
     * Summary: Filter pro partners by existing orders
     */
    public function filterByExistingOrders($proPartners)
    {
        return $proPartners->filter(function ($proPartner) {
            $orders = $proPartner->assignedOrders->where('date', $proPartner->date);
            if (
                count($orders->where('slot_start', '<=', $proPartner->slot_start)
                    ->where('slot_end', '>', $proPartner->slot_start)) == 0
                &&
                count($orders->where('slot_start', '<', $proPartner->slot_end)
                    ->where('slot_end', '>=', $proPartner->slot_end)) == 0
            ) {
                return true;
            }

            return false;
        });
    }
}
