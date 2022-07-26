<?php

namespace App\Services;

use App\Repositories\AvailabilityRepository;
use Illuminate\Support\Arr;

class AvailabilityService extends Service
{
    /**
     * @var AvailabilityRepository
     */
    protected $repository;

    public function __construct(AvailabilityRepository $availabilityRepository)
    {
        $this->repository = $availabilityRepository;
    }

    /**
     * @param  array  $data
     * @param $proPartner
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Create availability and assign to pro partner
     */
    public function createAndAssign(array $data, $proPartner)
    {
        $proPartner->availabilities()->create($data);
    }

    /**
     * @param  array  $data
     * @param $proPartner
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Create multiple availabilities and assign to pro partner
     */
    public function createManyAndAssign(array $data, $proPartner)
    {
        if (isset($data['availabilities'])) {
            foreach ($data['availabilities'] as $availability) {
                $proPartner->availabilities()->create($availability);
            }
        }
    }

    /**
     * @param $proPartners
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-07-02
     * Summary: Filter pro partners by availability
     */
    public function filterByAvailability($proPartners)
    {
        return $proPartners->filter(function ($proPartner) {
            $availabilities = $proPartner->availabilities
                ->where('date', $proPartner->date)
                ->where('start', '<=', $proPartner->job_start)
                ->where('end', '>=', $proPartner->job_end);

            if (count($availabilities) > 0) {
                return true;
            }

            return false;
        });
    }
}
