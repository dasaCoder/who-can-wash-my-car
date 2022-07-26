<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $guarded = [];

    public function vehicleCategories()
    {
        return $this->belongsToMany(VehicleCategory::class, 'package_has_vehicle_categories')
            ->withPivot(['price'])
            ->withTimestamps();
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'package_has_services')
            ->withTimestamps();
    }

    public function totalEstimatedTime($vehicle_category_id)
    {
        $total_estimated_time = 0;
        foreach ($this->services as $service) {
            $total_estimated_time += $service->vehicleCategories->find($vehicle_category_id)->pivot->estimated_time;
        }

        return $total_estimated_time;
    }
}
