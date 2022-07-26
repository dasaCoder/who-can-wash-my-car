<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $guarded = [];

    public function vehicleCategories()
    {
        return $this->belongsToMany(VehicleCategory::class, 'service_has_vehicle_categories')
            ->withPivot(['price', 'estimated_time'])
            ->withTimestamps();
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_has_services')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_services')->withTimestamps();
    }
}
