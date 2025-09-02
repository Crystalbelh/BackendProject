<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Orders Management</h1>

    <!-- Search and Filter Controls -->
    <div class="flex justify-between items-center mb-6">
        <!-- Search -->
        <div class="relative w-1/3">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <i class="fas fa-search text-gray-400"></i>
            </span>
            <input 
                type="text" 
                wire:model.debounce.500ms="search"
                class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-purple-500" 
                placeholder="Search by order number or customer"
            >
        </div>

        <!-- Filter -->
        <div>
            <select 
                wire:model="filterStatus"
                class="pl-4 pr-8 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-purple-500"
            >
                <option value="">All Status</option>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="bg-white p-6 rounded-xl shadow-sm">
        <h2 class="text-lg font-bold mb-4">Orders List</h2>

        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th class="px-6 py-3">Order</th>
                    <th class="px-6 py-3">Customer</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Total</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $order->order_number }}</td>
                        <td class="px-6 py-4">{{ $order->customer_name }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded-full 
                                {{ $order->status == 'completed' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $order->status == 'processing' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $order->status == 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">${{ number_format($order->total, 2) }}</td>
                        <td class="px-6 py-4">{{ $order->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4">
                            <button class="px-3 py-1 text-xs text-white bg-purple-600 rounded-lg hover:bg-purple-700">View</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-400">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</div>

</div>
