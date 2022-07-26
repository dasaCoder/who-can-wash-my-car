<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $guarded = [];

    public function branches()
    {
        return $this->hasMany(BankBranch::class);
    }

    public function branchesActive()
    {
        return $this->hasMany(BankBranch::class)->active();
    }
}
