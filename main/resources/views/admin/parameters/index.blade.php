<x-admin>
    <h1 class="text-4xl">Parameters</h1>

    <div class="">
        {{-- Add Parameter form --}}
        <button class='rounded bg-blue-500 p-2 text-white mx-0 my-4' popovertarget="parameterForm"> Add Parameter</button>
        <div popover id="parameterForm"
            class=" shadow-sm border border-gray-200 p-8 w-auto mx-10 mt-10 lg:w-1/2 lg:ml-[400px] h-screen">


            <div class="flex justify-end">
                <button type="button" popovertarget="parameterForm" popovertargetaction='hide '
                    class="text-gray-400 hover:text-gray-900 hover:bg-gray-100 p-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <h2 class="text-xl font-semibold text-black mb-2">Add new parameter</h2>




            <form action="{{ route('parameters.store') }}" method="post" class=''>
                @csrf
                <div class="mb-4">
                    <x-input name="name" label="Parameter Name" :placeholder="'Enter parameter name'" />
                </div>
                <div class="mb-4">
                    <x-input name="unit" label="Parameter Unit" :placeholder="'Enter parameter unit'" />
                </div>
                <div class="mb-4">
                    <x-input name="normal_range" label="Parameter Normal Range" :placeholder="'Enter parameter normal range'" />
                </div>
                <div class="mb-4">
                    <div class="mb-4">

                        <label for="is_active" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                        <select id="is_active" name="is_active"
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <button class='bg-blue-500 p-2 rounded-md text-white'>Add Parameter</button>
            </form>
        </div>
        <div class="my-4 border-t pt-5">
            <h2 class="text-xl font-semibold text-black">Import from excel</h2>
            <form class="my-6" action="{{ route('parameters.import.do') }}"
                onsubmit="confirm('Do You want to import ?')" method="POST" enctype="multipart/form-data"
                onsubmit="return checkExcelFile()">
                @csrf
                <input type="file" name="file" id="fileInput">
                <button class="bg-green-500 p-2  text-white rounded" type="submit">Import</button>
                <script>
                    function checkExcelFile() {
                        var fileInput = document.getElementById('fileInput');
                        var filePath = fileInput.value;
                        var allowedExtensions = /(\.csv|\.xlsx|\.xls|\.xlsm)$/i;
                        if (!allowedExtensions.exec(filePath)) {
                            alert('Please upload file has .csv, .xlsx, .xls or .xlsm extension.');
                            fileInput.value = '';
                            return false;
                        }
                        return true;
                    }
                </script>
            </form>
        </div>

        @if ($parameters->count() > 0)
            <div class="shadow sm:rounded-lg w-full">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" id="selectAll" name="selectAll" onclick="toggleCheckbox(this)">
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Unit
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Normal Range
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                edit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                delete</th>

                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($parameters as $parameter)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" name="parameterIds[]" value="{{ $parameter->id }}">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $parameter->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $parameter->unit }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $parameter->normal_range }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $parameter->is_active ? 'Active' : 'Inactive' }}
                                </td>
                                <td><a href="{{ route('parameters.edit', $parameter->id) }}" class="text-blue-500">
                                        Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('parameters.delete', $parameter->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No parameters found.</p>
        @endif
    </div>
</x-admin>
