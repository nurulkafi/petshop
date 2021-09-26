<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $guarded = [];

    public const CREATED = 'created';
    public const CONFIRMED = 'confirmed';
    public const PROCESSED ='processed';
    public const DELIVERED = 'delivered';
    public const COMPLETED = 'completed';
    public const CANCELLED = 'cancelled';

    public const ORDERCODE = 'INV';

    public const PAID = 'paid';
    public const UNPAID = 'unpaid';

    public function isPaid()
    {
        return $this->payment_status == self::PAID;
    }

    /**
     * Check order is created
     *
     * @return boolean
     */
    public function isCreated()
    {
        return $this->status == self::CREATED;
    }

    /**
     * Check order is confirmed
     *
     * @return boolean
     */
    public function isConfirmed()
    {
        return $this->status == self::CONFIRMED;
    }

    /**
     * Check order is delivered
     *
     * @return boolean
     */
    public function isDelivered()
    {
        return $this->status == self::DELIVERED;
    }

    /**
     * Check order is completed
     *
     * @return boolean
     */
    public function isCompleted()
    {
        return $this->status == self::COMPLETED;
    }

    /**
     * Check order is cancelled
     *
     * @return boolean
     */
    public function isCancelled()
    {
        return $this->status == self::CANCELLED;
    }
}
