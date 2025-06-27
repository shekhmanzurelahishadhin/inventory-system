@extends('layouts.master')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-semibold mb-6">Add Product</h2>

        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            <input
                name="name"
                type="text"
                placeholder="Name"
                required
                value="{{ old('name') }}"
                class="w-full mb-4 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >

            <input
                name="purchase_price"
                type="number"
                step="0.01"
                placeholder="Purchase Price"
                required
                value="{{ old('purchase_price') }}"
                class="w-full mb-4 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >

            <input
                name="sell_price"
                type="number"
                step="0.01"
                placeholder="Sell Price"
                required
                value="{{ old('sell_price') }}"
                class="w-full mb-4 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >

            <input
                name="stock"
                type="number"
                placeholder="Opening Stock"
                required
                value="{{ old('stock') }}"
                class="w-full mb-6 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded font-semibold transition"
            >
                Save
            </button>
        </form>
    </div>
@endsection
