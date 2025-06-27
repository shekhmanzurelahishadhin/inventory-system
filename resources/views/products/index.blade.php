@extends('layouts.master')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-2xl font-semibold">Product List</h2>
        <a href="{{ route('products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            Add Product
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
            <tr>
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-left">Purchase</th>
                <th class="py-3 px-6 text-left">Sell</th>
                <th class="py-3 px-6 text-left">Stock</th>
            </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
            @foreach($products as $p)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-3 px-6 text-left">{{ $p->name }}</td>
                    <td class="py-3 px-6 text-left">${{ number_format($p->purchase_price, 2) }}</td>
                    <td class="py-3 px-6 text-left">${{ number_format($p->sell_price, 2) }}</td>
                    <td class="py-3 px-6 text-left">{{ $p->stock }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
