<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalProfile extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $guarded = [];
    protected $appends = ['full_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
