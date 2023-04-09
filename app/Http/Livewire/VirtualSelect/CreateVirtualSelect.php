<?php

namespace App\Http\Livewire\VirtualSelect;

use App\Models\Size;
use App\Models\Order;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class CreateVirtualSelect extends Component
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
        $this->sizes = collect();
        $this->products = collect();
    }

    public function updatedCategory(int $value): void
    {
        $this->sizes = collect();
        $this->reset('size', 'product');

        $this->products = Product::where('category_id', $value)->get()->map(function ($product) {
            return [
                'label' => $product->name,
                'value' => $product->id,
            ];
        });
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
        return view('livewire.virtual-select.create-virtual-select');
    }
}
