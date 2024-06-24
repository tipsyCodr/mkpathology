<x-admin>
    <style>
        .package-book {
            display: flex;
            flex-direction: row;
            width: 100%;
        }

        form {
            border: none;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        input,
        select {
            border: 2px solid black;
            border-radius: 5px;
            padding: 5px;
            margin: 1px 10px;
        }
    </style>
    <h1 class="text-2xl font-semibold text-gray-900">
        New Booking
    </h1>
    <x-book-form />

    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Bookings History</h2>
    </div>

    @if ($bookings->count() > 0)
        <table class="w-full mt-4 bg-white rounded-lg shadow-md">
            <thead class="bg-gray-50 border-b">
                <tr class="text-left">
                    <th class="py-2 px-4">Test Name</th>
                    <th class="py-2 px-4">Status</th>
                    <th class="py-2 px-4">Date</th>
                    <th class="py-2 px-4">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($bookings as $booking)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4">{{ $booking['title'] }}</td>
                        <td class="py-2 px-4"><span
                                class="px-2 py-1 rounded-md {{ $booking['status_classes'] }}">{{ $booking['status'] }}</span>
                        </td>
                        <td class="py-2 px-4">{{ $booking['date'] }}</td>
                        <td class="py-2 px-4">
                            @if ($booking['status'] !== 'Cancelled')
                                <form class="m-0" action="{{ route('package.cancel') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $booking['id'] }}">
                                    <input type="hidden" name="type" value="{{ $booking['type'] }}">

                                    <button type="submit"
                                        class="bg-red-500 text-white p-2 rounded text-red-500 hover:text-red-700">Cancel</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="mt-4 text-center text-gray-600">No bookings found.</p>
    @endif



</x-admin>
