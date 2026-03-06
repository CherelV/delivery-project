<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    protected $guarded=[];
    protected $with = [
        'quarter'
    ];

    public function quarter()
    {
        return $this->belongsTo(Quarter::class);
    }

    public function departureDeliveries()
    {
        return $this->hasMany(Delivery::class, 'departure_address_id');
    }

    public function destinationDeliveries()
    {
        return $this->hasMany(Delivery::class, 'destination_address_id');
    }
}
