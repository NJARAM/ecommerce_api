<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category',
    ];

    /**
     * A product can appear in many cart items.
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * A product can appear in many order items.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
