<div class="mb-2">
    @if ($errors->has($attributes->get('name')))
        <span class="text-xs text-red-500">
            {{ $errors->first($attributes->get('name')) }}
        </span>
    @endif
</div>
