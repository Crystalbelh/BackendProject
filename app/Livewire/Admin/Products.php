<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'tailwind';

    public $name, $price, $category_id, $image, $productId;
    public $isModalOpen = false;
    public $isEdit = false;
    public $search = '';
    public $filterCategory = ''; // <-- NEW

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|max:2048',
    ];

    // Reset pagination when search/filter changes
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterCategory()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->resetForm();
        $this->isEdit = false;
        $this->isModalOpen = true;
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $this->productId   = $product->id;
        $this->name        = $product->name;
        $this->price       = $product->price;
        $this->category_id = $product->category_id;
        $this->isEdit      = true;
        $this->isModalOpen = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => $this->isEdit ? 'nullable|image|max:1024' : 'required|image|max:1024',
        ]);

        $data = [
            'name' => $this->name,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::id(),
            'sku' => strtoupper(Str::random(8)), // Auto generate SKU
        ];

        if ($this->image) {
            $data['image'] = $this->image->store('products', 'public');
        }

        Product::updateOrCreate(
            ['id' => $this->productId],
            $data
        );

        session()->flash('message', $this->isEdit ? '✅ Product updated successfully.' : '✅ Product created successfully.');

        $this->resetForm();
        $this->isModalOpen = false;
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        session()->flash('message', 'Product deleted successfully!');
    }

    private function resetForm()
    {
        $this->productId = null;
        $this->name = '';
        $this->price = '';
        $this->category_id = '';
        $this->image = null;
        $this->isEdit = false;
    }

    public function render()
    {
        $products = Product::with('category', 'user')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('sku', 'like', '%' . $this->search . '%')
                      ->orWhere('price', 'like', '%' . $this->search . '%')
                      ->orWhereHas('category', function ($sub) {
                          $sub->where('name', 'like', '%' . $this->search . '%');
                      });
                });
            })
            ->when($this->filterCategory, function ($query) {
                $query->where('category_id', $this->filterCategory);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $categories = Category::all();

        return view('livewire.admin.products', [
            'products'   => $products,
            'categories' => $categories,
        ]);
    }
}
