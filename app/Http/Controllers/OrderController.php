<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = Order::with('items.product')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return response()->json([
            'data' => $orders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $cartItems = CartItem::with('product')
            ->where('user_id', $user->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json([
                'message' => 'Cart is empty'
            ], 400);
        }

        return DB::transaction(function () use ($user, $cartItems) {
            $totalAmount = 0;

            foreach ($cartItems as $cartItem) {
                if ($cartItem->product->stock < $cartItem->quantity) {
                    return response()->json([
                        'message' => 'Insufficient stock for ' . $cartItem->product->name
                    ], 400);
                }

                $totalAmount += $cartItem->product->price * $cartItem->quantity;
            }

            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $totalAmount,
                'status' => 'pending',
            ]);

            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price,
                ]);

                $cartItem->product->decrement('stock', $cartItem->quantity);
            }

            CartItem::where('user_id', $user->id)->delete();

            return response()->json([
                'message' => 'Order created successfully',
                'data' => $order->load('items.product')
            ], 201);
        });
    }

    /**
     * Display the specified resource.
     */
   public function show(Request $request, string $id)
    {
        $order = Order::with('items.product')
            ->where('user_id', $request->user()->id)
            ->findOrFail($id);

        return response()->json([
            'data' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order = Order::where('user_id', $request->user()->id)
            ->findOrFail($id);

        $order->update([
            'status' => $request->status
        ]);

        return response()->json([
            'message' => 'Order status updated',
            'data' => $order
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $order = Order::where('user_id', $request->user()->id)
            ->findOrFail($id);

        $order->delete();

        return response()->json([
            'message' => 'Order deleted successfully'
        ]);
    }
}
