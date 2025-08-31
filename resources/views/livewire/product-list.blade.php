<div class="py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Our Products</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:scale-105 transform transition">
                <img src=" {{ 'https://picsum.photos/300?random='. array_rand(range(1,100), 1) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                    <p class="text-gray-500 text-sm mt-1">{{ $product->description }}</p>
                    <p class="text-green-600 font-bold mt-2">${{ number_format($product->price, 2) }}</p>
                    <button class="mt-3 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                        Add to Cart
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
