<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $guarded = [];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_has_vehicle_categories')
            ->withPivot(['price', 'estimated_time'])
            ->withTimestamps();
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_has_vehicle_categories')
            ->withPivot(['price'])
            ->withTimestamps();
    }
}
