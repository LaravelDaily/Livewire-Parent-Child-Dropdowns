<div
    x-data="{ options: @entangle($attributes['options']), selectValue: @entangle($attributes->whereStartsWith('wire:model')->first()) }"
    x-init="
        VirtualSelect.init({
            ele: $refs.select,
            options: options,
            search: true,
            placeholder: 'Select',
            noOptionsText: 'No results found',
            maxWidth: '100%'
        })
        $refs.select.setValue(selectValue)
        $refs.select.addEventListener('change', () => {
            if ([null, undefined, ''].includes($refs.select.value)) {
                return
            }

            $wire.set('product', $refs.select.value)
        })
        $watch('options', value => $refs.select.setOptions(options))
    ">
    <div x-ref="select" wire:ignore {{ $attributes }}></div>
</div>
