<x-admin>

    <div class="flex">
        <section class="w-1/2 pr-4">
            <h1 class="text-4xl font-semibold"> Book Tests for {{ $user->name }}</h1>
            <form action="{{ route('test.book.for') }}" method="post" class="mt-8 flex flex-col w-full">
                @csrf
                <div class="flex flex-col space-y-4">
                    <input type="hidden" name="user_id" value="{{ $prescription->user_id }}">
                    <select name="test_id" id="test_id" class="border border-gray-300 rounded-md" required>
                        <option value="">Select A Test</option>
                        @foreach ($tests as $test)
                            <option value="{{ $test->id }}">{{ $test->name }}</option>
                        @endforeach
                    </select>
                    <input type="date" name="booking_date" id="booking_date"
                        class="border border-gray-300 rounded-md" required>
                    <select name="slot" id="slot" class="border border-gray-300 rounded-md" required>
                        <option value="">Select A Slot</option>
                        <option value="morning">Morning</option>
                        <option value="afternoon">Afternoon</option>
                        <option value="evening">Evening</option>
                    </select>
                    <label for="status" class="flex items-center space-x-2">
                        <input type="checkbox" name="status" id="status" class="border border-gray-300 rounded-md"
                            value="1" checked>
                        <span>Confirm Immediately</span>
                    </label>
                </div>
                <button type="submit"
                    class="mt-4 px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md hover:bg-amber-600">Book
                    Now</button>
            </form>
        </section>

        <div class="w-1/2 pl-4">
            <div class="flex flex-col items-center mb-8">
                <h1 class="text-4xl font-semibold">{{ $user->name }}'s Prescription</h1>
                <div class="flex items-center justify-evenly mt-4">
                    <div class="flex flex-col items-start mx-4">
                        <p class="text-base font-semibold">Email</p>
                        <p class="text-base">{{ $user->email }}</p>
                    </div>
                    <div class="flex flex-col items-start mx-4">
                        <p class="text-base font-semibold"><i class="bi bi-telephone-fill text-xl mr-2"></i> Mobile</p>
                        <p class="text-base">{{ $user->mobile }}</p>
                    </div>
                </div>
                <br>
                <a target="_blank" href="{{ asset('storage/uploads/prescriptions/' . $prescription->prescription) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Download Prescription
                </a>
            </div>
            <h2 class="text-xl text-center"> Preview </h2>
            <div class="flex justify-center">
                <div class="w-full max-w-md mb-4">
                    <img src="{{ asset('storage/uploads/prescriptions/' . $prescription->prescription) }}"
                        alt="Prescription" class="mx-auto w-full rounded-lg object-cover">
                </div>
            </div>
        </div>
    </div>
    <ul>
        {{-- @foreach (Storage::files('public/uploads') as $file)
            <li>{{ $file }}</li>
        @endforeach
        {{ Storage::files('public/uploads') }} --}}
    </ul>

</x-admin>
