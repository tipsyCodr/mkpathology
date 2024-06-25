<x-admin>
    <div class="flex   h-screen">
        <div class="w-full max-w-sm">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <form action="{{ route('prescription.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="prescription">Upload Prescription</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="prescription" type="text" name="prescription-name" required>
                        @error('prescription')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="prescription">Upload Prescription</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="prescription" type="file" name="prescription" required>
                        @error('prescription')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Upload
                        </button>
                    </div>
                </form>
            </div>

            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold mb-4">Your Prescriptions</h1>
            </div>
            <div class="w-full max-w-sm">
                @foreach (auth()->user()->prescriptions as $prescription)
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <p>{{ $prescription->name }}</p>
                        <img src="{{ asset('storage/uploads/prescriptions/' . $prescription->prescription) }}"
                            alt="">
                        <form action="{{ route('prescription.destroy', $prescription->id) }}" method="POST"
                            class="mr-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Delete
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>



        </div>
    </div>

</x-admin>
