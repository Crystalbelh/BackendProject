<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategory = null;
    public $categories;

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function filterByCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::query();
        
        // Apply search filter
        if ($this->search) {
            $query->where('name', 'like', '%'.$this->search.'%')
                  ->orWhere('description', 'like', '%'.$this->search.'%');
        }
        
        // Apply category filter
        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }
        
        $products = $query->orderBy('created_at', 'desc')->paginate(8);

        return view('livewire.product-list', [
            'products' => $products,
            'categories' => $this->categories
        ]);
    }
    
    // Add to cart functionality (optional)
    public function addToCart($productId, $quantity = 1)
    {
        // You would implement your cart logic here
        // This is just a placeholder method
        session()->flash('message', 'Product added to cart successfully!');
    }
    
    // Add to wishlist functionality (optional)
    public function addToWishlist($productId)
    {
        // You would implement your wishlist logic here
        // This is just a placeholder method
        session()->flash('message', 'Product added to wishlist!');
    }
}