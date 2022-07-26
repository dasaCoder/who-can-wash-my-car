<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $guarded = [];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'profile_has_services')->withTimestamps();
    }

    public function availabilities()
    {
        return $this->hasMany(Availability::class);
    }

    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
