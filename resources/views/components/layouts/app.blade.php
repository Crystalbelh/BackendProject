<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'E-commerce') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <style>
        .icon-gradient {
            background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        html {
            scroll-behavior: smooth; /* enables smooth scroll for anchors */
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900 font-sans">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-gradient-to-r from-indigo-600 to-purple-700 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold flex items-center">
                🛍️ E-Shop
            </h1>
            
            <!-- Desktop Navigation -->
            <ul class="hidden md:flex space-x-6">
                <li>
                    <a href="{{ route('home') }}" class="hover:underline transition duration-200 flex items-center">
                        <i class="fas fa-home mr-1 text-blue-300"></i> Home
                    </a>
                </li>
                <li>
                    <!-- scrolls to products section -->
                    <a href="{{ route('home') }}#dynamic-products" class="hover:underline transition duration-200 flex items-center">
                        <i class="fas fa-box-open mr-1 text-green-300"></i> Products
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="hover:underline transition duration-200 flex items-center">
                        <i class="fas fa-info-circle mr-1 text-cyan-300"></i> About
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings') }}" class="hover:underline transition duration-200 flex items-center">
                        <i class="fas fa-cog mr-1 text-yellow-300"></i> Settings
                    </a>
                </li>
                @auth
                    @role('Admin|SuperAdmin')
                        <li>
                            <a href="" class="hover:underline transition duration-200 flex items-center">
                                <i class="fas fa-user-shield mr-1 text-red-300"></i> Admin
                            </a>
                        </li>
                    @endrole
                @endauth
            </ul>
            
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
            
            <!-- Desktop Auth Links -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <span class="font-medium flex items-center">
                        <i class="fas fa-user-circle mr-1 text-purple-300"></i> Welcome, {{ Auth::user()->name }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-white text-indigo-700 px-3 py-1 rounded-lg hover:bg-gray-200 transition duration-200 flex items-center">
                            <i class="fas fa-sign-out-alt mr-1 text-red-500"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-white text-indigo-700 px-3 py-1 rounded-lg hover:bg-gray-200 transition duration-200 flex items-center">
                        <i class="fas fa-sign-in-alt mr-1 text-green-500"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-white text-indigo-700 px-3 py-1 rounded-lg hover:bg-gray-200 transition duration-200 flex items-center">
                        <i class="fas fa-user-plus mr-1 text-blue-500"></i> Register
                    </a>
                @endauth
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-purple-800 px-4 py-2 transition-all duration-300 ease-in-out">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('home') }}" class="block hover:underline py-2 flex items-center">
                        <i class="fas fa-home mr-3 w-5 text-center text-blue-300"></i> Home
                    </a>
                </li>
                <li>
                    <!-- scrolls to products section -->
                    <a href="{{ route('home') }}#dynamic-products" class="block hover:underline py-2 flex items-center">
                        <i class="fas fa-box-open mr-3 w-5 text-center text-green-300"></i> Products
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="block hover:underline py-2 flex items-center">
                        <i class="fas fa-info-circle mr-3 w-5 text-center text-cyan-300"></i> About
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings') }}" class="block hover:underline py-2 flex items-center">
                        <i class="fas fa-cog mr-3 w-5 text-center text-yellow-300"></i> Settings
                    </a>
                </li>
                @auth
                    @role('Admin|SuperAdmin')
                        <li>
                            <a href="" class="block hover:underline py-2 flex items-center">
                                <i class="fas fa-user-shield mr-3 w-5 text-center text-red-300"></i> Admin
                            </a>
                        </li>
                    @endrole
                    <li class="pt-2 border-t border-purple-700">
                        <span class="block py-2 flex items-center">
                            <i class="fas fa-user-circle mr-3 w-5 text-center text-purple-300"></i> Welcome, {{ Auth::user()->name }}
                        </span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-white text-indigo-700 px-3 py-1 rounded-lg hover:bg-gray-200 w-full mt-2 flex items-center justify-center">
                                <i class="fas fa-sign-out-alt mr-2 text-red-500"></i> Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="pt-2 border-t border-purple-700 flex flex-col space-y-2">
                        <a href="{{ route('login') }}" class="bg-white text-indigo-700 px-3 py-1 rounded-lg hover:bg-gray-200 text-center flex items-center justify-center">
                            <i class="fas fa-sign-in-alt mr-2 text-green-500"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-white text-indigo-700 px-3 py-1 rounded-lg hover:bg-gray-200 text-center flex items-center justify-center">
                            <i class="fas fa-user-plus mr-2 text-blue-500"></i> Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="p-6 min-h-screen">
        {{ $slot }}
    </main>
    
    <!-- Footer -->
    {{-- optional extract --}}
    
    
    <!-- Livewire Scripts -->
    @livewireScripts
    
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
