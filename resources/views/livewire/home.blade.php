<div class="min-h-screen bg-gray-50">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- ✅ Hero Section with Background Image -->
    <section class="relative bg-gradient-to-r from-blue-700 via-indigo-600 to-purple-600 text-white py-24">
        <div class="absolute inset-0 bg-cover bg-center opacity-30"
            style="background-image: url('{{ asset('images/mypoject.jpg') }}');"></div>

        <div class="relative container mx-auto px-6 text-center">
            <h1 class="text-5xl font-extrabold mb-4 drop-shadow-lg">
                Discover Amazing Products
            </h1>
            <p class="text-xl mb-6 drop-shadow-lg">
                Shop the latest items with unbeatable prices 🚀
            </p>
            <!-- scrolls to products -->
            <a href="#dynamic-products"
                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-8 py-3 rounded-lg shadow-lg inline-flex items-center space-x-2">
                <i class="fas fa-shopping-cart"></i> <span>Shop Now</span>
            </a>
        </div>
    </section>

    <!-- ✅ Dynamic Products (Livewire) -->
    <section id="dynamic-products" class="container mx-auto px-6 py-16 scroll-mt-20">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 text-center">✨ Featured Products</h2>

        <livewire:product-list />
    </section>
</div>
