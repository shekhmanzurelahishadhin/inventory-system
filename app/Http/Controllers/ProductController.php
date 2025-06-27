<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Journal;

class ProductController extends Controller
{
    public function index() {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'purchase_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = Product::create($request->all());

        // Create journal entry for opening stock
        $openingAmount = $request->purchase_price * $request->stock;
        Journal::create([
            'product_id' => $product->id,
            'type' => 'opening',
            'amount' => $openingAmount,
            'sale_id' => null,
            'created_at' => now(),
        ]);

        return redirect()->route('products.index')->with('success', 'Product added.');
    }
}
