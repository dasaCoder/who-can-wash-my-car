<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPaymentTerm extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $guarded = [];

    public function subscriptionPlan()
    {
        return $this->hasMany(SubscriptionPlan::class);
    }
}
