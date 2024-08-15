@props(['name', 'label', 'required' => false])

<div class="mb-4">
    <label for="{{ isset($name) ? $name : 'id' }}" class="text-sm font-medium text-gray-900 dark:text-gray-300">
        {{ isset($label) ? $label : '' }}
        @if ($required)
            <span class="text-red-500">*</span>
        @endif
    </label>

</div>
