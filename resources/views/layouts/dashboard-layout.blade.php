<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="min-h-screen flex bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">

  <!-- Sidebar -->
  <aside class="w-64 bg-white/90 backdrop-blur-md shadow-lg flex flex-col">
    <div class="p-6 text-center border-b border-gray-300">
      <h1 class="text-2xl font-bold text-indigo-600">MyShop</h1>
    </div>
    
    <nav class="flex-1 p-4 space-y-2">
      <a href="{{ route('user.dashboard') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">
        🏠 Home
      </a>
      @if(auth()->user() && auth()->user()->hasRole('Admin|SuperAdmin'))
      <a href="#" class="flex items-center px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">
        🛍 Products
      </a>
      @endif
      <a href="{{ route('about') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">
        ℹ️ About
      </a>
      <a href="{{ route('settings') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">
        ⚙️ Settings
      </a>
    </nav>
    <div class="p-4 border-t">
      <form method="POST" action="{{ url('/logout') }}">
        @csrf
        <button class="w-full px-4 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-lg shadow hover:opacity-90">
          Logout
        </button>
      </form>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-8 text-white">
    @yield('main-content')
  </main>
</body>
</html>
