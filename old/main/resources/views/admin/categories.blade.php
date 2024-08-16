<x-admin>
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <h1 class="text-2xl font-bold text-gray-800">Categories</h1>
            @if (auth()->user()->hasRole('admin'))
                <button id='create' popovertarget="categoryAdd"
                    class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Create Category</button>
            @endif
        </div>

        <div popover id="categoryAdd" class="rounded-lg shadow-md bg-white dark:bg-gray-800 dark:border-gray-700">
            <div
                class="flex flex-row justify-between p-4 bg-gray-50 dark:bg-gray-900 border-b rounded-t dark:border-gray-700">
                <h1 class='font-2xl font-bold text-gray-900 dark:text-white my-2'>Add Categories</h1>

                <button popovertarget="categoryAdd" popovertargetaction='hide '
                    class=" text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-2 rounded border text-right">
                <form class="p-2" action="{{ route('category.create') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <button type="submit" class="right-4 button rounded bg-blue-500 p-2 text-white">Submit</button>
                </form>
            </div>
        </div>




        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories ?? [] as $category)
                    <tr>
                        <td class="border px-4 py-2">{{ $category->id ?? '' }}</td>
                        <td class="border px-4 py-2">{{ $category->name ?? '' }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ $category ? route('category.destroy', $category->id) : '' }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ $category ? route('category.edit', $category->id) : '' }}"
                                    class="px-4 py-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">Edit</a>
                                <button type="submit"
                                    class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-admin>
