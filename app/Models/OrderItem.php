<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    /**
     * Order item belongs to an order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Order item belongs to a product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
