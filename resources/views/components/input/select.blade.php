@props(['model', 'required' => false])
<div>
    <label for="{{ $label }}" class="block text-sm font-medium text-gray-700">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div wire:ignore class="pt-1">
        <select data-pharaonic="select2" wire:model="{{ $model }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" data-component-id="{{ $this->id }}" {{ $attributes }}>
            {{ $slot }}
        </select>
    </div>
    <p class="mt-2 text-sm text-red-600" id="{{$model}}">
        @error($model)
            {{ $message }}
        @enderror
    </p>
</div>

@push('styles')
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css">
@endpush

@push('scripts')
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <x:pharaonic-select2::scripts />
@endpush

