@props(['model', 'placeholder' => '', 'required' => false])

<div>
    <label for="{{$slot}}" class="block text-sm font-medium text-gray-700">
        {{ $slot }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="mt-1 relative rounded-md shadow-sm">
      <input wire:model.debounce.150ms="{{$model}}" class="block w-full pr-10 focus:outline-none sm:text-sm rounded-md" placeholder="{{ $placeholder ? $placeholder : $slot }}" aria-invalid="true" aria-describedby="{{$model}}" {{$attributes}}>
    </div>
    <p class="mt-2 text-sm text-red-600" id="{{$model}}">
        @error($model)
            {{ $message }}
        @enderror
    </p>
</div>