<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $table = 'order_shipments';
    protected $guarded = [];

    public const PENDING = 'pending';
    public const SHIPPED = 'shipped';
}
