<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class ReportController extends Controller
{
//    public function index(Request $request) {
//        $from = $request->from;
//        $to = $request->to;
//
//        $sales = Journal::where('type', 'sales')->whereBetween('created_at', [$from, $to])->sum('amount');
//        $discount = Journal::where('type', 'discount')->whereBetween('created_at', [$from, $to])->sum('amount');
//        $vat = Journal::where('type', 'vat')->whereBetween('created_at', [$from, $to])->sum('amount');
//        $paid = Journal::where('type', 'payment')->whereBetween('created_at', [$from, $to])->sum('amount');
//        $opening = Journal::where('type', 'opening')->whereBetween('created_at', [$from, $to])->sum('amount');
//
//        return view('reports.index', compact('sales', 'discount', 'vat', 'paid', 'opening'));
//    }
    public function index(Request $request) {
        $from = $request->from;
        $to = $request->to;


        $reports = \DB::table('journals')
            ->select(
                'product_id',
                \DB::raw('SUM(CASE WHEN type = "opening" THEN amount ELSE 0 END) as opening'),
                \DB::raw('SUM(CASE WHEN type = "sales" THEN amount ELSE 0 END) as sales'),
                \DB::raw('SUM(CASE WHEN type = "discount" THEN amount ELSE 0 END) as discount'),
                \DB::raw('SUM(CASE WHEN type = "vat" THEN amount ELSE 0 END) as vat'),
                \DB::raw('SUM(CASE WHEN type = "payment" THEN amount ELSE 0 END) as paid')
            )
            ->whereBetween('created_at', [$from, $to])
            ->groupBy('product_id')
            ->get();

        $productIds = $reports->pluck('product_id')->filter()->unique();
        $products = \App\Models\Product::whereIn('id', $productIds)->pluck('name', 'id');

        return view('reports.index', compact('reports', 'products', 'from', 'to'));
    }

}
