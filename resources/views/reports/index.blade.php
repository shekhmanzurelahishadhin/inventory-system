@extends('layouts.master')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Financial Report</h2>

    <form method="GET" class="mb-6 max-w-md flex space-x-4">
        <input
            type="date"
            name="from"
            value="{{ old('from', $from ?? '') }}"
            required
            class="border rounded px-3 py-2 w-1/2"
        >
        <input
            type="date"
            name="to"
            value="{{ old('to', $to ?? '') }}"
            required
            class="border rounded px-3 py-2 w-1/2"
        >
        <button type="submit" class="bg-gray-600 text-white px-4 rounded hover:bg-gray-700">
            Filter
        </button>
    </form>

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full table-auto text-left">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm font-semibold">
            <tr>
                <th class="py-3 px-6">Product</th>
                <th class="py-3 px-6">Opening Stock Value (TK)</th>
                <th class="py-3 px-6">Total Sales (TK)</th>
                <th class="py-3 px-6">Total Discount (TK)</th>
                <th class="py-3 px-6">Total VAT (TK)</th>
                <th class="py-3 px-6">Total Paid (TK)</th>
            </tr>
            </thead>
            <tbody>
            @forelse($reports as $report)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-6">{{ $products[$report->product_id] ?? 'N/A' }}</td>
                    <td class="py-3 px-6">{{ number_format($report->opening, 2) }}</td>
                    <td class="py-3 px-6">{{ number_format($report->sales, 2) }}</td>
                    <td class="py-3 px-6">{{ number_format($report->discount, 2) }}</td>
                    <td class="py-3 px-6">{{ number_format($report->vat, 2) }}</td>
                    <td class="py-3 px-6">{{ number_format($report->paid, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">No data found for the selected date range.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
