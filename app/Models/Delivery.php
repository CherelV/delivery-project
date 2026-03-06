<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    /** @use HasFactory<\Database\Factories\DeliveryFactory> */
    use HasFactory;
    protected $guarded=[];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function deliveryMan()
    {
        return $this->belongsTo(DeliveryMan::class);
    }

    //   public function departureAddress()
    // {
    //     return $this->belongsTo(DeliveryAddress::class, 'departure_address_id');
    // }

    // public function destinationAddress()
    // {
    //     return $this->belongsTo(DeliveryAddress::class, 'destination_address_id');
    // }

    public function departureAddress()
    {
        return $this->belongsTo(Quarter::class, 'departure_address_id');
    }

    public function destinationAddress()
    {
        return $this->belongsTo(Quarter::class, 'destination_address_id');
    }
    public function quarter()
    {
        return $this->belongsTo(Quarter::class);
    }
    
}
