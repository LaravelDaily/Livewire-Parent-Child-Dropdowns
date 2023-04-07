<?php

namespace App\Http\Livewire;

use App\Models\Size;
use App\Models\Order;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class CreateOrder extends Component
{
    public ?int $category = null;

    public ?int $product = null;

    public ?int $size = null;

    public Collection $categories;

    public Collection $products;

    public Collection $sizes;

    public function mount(): void
    {
        $this->categories = Category::all();
        $this->products = collect();
        $this->sizes = collect();
    }

    public function updatedCategory(int $value): void
    {
        $this->sizes = collect();
        $this->reset('size', 'product');

        $this->products = Product::where('category_id', $value)->get();
    }

    public function updatedProduct(int $value): void
    {
        if (! is_null($value)) {
            $this->sizes = Size::where('product_id', $value)->get();
            $this->size = $this->sizes->first()->id ?? null;
        }
    }

    public function submit()
    {
        // Do validation
        Order::create([
            'product_id' => $this->product,
            'size_id' => $this->size,
        ]);
        // Other related things for creation process and redirect
    }

    public function render(): View
    {
        return view('livewire.create-order');
    }
}
