<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class CategoryProduct extends Component
{
    public ?int $category = null;

    public ?int $product = null;

    public Collection $categories;

    public Collection $products;

    public function mount(): void
    {
        $this->categories = Category::all();
        $this->products = collect();
    }

    public function updatedCategory($value): void
    {
        $this->products = Product::where('category_id', $value)->get();
        $this->product = $this->products->first()->id ?? null;
    }

    public function submit()
    {
        // Do validation
        Order::create(['product_id' => $this->product]);
        // Other related things for creation process and redirect
    }

    public function render(): View
    {
        return view('livewire.category-product');
    }
}
