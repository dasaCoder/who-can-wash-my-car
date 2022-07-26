<?php

namespace App\Services;

use App\Repositories\LocationRepository;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class LocationService extends Service
{
    /**
     * @var LocationRepository
     */
    protected $repository;

    public function __construct(LocationRepository $locationRepository)
    {
        $this->repository = $locationRepository;
    }

    /**
     * @param  array  $data
     * @param $model
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Create location and assign to model
     */
    public function createAndAssign(array $data, $model)
    {
        if ($data['is_default_location'] == 1) {
            $model->locations()->update(['is_default_location' => 0]);
        }
        $model->locations()->create($data);
    }

    /**
     * @param  array  $data
     * @param $model
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Create multiple locations and assign to model
     */
    public function createManyAndAssign(array $data, $model)
    {
        if (isset($data['locations'])) {
            foreach ($data['locations'] as $location) {
                if ($location['is_default_location'] == 1) {
                    $model->locations()->update(['is_default_location' => 0]);
                }
                $model->locations()->create($location);
            }
        }
    }

    /**
     * @param  array  $data
     * @param $id
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update location
     */
    public function update(array $data, $id)
    {
        if ($data['is_default_location'] == 1) {
            auth()->user()->locations()->update(['is_default_location' => 0]);
        }
        $this->repository->update($data, $id);
    }

    /**
     * @param $proPartners
     * @param $job_date
     * @param $job_start
     * @param $job_end
     * @param $customerLocation
     * @return mixed
     *
     * Created by: Charith Gamage
     * Created at: 2022-07-02
     * Summary: Travel estimation
     */
    public function travelEstimation($proPartners, $job_date, $job_start, $job_end, $customerLocation)
    {
        foreach ($proPartners as $proPartner) {
            $proPartnerLocation = $proPartner->locations->where('is_default_location', 1)->first();
            $travelingDuration = ($this->getTravelingDuration($customerLocation, $proPartnerLocation));

            $proPartner['date'] = $job_date;
            $proPartner['traveling_duration'] = $travelingDuration;
            $proPartner['slot_start'] = Carbon::parse($job_start)->subMinute($travelingDuration)->toTimeString();
            $proPartner['job_start'] = $job_start;
            $proPartner['job_end'] = $job_end;
            $proPartner['slot_end'] = Carbon::parse($job_end)->addMinute($travelingDuration)->toTimeString();
        }

        return $proPartners;
    }

    /**
     * @param $from
     * @param $to
     * @return \Exception|false|float|int
     *
     * Created by: Charith Gamage
     * Created at: 2022-07-02
     * Summary: Get traveling duration
     */
    private function getTravelingDuration($from, $to)
    {
        try {
            $apiUrl = 'https://maps.googleapis.com/maps/api/distancematrix/json';
            $apiKey = config('custom.google_maps_distance_api_key');

            $origin = $from->latitude.','.$from->longitude;
            $destination = $to->latitude.','.$to->longitude;

            $response = Http::get($apiUrl, [
                'units' => 'imperial',
                'origins' => $origin,
                'destinations' => $destination,
                'key' => $apiKey,
                'random' => random_int(1, 100),
            ]);

            $statusCode = $response->getStatusCode();

            if (200 === $statusCode) {
                $responseData = json_decode($response->getBody()->getContents());

                if (isset($responseData->rows[0]->elements[0]->duration)) {
                    $seconds = $responseData->rows[0]->elements[0]->duration->value;
                    return (int) (round($seconds / (15 * 60)) * (15 * 60)) / 60;
                }
            }

            return false;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
