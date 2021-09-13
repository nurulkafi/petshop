<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTransactionDetail extends Model
{
    use HasFactory;
    protected $table = "service_transaction_detail";
    protected $guarded = [];
    public function items(){
        return $this->hasOne('App\Models\Service', 'id', 'service_id');
    }
}
