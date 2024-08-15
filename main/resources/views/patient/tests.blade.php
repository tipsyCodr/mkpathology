<x-admin>
    <div class="mb-4">
        <form action="{{ route('patient.tests.view') }}">
            <input type="text" class="form-input border border-gray-500 p-2 rounded w-full" name='search'
                value="{{ request()->query('search') ?? old('search') }}" placeholder="Search...">
        </form>
    </div>
    <div id="tests" class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($tests as $test)
            @if (str_contains(strtolower($test->name), strtolower($search ?? '')))
                <div class="bg-white shadow-md rounded p-4">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-lg font-medium text-gray-900">
                                {{ $test->name }}
                            </div>
                            <div class="text-sm text-gray-500">Rs.{{ $test->price }}/-</div>
                        </div>
                    </div>
                    <div class="mt-4">

                        <button data-modal-target="booking-modal-{{ $test->id }}"
                            data-modal-toggle="booking-modal-{{ $test->id }}"
                            class="bg-orange-500 rounded p-2 mt-10 text-white hover:bg-orange-700 text-center focus:ring-4 focus:outline-none focus:ring-orange-300"
                            type="button">
                            Book
                        </button>

                        <x-book-modal :test="$test" />
                    </div>
            @endif
        @endforeach
    </div>
</x-admin>
