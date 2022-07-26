<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function proPartners()
    {
        return $this->belongsToMany(User::class, 'order_has_users');
    }
}
