<div>
    <label for="{{ $slot }}" class="block text-sm font-medium text-gray-700">
        {{ $slot }}
    </label>
    <div
    x-data
    x-init="
        new Pikaday({
            field: $refs.input,
            firstDay: 1,
            format: 'YYYY-MM-DD'
        })
    "
    class="flex rounded-md shadow-sm"
    >
        <span class="inline-flex items-center px-3 rounded-1-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </span>
        <input x-ref="input" {{ $attributes }} type="text" class="rounded-none rounded-r-md flex-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
    </div>
</div>

@push('styles')
    <!-- Pikaday -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@endpush

@push('scripts')
    <!-- Moment -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <!-- Pikaday -->
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
@endpush

