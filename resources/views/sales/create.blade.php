@extends('layouts.master')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-semibold mb-6">Create Sale</h2>

        <form method="POST" action="{{ route('sales.store') }}">
            @csrf

            <select
                name="product_id"
                required
                class="w-full mb-4 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
                <option value="" disabled selected>Select Product</option>
                @foreach($products as $p)
                    <option value="{{ $p->id }}">
                        {{ $p->name }} (Stock: {{ $p->stock }})
                    </option>
                @endforeach
            </select>

            <input
                name="quantity"
                type="number"
                placeholder="Quantity"
                required
                class="w-full mb-4 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                value="{{ old('quantity') }}"
            >

            <input
                name="discount"
                type="number"
                placeholder="Discount (TK)"
                class="w-full mb-4 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                value="{{ old('discount') }}"
            >

            <input
                name="paid_amount"
                type="number"
                placeholder="Paid Amount"
                required
                class="w-full mb-6 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                value="{{ old('paid_amount') }}"
            >

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold transition"
            >
                Submit Sale
            </button>
        </form>
    </div>
@endsection
