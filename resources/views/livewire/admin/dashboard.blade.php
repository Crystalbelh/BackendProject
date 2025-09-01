 {{-- Because she competes with no one, no one can compete with her. --}}
<div class="min-h-screen bg-gray-100 font-sans">
    <div class="flex h-screen">
        @livewire('admin.dashboard')
        <!-- Sidebar -->
        <div class="w-64 bg-gradient-to-b from-purple-800 to-purple-900 text-white">
            <div class="p-5 border-b border-purple-700">
                <h1 class="text-xl font-bold flex items-center">
                    <i class="fas fa-store mr-2 text-purple-300"></i> E-Shop Admin
                </h1>
            </div>
            
          <!-- Admin Sidebar -->
<aside class="w-64 bg-purple-800 text-white min-h-screen">
    <div class="flex items-center px-6 py-4 border-b border-purple-700">
        <i class="fas fa-store text-2xl text-pink-400 mr-3"></i>
        <span class="text-lg font-bold">Admin Panel</span>
    </div>

    <nav class="mt-4 space-y-1">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center px-6 py-3 
           {{ request()->routeIs('admin.dashboard') ? 'bg-purple-700 text-white' : 'text-purple-200 hover:bg-purple-700 hover:text-white' }}">
            <i class="fas fa-tachometer-alt mr-3 text-blue-300"></i> Dashboard
        </a>

        <!-- Products -->
        <a href="{{ route('admin.products') }}"
           class="flex items-center px-6 py-3 
           {{ request()->routeIs('admin.products') ? 'bg-purple-700 text-white' : 'text-purple-200 hover:bg-purple-700 hover:text-white' }}">
            <i class="fas fa-box mr-3 text-green-300"></i> Products
        </a>

        <!-- Orders -->
        <a href="{{ route('admin.products') }}"
           class="flex items-center px-6 py-3 
           {{ request()->routeIs('admin.orders') ? 'bg-purple-700 text-white' : 'text-purple-200 hover:bg-purple-700 hover:text-white' }}">
            <i class="fas fa-shopping-cart mr-3 text-yellow-300"></i> Orders
        </a>

        <!-- Customers -->
        <a href="{{ route('admin.products') }}"
   class="flex items-center px-6 py-3 mt-1 text-purple-200 hover:bg-purple-700 hover:text-white">
    <i class="fas fa-box mr-3 text-green-300"></i> Products
</a>

        <!-- Reports -->
        <a href="{{ route('admin.products') }}"
           class="flex items-center px-6 py-3 
           {{ request()->routeIs('admin.reports') ? 'bg-purple-700 text-white' : 'text-purple-200 hover:bg-purple-700 hover:text-white' }}">
            <i class="fas fa-chart-line mr-3 text-orange-300"></i> Reports
        </a>

        <!-- Settings -->
        <a href="{{ route('admin.products') }}"
           class="flex items-center px-6 py-3 
           {{ request()->routeIs('admin.settings') ? 'bg-purple-700 text-white' : 'text-purple-200 hover:bg-purple-700 hover:text-white' }}">
            <i class="fas fa-cog mr-3 text-gray-300"></i> Settings
        </a>
    </nav>
</aside>

            
            <div class="absolute bottom-0 w-64 p-4 bg-purple-900">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-purple-600 flex items-center justify-center">
                        <span class="text-white font-bold">A</span>
                    </div>
                    <div class="ml-3">
    @auth
        <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
        <p class="text-xs text-purple-200">{{ auth()->user()->email }}</p>
    @endauth
