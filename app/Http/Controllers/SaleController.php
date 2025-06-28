<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('product')->latest()->get();

        return view('sales.index', compact('sales'));
    }

    public function create() {
        $products = Product::latest()->get();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request) {
        $product = Product::findOrFail($request->product_id);
        $qty = $request->quantity;
        if($qty > $product->stock){
            return redirect()->back()->with('warning', 'Product stock exceed.');
        }
        $discount = $request->discount ?? 0;
        $subtotal = $product->sell_price * $qty;
        $discounted = $subtotal - $discount;
        $vat = $discounted * 0.05;
        $total = $discounted + $vat;
        $paid = $request->paid_amount;
        $due = $total - $paid;

        $sale = Sale::create([
            'product_id' => $product->id,
            'quantity' => $qty,
            'discount' => $discount,
            'vat' => $vat,
            'total' => $total,
            'paid_amount' => $paid,
            'due_amount' => $due,
        ]);

        $product->decrement('stock', $qty);

        Journal::insert([
            ['product_id' => $product->id,'type' => 'sales', 'amount' => $subtotal, 'sale_id' => $sale->id, 'created_at' => now()],
            ['product_id' => $product->id,'type' => 'discount', 'amount' => $discount, 'sale_id' => $sale->id, 'created_at' => now()],
            ['product_id' => $product->id,'type' => 'vat', 'amount' => $vat, 'sale_id' => $sale->id, 'created_at' => now()],
            ['product_id' => $product->id,'type' => 'payment', 'amount' => $paid, 'sale_id' => $sale->id, 'created_at' => now()],
            ['product_id' => $product->id,'type' => 'due', 'amount' => $due, 'sale_id' => $sale->id, 'created_at' => now()],
        ]);

        return redirect()->back()->with('success', 'Sale recorded.');
    }
}
