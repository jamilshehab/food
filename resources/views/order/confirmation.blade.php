@extends('main')


@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Order Confirmation Header -->
        <div class="text-center mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl mt-4">
                Order Confirmed!
            </h1>
            <p class="mt-2 text-lg text-gray-600">
                Thank you for your purchase. Here's your order summary.
            </p>
            <div class="mt-4 bg-blue-50 p-4 rounded-lg inline-flex items-center">
                <span class="font-medium text-blue-800">Order #{{ $order->id }}</span>
                <span class="mx-2 text-blue-400">•</span>
                {{-- <span class="text-blue-600">{{ $order->created_at->format('F j, Y') }}</span> --}}
            </div>
        </div>

        <!-- Invoice Card -->
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-yellow-600 to-yellow-700 p-6 text-white">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-2xl font-bold">INVOICE</h2>
                        <p class="opacity-90">{{ config('app.name') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm opacity-90">Payment Method</p>
                        <p class="font-semibold capitalize">{{ str_replace('_', ' ', $order->payment_method) }}</p>
                    </div>
                </div>
            </div>

            <!-- Customer Details -->
            <div class="p-6 border-b">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Bill To</h3>
                        <p class="font-medium">{{ $order->first_name }} {{ $order->last_name }}</p>
                        <p class="text-gray-600">{{ $order->address }}</p>
                        <p class="text-gray-600">{{ $order->city }}, {{ $order->country }}</p>
                        <p class="text-gray-600">{{ $order->phone_number }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Order Details</h3>
                        <div class="space-y-1">
                            <p class="flex justify-between">
                                <span class="text-gray-600">Order Status:</span>
                                <span class="font-medium text-blue-600">Completed</span>
                            </p>
                            <p class="flex justify-between">
                                <span class="text-gray-600">Order Date:</span>
                                <span>{{ $order->created_at->format('M j, Y \a\t g:i A') }}</span>
                            </p>
                            <p class="flex justify-between">
                                <span class="text-gray-600">Email:</span>
                                <span>{{ $order->email }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left pb-3 text-gray-700 font-medium">Item</th>
                                <th class="text-right pb-3 text-gray-700 font-medium">Price</th>
                                <th class="text-right pb-3 text-gray-700 font-medium">Qty</th>
                                <th class="text-right pb-3 text-gray-700 font-medium">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->menus as $item)
                            <tr class="border-b">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-12 h-12 rounded-md object-cover mr-4">
                                        <div>
                                            <p class="font-medium">{{ $item->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $item->ingredients }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right py-4">${{ number_format($item->price, 2) }}</td>
                                <td class="text-right py-4">{{ $item->pivot->quantity }}</td>
                                <td class="text-right py-4">${{ number_format($item->price * $item->pivot->quantity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Totals -->
            <div class="p-6 bg-gray-50">
                <div class="max-w-xs ml-auto space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span>${{ number_format($order->menus->sum(function($item) { return $item->price * $item->pivot->quantity; }), 2) }}</span>
                    </div>
                     
                    <div class="flex justify-between border-t pt-2">
                        <span class="font-semibold">Total</span>
                        <span>${{ number_format($order->menus->sum(function($item) { return $item->price * $item->pivot->quantity; }), 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-6 bg-white border-t">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <h4 class="font-semibold text-gray-700">Need Help?</h4>
                        <p class="text-sm text-gray-600">Contact us at support@yourstore.com</p>
                    </div>
                    <div class="space-x-4">
                        <a href="{{ route('home') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Continue Shopping
                        </a>
                        <button onclick="window.print()" class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-50 transition">
                            Print Invoice
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delivery Estimate -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow">
            <div class="flex items-start">
                <div class="flex-shrink-0 text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-gray-900">Delivery Estimate</h3>
                    <p class="mt-1 text-gray-600">
                        Your order will be delivered by {{ now()->addDays(3)->format('l, F j') }}.
                        We'll send you a notification when it ships.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection