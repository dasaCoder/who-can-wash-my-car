<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $guarded = [];

    public function subscriptionPackage()
    {
        return $this->belongsTo(SubscriptionPackage::class);
    }

    public function subscriptionDuration()
    {
        return $this->belongsTo(SubscriptionDuration::class);
    }

    public function subscriptionPaymentTerm()
    {
        return $this->belongsTo(SubscriptionPaymentTerm::class);
    }
}
