    {{-- Do your work, then step back. --}}
    <div class="min-h-screen bg-gray-50">

        <!-- ✅ Navbar -->
        <nav class="bg-gradient-to-r from-blue-600 to-indigo-600 shadow sticky top-0 z-50">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center text-white">
                <a href="{{ route('home') }}" class="text-2xl font-bold flex items-center space-x-2">
                    <i class="fas fa-store"></i>
                    <span>MyShop</span>
                </a>

                <div class="flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}"
                            class="bg-white text-blue-600 hover:bg-gray-100 px-4 py-2 rounded-lg font-semibold flex items-center space-x-2">
                            <i class="fas fa-sign-in-alt"></i><span>Login</span>
                        </a>
                        <a href="{{ route('register') }}"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-semibold flex items-center space-x-2">
                            <i class="fas fa-user-plus"></i><span>Register</span>
                        </a>
                    @endguest

                    @auth
                        <span class="bg-white/20 px-3 py-1 rounded-lg">
                            @role('SuperAdmin')
                                👑 SuperAdmin
                            @endrole
                            @role('Admin')
                                🛠 Admin
                            @endrole
                            @role('Customer')
                                🙋 User
                            @endrole
                        </span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold flex items-center space-x-2">
                                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- ✅ Hero Section with Background Image -->
        <section class="relative bg-gradient-to-r from-blue-700 via-indigo-600 to-purple-600 text-white py-24">
            <div class="absolute inset-0 bg-cover bg-center opacity-30"
                style="background-image: url('https://source.unsplash.com/1600x600/?shopping,ecommerce');"></div>

            <div class="relative container mx-auto px-6 text-center">
                <h1 class="text-5xl font-extrabold mb-4 drop-shadow-lg">
                    Discover Amazing Products
                </h1>
                <p class="text-xl mb-6 drop-shadow-lg">
                    Shop the latest items with unbeatable prices 🚀
                </p>
                <a href="#products"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-8 py-3 rounded-lg shadow-lg inline-flex items-center space-x-2">
                    <i class="fas fa-shopping-cart"></i> <span>Shop Now</span>
                </a>
            </div>
        </section>

        <!-- ✅ Products Grid -->
        {{-- <section id="products" class="container mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 text-center">✨ Featured Products</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse($products as $product)
                <div class="bg-white rounded-xl shadow hover:shadow-2xl p-5 transition transform hover:-translate-y-1">
                    <!-- Default Image -->
                    <img src="https://source.unsplash.com/300x200/?product,shopping" 
                         alt="Product Image" 
                         class="rounded-md mb-4 w-full h-40 object-cover">

                    <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h3>
                    <p class="text-gray-600">${{ number_format($product->price, 2) }}</p>

                    <button class="mt-4 w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:opacity-90 text-white px-4 py-2 rounded-lg flex items-center justify-center space-x-2">
                        <i class="fas fa-cart-plus"></i> <span>Add to Cart</span>
                    </button>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">No products available</p>
            @endforelse
        </div>
    </section> --}}
        <!-- ✅ Static Products -->
        <section id="products" class="container mx-auto px-6 py-12">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Featured Products (Static)</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg p-4 transition">
                        {{-- <img src="https://source.unsplash.com/300x200/?shopping,mall" 
                         alt="Product Image" 
                         class="rounded-md mb-4 w-full h-40 object-cover"> --}}

                        <img src="{{ $product->image }}" alt="Product Image"
                            class="rounded-md mb-4 w-full h-40 object-cover">


                        <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                        <p class="text-gray-600">${{ number_format($product->price, 2) }}</p>

                        <button class="mt-4 w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                            Add to Cart
                        </button>
                    </div>
                @empty
                    <p class="col-span-4 text-center text-gray-500">No products available</p>
                @endforelse
            </div>
        </section>

        <!-- ✅ Dynamic Products (Livewire) -->
        <section id="dynamic-products" class="container mx-auto px-6 py-12">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Browse Products (Dynamic)</h2>

            <livewire:product-list />


        </section>


        <!-- ✅ Footer -->
        <footer class="bg-gradient-to-r from-gray-800 to-gray-900 mt-12">
            <div class="container mx-auto px-6 py-6 text-center text-gray-300">
                &copy; {{ date('Y') }} MyShop. All rights reserved. <br>
                <span class="text-sm">Built with ❤️ using Laravel + Livewire</span>
            </div>
        </footer>
    </div>

    <!-- FontAwesome CDN -->
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
