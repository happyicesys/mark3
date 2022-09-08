<div
    x-data="{
        model: @entangle($attributes->wire('model')),
    }"
    x-init="
        select2 = $($refs.select)
            .not('.select2-hidden-accessible')
            .select2({
                placeholder: 'Select...',
                dropdownAutoWidth: true,
                width: '100%',
                minimumResultsForSearch: 10,
            });
        select2.on('select2:select', (event) => {
            if (event.target.hasAttribute('multiple')) { model = Array.from(event.target.options).filter(option => option.selected).map(option => option.value); } else { model = event.params.data.id }
        });
        select2.on('select2:unselect', (event) => {
            model = Array.from(event.target.options).filter(option => option.selected).map(option => option.value);
        });
        $watch('model', (value) => {
            select2.val(value).trigger('change');
        });
    "
    wire:ignore
>
    <select x-ref="select" {{ $attributes->merge(['class' => 'form-control']) }}>
        {{ $slot }}
    </select>


    @push('styles')
        <!-- Select2 -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css"> --}}
    @endpush

    @push('scripts')
        <!-- Select2 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @endpush
</div>