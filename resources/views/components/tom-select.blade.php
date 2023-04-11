<div wire:ignore>
    <select
            x-data="{ tomSelect: null, options: @entangle($attributes['options']), selectValue: @entangle($attributes->whereStartsWith('wire:model')->first()) }"
            x-init="tomSelect = new TomSelect($refs.select, {
                options: options,
                items: selectValue,
                valueField: 'value',
		        labelField: 'label'
            })
            $watch('options', () => {
                if (tomSelect !== null) {
                    tomSelect.clearOptions()
                    tomSelect.addOptions(options)
                    tomSelect.settings.placeholder = '-- SELECT --'
                    tomSelect.inputState()
                }
            })
            $watch('selectValue', (newValue) => {
                if (newValue === null && tomSelect !== null) {
                    tomSelect.clear(true);
                }
            })"
            x-ref="select"
            x-cloak
            {{ $attributes }}>
    </select>
</div>
