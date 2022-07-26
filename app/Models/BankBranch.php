<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankBranch extends Model
{
    use HasFactory;
    use ModelTrait;

    protected $guarded = [];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
