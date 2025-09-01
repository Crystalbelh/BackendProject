<div class="p-8 bg-gray-50 min-h-screen">
    @livewireScripts
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-extrabold text-gray-800">🛍️ Product Management</h1>
        <button wire:click="create"
            class="px-5 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-xl shadow hover:scale-105 transform transition">
            + Add Product
        </button>
    </div>

    <div class="flex gap-2 mb-4">
    <!-- Search -->
    <input type="text" wire:model.debounce.500ms="search"
        placeholder="Search by name, SKU, price, or category..."
        class="border p-2 rounded w-1/2">

    <!-- Category Filter -->
    <select wire:model="filterCategory" class="border p-2 rounded">
        <option value="">All Categories</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>



    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg shadow-sm">
            ✅ {{ session('message') }}
        </div>
    @endif

    {{-- Products Table --}}
    <div class="overflow-x-auto bg-white shadow-lg rounded-2xl border border-gray-200">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white text-left">
                <tr>
                    <th class="px-6 py-3">Image</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">SKU</th>
                    <th class="px-6 py-3">Category</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Created By</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($products as $product)
                    <tr class="hover:bg-gray-50 transition">
                        {{-- Image --}}
                        <td class="px-6 py-3">
                            <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/60' }}"
                                class="w-14 h-14 rounded-xl object-cover border shadow-sm">
                        </td>

                        {{-- Name --}}
                        <td class="px-6 py-3 font-semibold">{{ $product->name }}</td>

                        {{-- SKU --}}
                        <td class="px-6 py-3 text-gray-600 font-mono">{{ $product->sku }}</td>

                        {{-- Category --}}
                        <td class="px-6 py-3 text-gray-600">{{ $product->category->name ?? 'Uncategorized' }}</td>

                        {{-- Price --}}
                        <td class="px-6 py-3 font-bold text-green-600">${{ number_format($product->price, 2) }}</td>

                        {{-- Created By --}}
                        <td class="px-6 py-3">
                            @if($product->user)
                                <div class="flex flex-col">
                                    <span class="font-medium text-gray-800">{{ $product->user->name }}</span>
                                    <span class="text-xs text-gray-500">{{ $product->user->email }}</span>
                                </div>
                            @else
                                <span class="text-gray-400 italic">N/A</span>
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-3 flex justify-center space-x-3">
                            <button wire:click="edit({{ $product->id }})"
                                class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                                ✏️ Edit
                            </button>
                            <button wire:click="delete({{ $product->id }})"
                                class="px-4 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition">
                                🗑️ Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center py-6 text-gray-500">No products found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6 flex justify-center">{{ $products->links() }}</div>

    {{-- Modal --}}
    @if($isModalOpen)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-2xl p-8 w-full max-w-lg shadow-2xl transform scale-95 animate-[fadeIn_0.3s_ease-out]">
                <h2 class="text-xl font-bold text-gray-800 mb-6">
                    {{ $isEdit ? '✏️ Edit Product' : '➕ Add New Product' }}
                </h2>

                <form wire:submit.prevent="save" class="space-y-5">
                    {{-- Name --}}
                    <div>
                        <input type="text" wire:model="name" placeholder="Product Name"
                            class="w-full px-4 py-2 border-2 rounded-lg focus:ring-purple-500 focus:border-purple-500">
                        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    {{-- SKU --}}
                    <div>
                        <input type="text" wire:model="sku" placeholder="SKU (auto-generated but editable)"
                            class="w-full px-4 py-2 border-2 rounded-lg focus:ring-purple-500 focus:border-purple-500 font-mono">
                        @error('sku') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    {{-- Price --}}
                    <div>
                        <input type="number" wire:model="price" placeholder="Price"
                            class="w-full px-4 py-2 border-2 rounded-lg focus:ring-purple-500 focus:border-purple-500">
                        @error('price') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    {{-- Category --}}
                    <div>
                        <select wire:model="category_id"
                            class="w-full px-4 py-2 border-2 rounded-lg focus:ring-purple-500 focus:border-purple-500">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    {{-- Image Upload --}}
                    <div>
                        <input type="file" wire:model="image" class="w-full border-2 rounded-lg p-2">
                        @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                        @if ($image && !$isEdit)
                            <img src="{{ $image->temporaryUrl() }}" class="w-24 h-24 mt-3 rounded-lg border shadow">
                        @endif
                    </div>

                    {{-- Actions --}}
                    <div class="flex justify-end space-x-3">
                        <button type="button" wire:click="$set('isModalOpen', false)"
                            class="px-5 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-5 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-lg shadow hover:scale-105 transform transition">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
     @livewireStyles
</div>








