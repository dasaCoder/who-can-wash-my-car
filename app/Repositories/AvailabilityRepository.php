<?php

namespace App\Repositories;

use App\Models\Availability;

class AvailabilityRepository extends Repository
{
    public function __construct(Availability $availability)
    {
        parent::__construct($availability);
    }

    /**
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Get by user
     */
    public function getByUser($id)
    {
        return $this->model->where('user_id', $id)
            ->whereBetween('date', [now()->format('Y-m-d'), now()->addMonths(2)->format('Y-m-d')])
            ->active()
            ->oldest('date')
            ->get(['id', 'date', 'time_from', 'time_to']);
    }
}
