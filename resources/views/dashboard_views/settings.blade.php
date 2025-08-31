@extends('layouts.dashboard-layout')

@section('main-content')

    <!-- Topbar -->
    {{-- settings file --}}
    <!-- Header -->
     
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
 @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Header -->
<body class="bg-gray-100 font-sans">
  
     <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-800">
                <a href="/">ShopSphere</a>
            </div>
            <div class="flex space-x-4">
                <a href="/home" class="text-gray-600 hover:text-gray-800">Home</a>
                <a href="/products" class="text-gray-600 hover:text-gray-800">Products</a>
                <a href="/about" class="text-gray-600 hover:text-gray-800">About</a>
                <a href="/orders" class="text-gray-600 hover:text-gray-800">Orders</a>
                <a href="/settings" class="text-gray-600 hover:text-gray-800 font-bold">Settings</a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-gray-800">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Settings</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 max-w-2xl mx-auto rounded">
                <p>{{ session('success') }}</p>
                <input type="text" name="success_comment" placeholder="Add a comment for this success" class="w-full border rounded px-3 py-2 mt-2">
            </div>
        @endif

        <!-- Settings Form -->
        <div class="bg-white p-6 rounded-lg shadow max-w-2xl mx-auto">
            <form action="/settings" method="POST">
                @csrf

                <!-- Account Settings -->
                <h2 class="text-xl font-bold text-gray-800 mb-4">Account Settings</h2>
                <div class="mb-4">
                    <label for="admin-name" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input type="text" id="admin-name" name="name" value="{{ $admin->name ?? '' }}" class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        <input type="text" name="name_comment" placeholder="Add a comment for this error" class="w-full border rounded px-3 py-2 mt-2">
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="admin-email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="admin-email" name="email" value="{{ $admin->email ?? '' }}" class="w-full border rounded px-3 py-2 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        <input type="text" name="email_comment" placeholder="Add a comment for this error" class="w-full border rounded px-3 py-2 mt-2">
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="admin-password" class="block text-gray-700 font-semibold mb-2">New Password</label>
                    <input type="password" id="admin-password" name="password" class="w-full border rounded px-3 py-2 @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        <input type="text" name="password_comment" placeholder="Add a comment for this error" class="w-full border rounded px-3 py-2 mt-2">
                    @enderror
                </div>

                <!-- Store Settings -->
                <h2 class="text-xl font-bold text-gray-800 mb-4">Store Settings</h2>
                <div class="mb-4">
                    <label for="store-name" class="block text-gray-700 font-semibold mb-2">Store Name</label>
                    <input type="text" id="store-name" name="store_name" value="{{ $settings->store_name ?? '' }}" class="w-full border rounded px-3 py-2 @error('store_name') border-red-500 @enderror">
                    @error('store_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        <input type="text" name="store_name_comment" placeholder="Add a comment for this error" class="w-full border rounded px-3 py-2 mt-2">
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="store-address" class="block text-gray-700 font-semibold mb-2">Store Address</label>
                    <textarea id="store-address" name="store_address" class="w-full border rounded px-3 py-2 @error('store_address') border-red-500 @enderror">{{ $settings->store_address ?? '' }}</textarea>
                    @error('store_address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        <input type="text" name="store_address_comment" placeholder="Add a comment for this error" class="w-full border rounded px-3 py-2 mt-2">
                    @enderror
                </div>

                <!-- Payment Settings -->
                <h2 class="text-xl font-bold text-gray-800 mb-4">Payment Settings</h2>
                <div class="mb-4">
                    <label for="payment-gateway" class="block text-gray-700 font-semibold mb-2">Payment Gateway</label>
                    <select id="payment-gateway" name="payment_gateway" class="w-full border rounded px-3 py-2 @error('payment_gateway') border-red-500 @enderror">
                        <option value="stripe" {{ ($settings->payment_gateway ?? '') == 'stripe' ? 'selected' : '' }}>Stripe</option>
                        <option value="paypal" {{ ($settings->payment_gateway ?? '') == 'paypal' ? 'selected' : '' }}>PayPal</option>
                        <option value="bank_transfer" {{ ($settings->payment_gateway ?? '') == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                    </select>
                    @error('payment_gateway')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        <input type="text" name="payment_gateway_comment" placeholder="Add a comment for this error" class="w-full border rounded px-3 py-2 mt-2">
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="api-key" class="block text-gray-700 font-semibold mb-2">API Key</label>
                    <input type="text" id="api-key" name="api_key" value="{{ $settings->api_key ?? '' }}" class="w-full border rounded px-3 py-2 @error('api_key') border-red-500 @enderror">
                    @error('api_key')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        <input type="text" name="api_key_comment" placeholder="Add a comment for this error" class="w-full border rounded px-3 py-2 mt-2">
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 w-full">Save Settings</button>
            </form>
        </div>
    </main>
  @endsection