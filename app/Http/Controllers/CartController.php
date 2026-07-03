<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cartItems = CartItem::with('product')
            ->where('user_id', $request->user()->id)
            ->get();

        return response()->json([
            'data' => $cartItems
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {
            return response()->json([
                'message' => 'Insufficient stock'
            ], 400);
        }

        $cartItem = CartItem::where('user_id', $request->user()->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $newQuantity = $cartItem->quantity + $request->quantity;

            if ($product->stock < $newQuantity) {
                return response()->json([
                    'message' => 'Insufficient stock'
                ], 400);
            }

            $cartItem->update([
                'quantity' => $newQuantity
            ]);
        } else {
            $cartItem = CartItem::create([
                'user_id' => $request->user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json([
            'message' => 'Product added to cart',
            'data' => $cartItem->load('product')
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $cartItem = CartItem::with('product')
            ->where('user_id', $request->user()->id)
            ->findOrFail($id);

        return response()->json([
            'data' => $cartItem
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::where('user_id', $request->user()->id)
            ->findOrFail($id);

        if ($cartItem->product->stock < $request->quantity) {
            return response()->json([
                'message' => 'Insufficient stock'
            ], 400);
        }

        $cartItem->update([
            'quantity' => $request->quantity
        ]);

        return response()->json([
            'message' => 'Cart item updated',
            'data' => $cartItem->load('product')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $cartItem = CartItem::where('user_id', $request->user()->id)
            ->findOrFail($id);

        $cartItem->delete();

        return response()->json([
            'message' => 'Cart item removed'
        ]);
    }
}
