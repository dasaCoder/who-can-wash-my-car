<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPackage extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $guarded = [];

    public function subscriptionPlan()
    {
        return $this->hasMany(SubscriptionPlan::class);
    }

    public function proPartners()
    {
        return $this->belongsToMany(User::class, 'subscription_package_has_users');
    }
}
