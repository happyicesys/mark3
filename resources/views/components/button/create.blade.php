<x-button {{ $attributes->merge(['class' => 'bg-green-400 hover:bg-green-500 active:bg-green-600']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span class="pl-1">
        {{ $slot }}
    </span>
</x-button>