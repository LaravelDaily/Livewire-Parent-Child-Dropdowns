<div>
    <form wire:submit.prevent="submit">
        <div>
            <label class="block text-sm font-medium text-gray-700" for="category"> Category* </label>
            <select wire:model="category" name="category"
                    class="mt-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                <option value="">-- choose category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700" for="product"> Product* </label>
            <select wire:model="product" name="product"
                    class="mt-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                @if($products->isEmpty())
                    <option value="">-- choose category first --</option>
                @endif
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <x-primary-button class="mt-4">
            Submit
        </x-primary-button>
    </form>
</div>