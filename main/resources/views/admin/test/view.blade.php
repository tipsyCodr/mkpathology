<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test View') }}
        </h2>
    </x-slot>
    <?php
    // $tests = [(object) ['name' => 'name1', 'price' => 'price1', 'description' => 'description1'], (object) ['name' => 'name2', 'price' => 'price2', 'description' => 'description2']];
    ?>
    @if (session('success'))
        <div class="bg-green-300 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-green-300 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-hidden shadow-md sm:rounded-lg">
                <div class="add mt-4 border-t pt-5">
                    <h2 class="text-xl font-semibold text-black mb-2">Add new test</h2>
                    <form action="{{ route('test.store') }}" method="post" onsubmit="esvent.preventDefault();">
                        @csrf
                        <x-input name="name" label="Test Name" :placeholder="'Enter test name'" />
                        <x-input name="price" label="Test Price" :placeholder="'Enter test price'" />
                        <label class='font-semibold' for="description"> Enter Description (This will be shown in the
                            package Description on
                            everywhere)</label>
                        <textarea class="w-full" name="description" label="Test Description" placeholder="'Enter test description'"></textarea>
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
                        <Select class="p-2 my-2" aria-placeholder="Select Parameters" placeholder="Select Parameters"
                            id="parameters" name="parameters[]" multiple multiselect-search="true">
                            @foreach ($parameters as $parameter)
                                <option value="{{ $parameter->id }}">{{ $parameter->name }}</option>
                            @endforeach
                        </Select>
                        <br>
                        <button class='bg-blue-500 p-2 my-2 rounded-md text-white'>Add Tests</button>
                    </form>
                </div>
                <h1 class="font-semibold text-4xl text-gray-800 leading-tight mb-4">All Added Tests</h1>
                <div class='my-4'>


                </div>
                <div class="table-responsive pb-5">
                    <table class="dynamic-table w-full">
                        <thead>
                            <tr>
                                <th id="cell" class="border border-gray-400 px-4 py-2">Test</th>
                                <th class="border border-gray-400 px-4 py-2">Price</th>
                                <th class="border border-gray-400 px-4 py-2">Description</th>
                                <th class="border border-gray-400 px-4 py-2" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tests as $test)
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2">{{ $test->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $test->price }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $test->description }}</td>
                                    <td class="border border-gray-400 px-4 py-2"><a class="p-2 rounded bg-green-400"
                                            href="{{ route('test.edit', $test->id) }}"> Edit </a></td>

                                    <td class="border border-gray-400 px-4 py-2">
                                        <form action="{{ route('test.destroy', $test->id) }}" method="post">
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-500 text-white p-2 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>

</x-admin>
