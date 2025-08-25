<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'E-commerce') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-indigo-600 to-purple-700 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">🛍️ E-Shop</h1>
            <ul class="flex space-x-6">
                {{-- <li><a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a></li> --}}
                <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                <li><a href="{{ route('products') }}" class="hover:underline">Products</a></li>
                <li><a href="{{ route('about') }}" class="hover:underline">About</a></li>
                <li><a href="{{ route('settings') }}" class="hover:underline">Settings</a></li>
                @role('Admin|SuperAdmin')
                    <li><a href="{{ route('admin.dashboard') }}" class="hover:underline">Admin</a></li>
                @endrole
            </ul>
            <div class="flex items-center space-x-4">
                <span class="font-medium">👤 {{ Auth::user()->name ?? null }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-white text-indigo-700 px-3 py-1 rounded-lg hover:bg-gray-200">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="p-6">
        {{ $slot }}
    </main>
</body>
</html>
