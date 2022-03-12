<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'customer_name',
        'email',
        'address',
        'note',
        'amount_product',
        'origin_total',
        'last_total',
        'order_status',
        'created_at',
    ];

    public function orderDetail()
    {
        return $this->hasMany(order_detail::class);
        
    }
}