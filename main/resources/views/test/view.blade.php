<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test View') }}
        </h2>
    </x-slot>
    <?php
    // $tests = [(object) ['name' => 'name1', 'price' => 'price1', 'description' => 'description1'], (object) ['name' => 'name2', 'price' => 'price2', 'description' => 'description2']];
    ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-hidden shadow-md sm:rounded-lg">
                <h1 class="font-semibold text-4xl text-gray-800 leading-tight mb-4">All Added Tests</h1>
                <div class="table-responsive pb-5">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="border border-gray-400 px-4 py-2">Test</th>
                                <th class="border border-gray-400 px-4 py-2">Price</th>
                                <th class="border border-gray-400 px-4 py-2">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tests as $test)
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2">{{ $test->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $test->price }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $test->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $tests->links() }}
                <div class="add mt-4 border-t pt-5">
                    <h2 class="text-xl font-semibold text-black mb-2">Add new test</h2>
                    <form action="{{ route('test.store') }}" method="post">
                        @csrf
                        <x-input name="name" label="Test Name" :placeholder="'Enter test name'" />
                        <x-input name="price" label="Test Price" :placeholder="'Enter test price'" />
                        <x-input name="description" label="Test Description" type="textarea" :placeholder="'Enter test description'" />
                        <button class='bg-blue-300 p-2 rounded-md text-white'>Add Tests</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>
