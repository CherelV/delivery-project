<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class DeliveryMan extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\DeliveryManFactory> */
    use HasFactory, Notifiable;
    protected $table = 'delivery_men';
    protected $guarded=[];
    public function user(): BelongsTo
    {
     return $this->belongsTo(User::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

}
