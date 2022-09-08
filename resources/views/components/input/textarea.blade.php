@props(['model', 'rows' => 4])

<div>
    <label for="{{ $model }}" class="block text-sm font-medium text-gray-700">
        {{ $slot }}
    </label>
    <div class="mt-1">
      <textarea rows="{{ $rows }}" wire:model.debounce.300ms="{{ $model }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
    </div>
</div>