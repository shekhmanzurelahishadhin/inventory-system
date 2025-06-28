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
        ],[
            'name.required' => 'product name is required.',
            'purchase_price.required' => 'purchase price is required.',
            'purchase_price.numeric' => 'purchase price must be a number.',
            'sell_price.required' => 'selling price is required.',
            'sell_price.numeric' => 'selling price must be a number.',
            'stock.required' => 'stock quantity is required.',
            'stock.integer' => 'stock quantity must be an integer.',
        ]);


        $product = Product::create($request->all());


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
