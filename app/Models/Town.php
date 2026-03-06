<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = [
        'name',
        'region_id',
        'slug'
    ];

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function quarters(){
        return $this->hasMany(Quarter::class);
    }
}
