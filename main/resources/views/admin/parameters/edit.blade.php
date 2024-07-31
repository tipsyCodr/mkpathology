<x-admin>
    {{ $parameter }}
    <form action="{{ route('parameters.update', $parameter->id) }}" method="POST">
        @csrf
        @method('PUT')
        <x-input name="name" label="Parameter Name" :placeholder="'Enter parameter name'" :value="$parameter->name" />
        <x-input name="unit" label="Parameter Unit" :placeholder="'Enter parameter unit'" :value="$parameter->unit" />
        <x-input name="normal_range" label="Parameter Normal Range" :placeholder="'Enter parameter normal range'" :value="$parameter->normal_range" />
        {{-- <x-input name="is_active" type="hidden" :value="$parameter->is_active" /> --}}
        <label for="is_active">Status</label><br>
        <select name="is_active" id="is_active">
            <option value="">Select</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
        <br>
        <button class='bg-blue-500 p-2 my-4 rounded-md text-white'>Update Parameter</button>
    </form>
</x-admin>
