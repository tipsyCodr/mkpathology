<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Package View') }}
        </h2>
    </x-slot>
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

                <div class="add mt-4 border-t py-5 ">
                    <h2 class="text-xl font-semibold text-black mb-2">Add new package</h2>
                    @if ($errors->any())
                        <div class="bg-red-200 border-l-4 border-red-500 p-4 mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('package.store') }}" method="post">
                        @csrf
                        <x-input name="name" label="Package Name" :placeholder="'Enter package name'" />
                        <x-input name="price" :type="'number'" :pattern="'\d*'" inputmode="numeric"
                            label="Package Price" :placeholder="'Enter package price'" />
                        {{-- <x-input name="image" type="file" label="Package Image" accept="image/*" /> --}}

                        <div>
                            <h3>Available Tests</h3>
                            <select name="tests[]" aria-placeholder="Select Tests" placeholder="Select Tests"
                                id="tests" multiple multiselect-search="true">
                                @foreach ($tests as $test)
                                    <option value="{{ $test->id }}">{{ $test->name }}</option>
                                @endforeach
                            </select>


                            <script>
                                // Array to store all tests
                                let tests = [];
                                @foreach ($tests as $test)
                                    tests.push({
                                        id: "{{ $test->id }}",
                                        name: "{{ $test->name }}"
                                    });
                                @endforeach

                                // Get search input and test wrapper elements
                                let searchInput = document.getElementById('searchInput');
                                var testWrapper = document.getElementById('showTests');

                                // Function to search and display tests
                                function searchTests() {
                                    if (!tests.length) {
                                        testWrapper.innerHTML = '<h1>No Tests Found</h1>';
                                        return;
                                    }

                                    const searchText = searchInput.value.toLowerCase();
                                    const matchingTests = tests.filter(test => test.name.toLowerCase().includes(searchText));

                                    if (matchingTests.length) {
                                        testWrapper.innerHTML = matchingTests.map(test =>
                                            `<label for="test${test.id}" class="inline-block bg-blue-400 text-white px-4 py-2 mx-1 my-1 rounded-xl hover:bg-blue-600 cursor-pointer">
                                                    <input class="mr-2" type="checkbox" value="${test.id}" name="tests[]" id="test${test.id}">
                                                    ${test.name}
                                                </label>`
                                        ).join('');
                                    } else {
                                        testWrapper.innerHTML = '<h1>No Tests Found</h1>';
                                    }
                                }

                                // Initial display of all tests
                                // searchTests();
                            </script>

                        </div>
                        <x-input name="description" label="Package Description" type="textarea" :placeholder="'Enter package description'" />
                        <button class='bg-blue-500 p-2 rounded-md text-white'>Add Package</button>
                    </form>


                </div>

                <h1 class="font-semibold text-4xl text-gray-800 leading-tight mb-4">All Added Packages</h1>
                <div class="table-responsive pb-5">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="border border-gray-400 px-4 py-2">Package</th>
                                <th class="border border-gray-400 px-4 py-2">Price</th>
                                <th class="border border-gray-400 px-4 py-2">Tests</th>
                                <th class="border border-gray-400 px-4 py-2">Description</th>
                                <th class="border border-gray-400 px-4 py-2" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $package)
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2">{{ $package->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $package->price }}</td>
                                    <td class="border border-gray-400 px-4 py-2">
                                        <?php
                                        if (is_null($package)) {
                                            $package = []; // Initialize $items as an empty array if it's null
                                        }
                                        ?>
                                        @foreach (json_decode($package->test_id) as $testId)
                                            @php
                                                $test = App\Models\Test::find($testId);
                                            @endphp
                                            @if ($test)
                                                <span
                                                    class="bg-yellow-200 text-sm rounded px-2 py-1 mr-1">{{ $test->name }}</span>
                                            @else
                                                <span class="bg-red-200 text-sm rounded px-2 py-1 mr-1">Unknown
                                                    Test</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $package->description }}</td>
                                    <td class="border border-gray-400 px-4 py-2"><a class="p-2 rounded bg-green-400"
                                            href="{{ route('package.edit', $package->id) }}"> Edit </a></td>
                                    <td class="border border-gray-400 px-4 py-2">
                                        <form action="{{ route('package.destroy', $package->id) }}" method="post">
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
                {{ $packages->links() }}
            </div>
        </div>
    </div>
</x-admin>
