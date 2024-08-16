<select name="{{ $name }}" id="{{ $name }}" class="form-select mt-4 mb-4" required>
    @foreach ($options as $option)
        <option value="{{ $option }}" class="text-black">{{ $option }}</option>
    @endforeach
</select>
