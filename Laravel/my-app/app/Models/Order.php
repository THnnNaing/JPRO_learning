<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [ 
        'customer_id',
        'total_price',
        'order_date',
        'delivery_success',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function OrderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}