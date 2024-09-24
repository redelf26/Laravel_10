<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function show()
    {
        return response()->json(Item::all());
    }

    public function show_id($id)
    {
        $product = Item::find($id);
            if ($product) {
                return response()->json($product);
            } else {
                return response()->json(['message' => 'Product not found'], 404);
            }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product = Item::create($request->all());

        return response()->json(['message' => 'Product added successfully', 'product' => $product], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
        ]);

        $product = Item::find($id);

        if ($product) {
            $product->update($request->all());

            return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }

    public function destroy($id)
    {
        $product = Item::find($id);

        if ($product) {
            $product->delete();

            return response()->json(['message' => 'Product deleted successfully'], 204);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
