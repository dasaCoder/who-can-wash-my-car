<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $guarded = [];

    public function businessProfiles()
    {
        return $this->hasMany(BusinessProfile::class);
    }
}
