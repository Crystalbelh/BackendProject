{{-- @extends('layouts.dashboard-layout')

@section('main-content')
@vite(['resources/css/app.css', 'resources/js/app.js'])
  <div class="bg-gray-100 font-sans flex-1 p-8 text-black">
    <!-- Topbar -->
    <header class="flex justify-between items-center mb-8">
      <h2 class="text-3xl font-bold">Dashboard</h2>
      <div class="flex items-center space-x-4">
        <span class="bg-white/20 px-4 py-2 rounded-full">Hello, {{ Auth::user()->name ?? 'Customer' }}</span>
        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name ?? 'C' }}" alt="avatar" class="w-10 h-10 rounded-full border-2 border-white shadow">
      </div>
    </header>
    <div class="mt-4 p-4 bg-white/20 rounded-lg">
      <p class="text-xl">Welcome, <span class="font-semibold">{{ Auth::user()->name }}</span></p>
      <p>Email: <span class="italic">{{ Auth::user()->email }}</span></p>
      <p>Role: <span class="capitalize">{{ Auth::user()->getRoleNames()->first() }}</span></p>
    </div>

     <div class="bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-3xl font-bold mb-4">Welcome, {{ Auth::user()->name }}</h1>
        <p class="text-gray-700">
            You are logged in as <strong>{{ Auth::user()->roles->pluck('name')->first() ?? 'Customer' }}</strong>.
        </p>
    </div>

    <!-- Sections -->
    <section id="home" class="mb-12">
      <h3 class="text-2xl font-semibold mb-4">🏠 Home</h3>
      <p class="bg-white/20 p-4 rounded-lg">Welcome to your dashboard overview.</p>
    </section>

   <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white/20 p-6 rounded-lg shadow">🏠 Home</div>
      <div class="bg-white/20 p-6 rounded-lg shadow">📦 Products</div>
      <div class="bg-white/20 p-6 rounded-lg shadow">ℹ️ About</div>
      <div class="bg-white/20 p-6 rounded-lg shadow">⚙️ Settings</div>
      <div class="bg-white/20 p-6 rounded-lg shadow">📨 Messages</div>
      <div class="bg-white/20 p-6 rounded-lg shadow">📊 Reports</div>
    </div>

    <section id="about" class="mb-12">
      <p class="bg-white/20 p-4 rounded-lg mt-12">This is an e-commerce platform where you can manage your products and settings.</p>
    </section>

    <section id="settings" class="mb-12">
      <h3 class="text-2xl font-semibold mb-4">⚙️ Settings</h3>
      <p class="bg-white/20 p-4 rounded-lg">Update your account, password, and preferences here.</p>
    </section>
  </div>
  @endsection --}}

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">

  <!-- Sidebar -->
  <aside class="w-64 bg-white/90 backdrop-blur-md shadow-lg flex flex-col">
    <div class="p-6 text-center border-b">
      <h1 class="text-2xl font-bold text-indigo-600">MyShop</h1>
    </div>
    <nav class="flex-1 p-4 space-y-2">
      <a href="{{ route('home') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">
        🏠 Home
      </a>
      <a href="{{ route('product') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-indigo-100 text-gray-700 font-medium">
        🛍 Products
      </a>
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
    <!-- Topbar -->
    <header class="flex justify-between items-center mb-8">
      <h2 class="text-3xl font-bold">Dashboard</h2>
      <div class="flex items-center space-x-4">
        <span class="bg-white/20 px-4 py-2 rounded-full">Hello, {{ Auth::user()->name ?? 'Customer' }}</span>
        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name ?? 'C' }}" alt="avatar" class="w-10 h-10 rounded-full border-2 border-white shadow">
      </div>
    </header>
    <div class="mt-4 p-4 bg-white/20 rounded-lg">
      <p class="text-xl">Welcome, <span class="font-semibold">{{ Auth::user()->name }}</span></p>
      <p>Email: <span class="italic">{{ Auth::user()->email }}</span></p>
      <p>Role: <span class="capitalize">{{ Auth::user()->getRoleNames()->first() }}</span></p>
    </div>

     <div class="bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-3xl font-bold mb-4">Welcome, {{ Auth::user()->name }}</h1>
        <p class="text-gray-700">
            You are logged in as <strong>{{ Auth::user()->roles->pluck('name')->first() ?? 'Customer' }}</strong>.
        </p>
    </div>

    <!-- Sections -->
    <section id="home" class="mb-12">
      <h3 class="text-2xl font-semibold mb-4">🏠 Home</h3>
      <p class="bg-white/20 p-4 rounded-lg">Welcome to your dashboard overview.</p>
    </section>

   <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white/20 p-6 rounded-lg shadow">🏠 Home</div>
      <div class="bg-white/20 p-6 rounded-lg shadow">📦 Products</div>
      <div class="bg-white/20 p-6 rounded-lg shadow">ℹ️ About</div>
      <div class="bg-white/20 p-6 rounded-lg shadow">⚙️ Settings</div>
      <div class="bg-white/20 p-6 rounded-lg shadow">📨 Messages</div>
      <div class="bg-white/20 p-6 rounded-lg shadow">📊 Reports</div>
    </div>

    <section id="about" class="mb-12">
      <p class="bg-white/20 p-4 rounded-lg mt-12">This is an e-commerce platform where you can manage your products and settings.</p>
    </section>

    <section id="settings" class="mb-12">
      <h3 class="text-2xl font-semibold mb-4">⚙️ Settings</h3>
      <p class="bg-white/20 p-4 rounded-lg">Update your account, password, and preferences here.</p>
    </section>
  </main>
</body>
</html>