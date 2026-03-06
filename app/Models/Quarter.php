<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'town_id'
    ];

    public function town(){
        return $this->belongsTo(Town::class);
    }

      public function addresses()
    {
        return $this->hasMany(DeliveryAddress::class);
    }
     public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
