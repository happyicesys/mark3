<div
    x-data="{isVisible: false}"
    @click.away="isVisible = false"
    class="bg-gray-100 p-4 rounded"
>
    <label for="Address" class="flex text-sm font-medium text-gray-700">
        <div>
            Search Address
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div wire:loading style="border-top-color:transparent" class="ml-1 w-5 h-5 border-4 border-blue-600 border-solid rounded-full animate-spin"></div>
    </label>
    <div class="mt-1 relative rounded-md shadow-sm">
      <input
        type="text"
        wire:model.debounce.300ms="filterAddress"
        class="block w-full pr-10 focus:outline-none sm:text-sm rounded-md"
        placeholder="Postcode"
        aria-invalid="true"
        @focus="isVisible = true"
        @keydown="isVisible = true"
        @keydown.escape.window = "isVisible = false"
        >
    </div>
    <div class="absolute z-50 bg-gray-200 text-xs rounded w-96 mt-1" x-show="isVisible">
        <ul class="overflow-scroll">
            @if(count($results))
                @foreach($results as $resultIndex => $result)
                    <li class="border-b border-gray-100">
                        <a href="#" @click="isVisible = false" wire:click.prevent="resultSelected({{ $resultIndex }})" class="block hover:bg-gray-100 px-3 py-3 items-center transition ease-in-out duration-150">
                            {{ $result['ADDRESS'] }}
                        </a>
                    </li>
                @endforeach
            @endif

        </ul>
    </div>
</div>
