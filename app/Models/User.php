<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;
    use ModelTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function personalProfile()
    {
        return $this->hasOne(PersonalProfile::class);
    }

    public function businessProfile()
    {
        return $this->hasOne(BusinessProfile::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'user_has_services')->withTimestamps();
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

    public function subscriptionPackages()
    {
        return $this->belongsToMany(SubscriptionPackage::class, 'subscription_package_has_users');
    }

    public function subscriptionPlans()
    {
        return $this->belongsToMany(SubscriptionPlan::class, 'subscription_plan_has_users')
            ->withPivot(['start_date', 'expiry_date', 'status'])
            ->withTimestamps();
    }

    public function placedOrders()
    {
        return $this->hasMany(Order::class);
    }

    public function assignedOrders()
    {
        return $this->belongsToMany(Order::class, 'order_has_users');
    }
}
