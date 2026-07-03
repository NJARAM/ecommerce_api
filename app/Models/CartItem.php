<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    /**
     * Cart item belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Cart item belongs to a product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
