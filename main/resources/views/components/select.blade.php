@props(['name', 'label', 'options', 'required'])

<div class="flex flex-col items-center mt-4">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select class="form-select" id="{{ $name }}" name="{{ $name }}" {{ $required ? 'required' : '' }}>
        <option value="">Select {{ $label }}</option>
        @foreach ($options as $value)
            <option value="{{ $value }}">{{ $value }}</option>
        @endforeach
    </select>
</div>
