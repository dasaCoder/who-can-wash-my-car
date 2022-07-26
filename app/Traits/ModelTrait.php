<?php

namespace App\Traits;

trait ModelTrait {

    public function scopeActive($query)
    {
        return $query->whereStatus('Active');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = auth()->user()->id ?? null;
            $model->updated_by = null;
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->user()->id ?? null;
        });
    }

    public function getImageUrlAttribute()
    {
        if(isset($this->image)) {
            return asset('storage/'.$this->image);
        } else {
            return asset('image/default.png');
        }
    }
}
