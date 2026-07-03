<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validation = $request->validate([
            'name' =>'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);
        $product = Product::create($validation);
        return response()->json([
            'message'=>'Product Created Successfully!',
            'data' => $product
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product  =Product::find($id);
        if(!$product){
            return response()->json([
                'message' =>'Product Not Found'
            ],404);
        }
          return response()->json([
                'message' =>'Product returned successfully!!',
                'data' => $product
            ],200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found.'
            ], 404);
        }
        $validated = $request->validate([
          'name' =>'required|max:255',
          'price'=>'required|numeric',
          'quantity' => 'required|integer'
        ]);
        $product->update($validated);
        return response()->json([
            'message' => 'Product Updated Successfully!!',
            'data' =>$product
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found.'
            ], 404);
        }
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully!'
        ]);
    }
}
