<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $totalSales;
    public $totalCustomers;
    public $totalProducts;
    public $conversionRate;
    public $recentOrders;
    public $topProducts;
    public $recentActivities;
    public $salesData;
    public $chartLabels = [];
    public $chartValues = [];

    public function mount()
    {
        $this->loadStats();
        $this->loadRecentOrders();
        $this->loadTopProducts();
        $this->loadRecentActivities();
        $this->loadChartData();
    }

    public function loadStats()
    {
        // Total sales (last 30 days)
        $this->totalSales = Order::where('created_at', '>=', Carbon::now()->subDays(30))
            ->where('status', 'completed')
            ->sum('total_amount');

        // Total customers
        $this->totalCustomers = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();

        // Total products
        $this->totalProducts = Product::count();

        // Conversion rate (placeholder calculation)
        $this->conversionRate = rand(3, 8) + (rand(0, 99) / 100);
    }

    public function loadChartData()
    {
        // Generate sample data for the chart
        $this->chartLabels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        $this->chartValues = [60, 80, 45, 75, 90, 70, 85];
    }

    public function loadRecentOrders()
    {
        $orders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        $this->recentOrders = $orders->map(function ($order) {
            return [
                'id' => $order->id,
                'customer' => $order->user->name ?? 'Guest',
                'date' => $order->created_at->format('M j, Y'),
                'amount' => $order->total_amount,
                'status' => $order->status,
            ];
        })->toArray();
    }

    public function loadTopProducts()
    {
        // This is a simplified example - you'd need order items relationship
        $products = Product::inRandomOrder()
            ->take(3)
            ->get();

        $this->topProducts = $products->map(function ($product) {
            return [
                'name' => $product->name,
                'category' => $product->category->name ?? 'Uncategorized',
                'price' => $product->price,
                'sold_count' => rand(50, 200),
                'image' => $product->image ?? 'https://source.unsplash.com/100x100/?product,' . strtolower(str_replace(' ', '', $product->name)),
            ];
        })->toArray();
    }

    public function loadRecentActivities()
    {
        $this->recentActivities = [
            [
                'icon' => 'shopping-cart',
                'icon_color' => 'purple',
                'title' => 'New order #' . rand(3200, 3300) . ' was placed',
                'time' => '2 minutes ago',
            ],
            [
                'icon' => 'user-plus',
                'icon_color' => 'blue',
                'title' => 'New customer registered',
                'time' => '1 hour ago',
            ],
            [
                'icon' => 'check-circle',
                'icon_color' => 'green',
                'title' => 'Order #' . rand(3100, 3200) . ' was completed',
                'time' => '3 hours ago',
            ],
            [
                'icon' => 'exclamation-circle',
                'icon_color' => 'yellow',
                'title' => 'Product Wireless Earbuds is low in stock',
                'time' => '5 hours ago',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}