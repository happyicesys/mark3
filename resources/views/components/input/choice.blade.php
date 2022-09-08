<div
    x-data="{
        model: @entangle($attributes->wire('model')),
    }"
    x-init="
        select2 = new Choices($refs.select, {
                position: 'bottom',
                searchPlaceholderValue: '{{__('Search...')}}',
                shouldSort: false,
                itemSelectText: '',
            })
        $refs.select.addEventListener('change', (event)=>{
            if (event.target.hasAttribute('multiple')){
                model = Array.from(event.target.options).filter(option => option.selected).map(option => option.value);
            }else{
                model = event.target.value;
            }
        });
    "
    wire:ignore
>
    <select x-ref="select" {{ $attributes->merge(['class' => '']) }}>
        {{ $slot }}
    </select>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"/>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    @endpush
</div>