<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository extends Repository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
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
        return $this->model->where('account_type', 'Personal')->role('pro-partner', 'web')->active()->get();
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
        $radiusValue = config('custom.max_radius_value');

        return $this->model->role('pro-partner', 'web')
            ->whereHas('locations', function ($query) use ($longitude, $latitude, $radiusValue) {

                $query->select('*', DB::raw(
                    "6371 * acos( cos( radians('$latitude') )
                * cos( radians( latitude ) )
                * cos( radians( longitude ) - radians('$longitude') )
                + sin( radians('$latitude') )
                * sin( radians( latitude ) ) ) AS distance"))
                    ->having('distance', '<', $radiusValue)
                    ->orderBy('distance')
                    ->where('is_default_location', "1")
                    ->active();

            })
            ->with(['locations' => function ($query) use ($longitude, $latitude, $radiusValue) {

                $query->select('*', DB::raw(
                    "6371 * acos( cos( radians('$latitude') )
                * cos( radians( latitude ) )
                * cos( radians( longitude ) - radians('$longitude') )
                + sin( radians('$latitude') )
                * sin( radians( latitude ) ) ) AS distance"))
                    ->having('distance', '<', $radiusValue)
                    ->orderBy('distance')
                    ->where('is_default_location', "1")
                    ->active()
                    ->get();

            }])->get();
    }
}
