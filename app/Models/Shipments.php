<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipments extends Model
{
    /** @use HasFactory<\Database\Factories\ShipmentsFactory> */
    use HasFactory;

    protected $fillable = [
        'cargo_id',
        'ship_id',
        'origin_port_id',
        'destination_port_id',
        'departure_date',
        'arrival_estimate',
        'actual_arrival_date',
        'status',
        'is_active'
    ];
}
