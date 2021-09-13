<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTransaction extends Model
{
    use HasFactory;
    protected $table = "service_transaction";
    protected $guarded = [];
    public const CREATED = 'created';
    public const PROCESSED = 'processed';
    public const COMPLETED = 'completed';
    public const WAITING = 'waiting payment';
    public const UNPAID = 'unpaid';
    public const PAID = 'paid';
    public function detail(){
        return $this->hasMany('App\Models\ServiceTransactionDetail');
    }
}
