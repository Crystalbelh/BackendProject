<div class="py-8">
    <!-- Search and Filter Section -->
    <div class="mb-10 bg-white p-6 rounded-xl shadow-sm">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <!-- Search Input -->
            <div class="relative flex-1 max-w-2xl">
                <input type="text" wire:model.live="search" placeholder="Search products..." 
                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                <div class="absolute left-3 top-3.5 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            
            <!-- Category Filter -->
            @if($categories->count() > 0)
            <div class="flex-shrink-0">
                <div class="flex items-center space-x-2 category-filter overflow-x-auto pb-2">
                    <span class="text-gray-600 whitespace-nowrap">Filter by:</span>
                    <button wire:click="filterByCategory(null)" 
                        class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap {{ is_null($selectedCategory) ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        All Products
                    </button>
                    @foreach($categories as $category)
                    <button wire:click="filterByCategory({{ $category->id }})" 
                        class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap {{ $selectedCategory == $category->id ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        {{ $category->name }}
                    </button>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Products Grid -->
    @if($products->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300 border border-gray-100">
                {{-- Product Image --}}
                <div class="relative overflow-hidden">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}"
                         alt="{{ $product->name }}"
                         class="w-full h-48 object-cover transition-transform duration-500 hover:scale-105">
                    
                    {{-- Wishlist Icon --}}
                    <button class="absolute top-3 right-3 w-9 h-9 flex items-center justify-center bg-white/80 rounded-full backdrop-blur-sm text-gray-600 hover:text-red-500 transition-colors"
                            title="Add to Wishlist">
                        <i class="far fa-heart"></i>
                    </button>
                </div>

                <div class="p-5">
                    {{-- Product Info --}}
                    <h3 class="text-lg font-semibold text-gray-800 mb-1 line-clamp-1">{{ $product->name }}</h3>
                    <p class="text-gray-500 text-sm mb-3 line-clamp-2">{{ $product->description }}</p>
                    <p class="text-green-600 font-bold text-lg">${{ number_format($product->price, 2) }}</p>

                    {{-- Quantity + Actions --}}
                    <div class="flex items-center justify-between mt-4">
                        {{-- Quantity --}}
                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <button class="px-2 py-1 bg-gray-100 text-gray-600 hover:bg-gray-200 transition">-</button>
                            <input type="number" min="1" value="1"
                                   class="w-12 text-center border-0 focus:ring-0">
                            <button class="px-2 py-1 bg-gray-100 text-gray-600 hover:bg-gray-200 transition">+</button>
                        </div>

                        {{-- Add to Cart --}}
                        <button class="flex items-center space-x-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                            <i class="fas fa-shopping-cart text-xs"></i>
                            <span>Add</span>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $products->links() }}
    </div>
    @else
    <!-- Empty State -->
    <div class="text-center py-16 bg-white rounded-xl shadow-sm">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
            <i class="fas fa-search text-gray-400 text-xl"></i>
        </div>
        <h3 class="text-xl font-medium text-gray-700 mb-2">No products found</h3>
        <p class="text-gray-500 max-w-md mx-auto">We couldn't find any products matching your criteria. Try adjusting your search or filters.</p>
    </div>
    @endif
</div>