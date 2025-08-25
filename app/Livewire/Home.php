<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{   
    public $products;
    public $categories;
    public $selectedCategory = null;
    
        // load recent products
        //$this->products = Product::latest()->take(8)->get();

    

    public function mount()
    {
        $this->categories = Category::all();
        $this->products = Product::latest()->get();
    }

    public function filterByCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->products = Product::where('category_id', $categoryId)->latest()->get();
    }

    public function render()
    {
        return view('livewire.home');
        // ->layout('layouts.app'); // uses your base layout
    }
    
}
