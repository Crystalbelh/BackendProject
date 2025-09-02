<x-layouts.app>
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Our Products</h1>

        {{-- Show success/error messages --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Products Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <div class="bg-white rounded-lg shadow p-4 flex flex-col">
                    {{-- Product Image --}}
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/200' }}"
                         alt="{{ $product->name }}"
                         class="w-full h-48 object-cover rounded">

                    {{-- Product Info --}}
                    <div class="mt-3 flex-1">
                        <h2 class="font-semibold text-lg">{{ $product->name }}</h2>
                        <p class="text-gray-600 text-sm">
                            {{ $product->category->name ?? 'Uncategorized' }}
                        </p>
                        <p class="text-xl font-bold mt-2">
                            ${{ number_format($product->price, 2) }}
                        </p>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="mt-4 flex gap-2">
                        {{-- Add to Cart --}}
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                                Add to Cart
                            </button>
                        </form>

                        {{-- Wishlist --}}
                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-pink-500 text-white p-2 rounded hover:bg-pink-600">
                                ♥
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">No products available.</p>
            @endforelse
        </div>

        {{-- Checkout Button --}}
        @auth
            <div class="mt-8 text-center">
                <a href="{{ route('checkout.index') }}"
                   class="bg-green-600 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-700">
                    Proceed to Checkout
                </a>
            </div>
        @endauth
    </div>
</x-layouts.app>
