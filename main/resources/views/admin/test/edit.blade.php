<x-admin>
    <form action="{{ route('test.update') }}" method="post" onsubmit="esvent.preventDefault();">
        @csrf
        <x-input name="name" label="Test Name" :placeholder="'Enter test name'" value="{{ $test->name }}" />
        <x-input name="price" label="Test Price" :placeholder="'Enter test price'" value="{{ $test->price }}" />
        <input type="hidden" name="id" value="{{ $test->id }}">
        <label class='font-semibold' for="description"> Enter Description (This will be shown in the
            package Description on
            everywhere)</label>
        <textarea class="w-full" name="description" label="Test Description" value=""
            placeholder="'Enter test description'">{{ $test->description }}</textarea>
        <label for="parameters" class='mb-6'>Select Parameters <br></label>
        <style>
            .multiselect-dropdown {
                padding: 6px;
                margin-top: 10px;
                margin-bottom: 10px;
                border: 1px solid #000;
                border-radius: 5px;
            }

            input .multiselect-dropdown-search .form-control {
                padding: 15px;
            }
        </style>

        <select class="p-2 my-2" aria-placeholder="Select Parameters" placeholder="Select Parameters" id="parameters"
            name="parameters[]" multiple multiselect-search="true">
            @foreach ($testParameter as $parameter)
                <option value="{{ $parameter['id'] }}" selected>{{ $parameter['name'] }}</option>
            @endforeach
            @foreach ($parameters as $parameter)
                <option value="{{ $parameter->id }}">{{ $parameter->name }}</option>
            @endforeach
        </select>
        <h2 class="text-xl font-semibold text-black mb-2">Currently Selected Parameters</h2>
        {{-- <small>Note: Please select all the parameter for this test.*</small> --}}
        <ul class="list-disc list-inside">
            @foreach ($testParameter as $parameter)
                <li class="bg-blue-300 p-4 m-4 list-unstyled">{{ $parameter->name }}</li>
            @endforeach
        </ul>
        <br>
        <button class='bg-blue-500 p-2 my-2 rounded-md text-white'>Update Test</button>
    </form>
</x-admin>
