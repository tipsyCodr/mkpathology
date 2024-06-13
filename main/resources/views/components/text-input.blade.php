@props(['name', 'label', 'placeholder' => null, 'value' => null, 'required' => false])

@if (isset($name))
    <div class="mb-4">
        <input id="{{ $name }}" name="{{ $name }}" type="text" placeholder="{{ $placeholder }}"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            value="{{ $value }}" required>
    </div>
@endif
