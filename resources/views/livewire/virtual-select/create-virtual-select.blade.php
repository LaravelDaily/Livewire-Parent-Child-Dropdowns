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
            <x-virtual-select id="product" name="product" wire:model="product" options="products" />
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700" for="size"> Size* </label>
            <select wire:model="size" name="size"
                    class="mt-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                @if($sizes->isEmpty())
                    <option value="">-- choose product first --</option>
                @endif
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                @endforeach
            </select>
        </div>

        <x-primary-button class="mt-4">
            Submit
        </x-primary-button>
    </form>
</div>