</div>
                </div>
                <a href="#" class="flex items-center mt-4 text-purple-200 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <header class="flex items-center justify-between p-4 bg-white border-b">
                <div class="flex items-center">
                    <button class="text-gray-500 focus:outline-none lg:hidden">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                    
                    <div class="relative mx-4 lg:mx-0">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-search text-gray-400"></i>
                        </span>
                        <input class="w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-purple-500" type="text" placeholder="Search">
                    </div>
                </div>
                
                <div class="flex items-center">
                    <button class="flex mx-4 text-gray-600 focus:outline-none">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="flex w-2 h-2 -mt-1 -mr-1">
                            <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-purple-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-purple-500"></span>
                        </span>
                    </button>
                    
                    <div class="relative">
                        <button class="relative flex items-center focus:outline-none">
                            <div class="w-8 h-8 rounded-full bg-purple-600 flex items-center justify-center">
                                <span class="text-white font-bold">A</span>
                            </div>
                        </button>
                    </div>
                </div>
            </header>
            
            <!-- Dashboard Content -->
            <main class="p-6">
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Dashboard Overview</h2>
                    <p class="text-gray-600">Welcome back, here's what's happening with your store today.</p>
                </div>
                
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                <i class="fas fa-shopping-cart text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-600">Total Sales</p>
                                <h3 class="text-2xl font-bold text-gray-800">${{ number_format($totalSales, 2) }}</h3>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-500 flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i> 12.5%
                                <span class="text-gray-500 ml-2">since last week</span>
                            </span>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-600">Customers</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ number_format($totalCustomers) }}</h3>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-500 flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i> 7.2%
                                <span class="text-gray-500 ml-2">since last week</span>
                            </span>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <i class="fas fa-box text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-600">Products</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ number_format($totalProducts) }}</h3>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-500 flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i> 3.1%
                                <span class="text-gray-500 ml-2">since last week</span>
                            </span>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-red-100 text-red-600">
                                <i class="fas fa-percentage text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-600">Conversion Rate</p>
                                <h3 class="text-2xl font-bold text-gray-800">{{ number_format($conversionRate, 2) }}%</h3>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-red-500 flex items-center">
                                <i class="fas fa-arrow-down mr-1"></i> 1.8%
                                <span class="text-gray-500 ml-2">since last week</span>
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Charts & Recent Orders -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <!-- Revenue Chart -->
                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Revenue</h3>
                            <div>
                                <button class="text-xs px-3 py-1 bg-purple-100 text-purple-700 rounded-full">Month</button>
                            </div>
                        </div>
                        <div class="h-64 flex items-end space-x-2">
                            @foreach($chartValues as $index => $value)
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-10 bg-purple-500 rounded-t" style="height: {{ $value }}%;"></div>
                                <p class="text-xs text-gray-500 mt-2">{{ $chartLabels[$index] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Recent Orders -->
                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Recent Orders</h3>
                            <a href="#" class="text-sm text-purple-600 hover:text-purple-800">View All</a>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-left border-b">
                                        <th class="pb-3 text-gray-600">Customer</th>
                                        <th class="pb-3 text-gray-600">Date</th>
                                        <th class="pb-3 text-gray-600">Amount</th>
                                        <th class="pb-3 text-gray-600">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentOrders as $order)
                                    <tr class="border-b">
                                        <td class="py-3">{{ $order['customer'] }}</td>
                                        <td class="py-3 text-gray-500">{{ $order['date'] }}</td>
                                        <td class="py-3 font-medium">${{ number_format($order['amount'], 2) }}</td>
                                        <td class="py-3">
                                            @php
                                                $statusColors = [
                                                    'completed' => 'bg-green-100 text-green-700',
                                                    'processing' => 'bg-yellow-100 text-yellow-700',
                                                    'shipped' => 'bg-blue-100 text-blue-700',
                                                    'cancelled' => 'bg-red-100 text-red-700'
                                                ];
                                                $color = $statusColors[$order['status']] ?? 'bg-gray-100 text-gray-700';
                                            @endphp
                                            <span class="px-2 py-1 {{ $color }} text-xs rounded-full capitalize">{{ $order['status'] }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Top Products & Activity Feed -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Top Products -->
                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Top Selling Products</h3>
                            <a href="#" class="text-sm text-purple-600 hover:text-purple-800">View All</a>
                        </div>
                        
                        <div class="space-y-4">
                            @foreach($topProducts as $product)
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden">
                                    <img src="{{ $product['image'] }}" alt="Product" class="w-full h-full object-cover">
                                </div>
                                <div class="ml-4 flex-1">
                                    <h4 class="font-medium">{{ $product['name'] }}</h4>
                                    <p class="text-sm text-gray-500">{{ $product['category'] }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-medium">${{ number_format($product['price'], 2) }}</p>
                                    <p class="text-sm text-gray-500">{{ $product['sold_count'] }} sold out</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Recent Activity -->
                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Recent Activity</h3>
                            <a href="#" class="text-sm text-purple-600 hover:text-purple-800">View All</a>
                        </div>
                        
                        <div class="space-y-4">
                            @foreach($recentActivities as $activity)
                            <div class="flex">
                                <div class="w-10 h-10 rounded-full bg-{{ $activity['icon_color'] }}-100 text-{{ $activity['icon_color'] }}-600 flex items-center justify-center">
                                    <i class="fas fa-{{ $activity['icon'] }}"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm">{{ $activity['title'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $activity['time'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<script>
    // Simple toggle for mobile sidebar
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.querySelector('.lg\\:hidden');
        const sidebar = document.querySelector('.w-64');
        
        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('hidden');
                sidebar.classList.toggle('absolute');
                sidebar.classList.toggle('z-50');
            });
        }
    });
</script>