<?php

namespace App\Http\Livewire\TomSelect;

use App\Models\Size;
use App\Models\Order;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\Redirector;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class EditTomSelect extends Component
{
    public ?int $category = null;

    public ?int $product = null;

    public ?int $size = null;

    public Collection $categories;

    public array $products = [];

    public Collection $sizes;

    public function mount(Order $order): void
    {
        $this->categories = Category::all();

        $this->order = $order;
        $this->size = $order->size->id;
        $this->category = $order->product->category->id;

        $this->products = Product::where('category_id', $this->category)->get()->map(function ($product) {
            return [
                'label' => $product->name,
                'value' => $product->id,
            ];
        })->toArray();
        $this->product = Arr::flatten(
                Arr::where($this->products, fn($value) => $value['value'] === $this->order->product_id)
            )[1];
        $this->sizes = Size::where('product_id', $this->product)->get();
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
        })->toArray();
        $this->reset('product');
    }

    public function updatedProduct(int $value): void
    {
        if (! is_null($value)) {
            $this->sizes = Size::where('product_id', $value)->get();
            $this->size = $this->sizes->first()->id ?? null;
        }
    }

    public function submit(): Redirector
    {
        // Do validation
        Order::create([
            'product_id' => $this->product,
            'size_id' => $this->size,
        ]);
        // Other related things for creation process and redirect
        return redirect()->route('tom-select.index');
    }

    public function render(): View
    {
        return view('livewire.tom-select.edit-tom-select');
    }
}
