@extends('layouts.master')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-2xl font-semibold">Sales List</h2>
        <a href="{{ route('sales.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            Create Sale
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
            <tr>
                <th class="py-3 px-6 text-left">Product</th>
                <th class="py-3 px-6 text-left">Quantity</th>
                <th class="py-3 px-6 text-left">Discount (TK)</th>
                <th class="py-3 px-6 text-left">VAT (TK)</th>
                <th class="py-3 px-6 text-left">Total (TK)</th>
                <th class="py-3 px-6 text-left">Paid (TK)</th>
                <th class="py-3 px-6 text-left">Due (TK)</th>
            </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
            @foreach($sales as $sale)
                @php
                    $total = ($sale->product->sell_price * $sale->quantity) + $sale->vat - $sale->discount;
                    $due = $total - $sale->paid_amount;
                @endphp
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-6">{{ $sale->product->name ?? 'N/A' }}</td>
                    <td class="py-3 px-6">{{ $sale->quantity }}</td>
                    <td class="py-3 px-6">{{ number_format($sale->discount, 2) }}</td>
                    <td class="py-3 px-6">{{ number_format($sale->vat, 2) }}</td>
                    <td class="py-3 px-6">{{ number_format($total, 2) }}</td>
                    <td class="py-3 px-6">{{ number_format($sale->paid_amount, 2) }}</td>
                    <td class="py-3 px-6 text-red-600 font-semibold">{{ number_format($due, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
