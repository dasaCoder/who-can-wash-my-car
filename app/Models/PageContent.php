<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $guarded = [];

    public function getContentAttribute($value) {
        return json_decode($value);
    }
}
