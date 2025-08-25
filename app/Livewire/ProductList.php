<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage(); // reset pagination when searching
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->search.'%')
                    ->orderBy('created_at', 'desc')
                    ->paginate(8);

                     $products = Product::latest()->get();

               return view('livewire.product-list', [
              'products' => $products
        ]);

        return view('livewire.product-list', compact('products'));
    }
    
}
