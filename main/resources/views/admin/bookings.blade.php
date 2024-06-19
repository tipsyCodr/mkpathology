<x-admin>
    <div class='wrapper'>
        <div class="mt-4">
            <h1 class="font-semibold text-4xl text-gray-800 leading-tight">All Bookings</h1>
            <ul class="mt-2">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Test/Package</th>
                            <th>Date</th>
                            <th>Slot</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ dd($bookings) }} --}}
                        @foreach ($bookings as $booking)
                            <tr class="border-b border-gray-200">
                                <td class="p-2 ">{{ $booking['patient'] }}</td>
                                <td class="p-2  text-center">
                                    {{ isset($booking['package']) ? $booking['package'] : $booking['test'] }}</td>

                                <td class="p-2  text-center">{{ $booking['date'] }}</td>
                                <td class="p-2  text-center">{{ $booking['slot'] }}</td>
                                <td class="p-2  text-center">{{ $booking['type'] }}</td>
                                <td class="p-2  text-center">
                                    <span
                                        class="px-2 py-1 rounded-md {{ $booking['status_classes'] }}">{{ $booking['status'] }}</span>
                                </td>
                                <td class='p-2 px-4'>
                                    <a href="#"
                                        class="bg-green-400 text-white p-2 mx-1 hover:bg-green-500  inline-block my-1"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg></a>
                                    <a href="#"
                                        class="bg-orange-400 text-white p-2 mx-1 hover:bg-orange-500 inline-block my-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </a>
                                    <a href="#"
                                        class="bg-red-400 text-white p-2 mx-1 hover:bg-red-500 inline-block my-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </ul>
        </div>
    </div>

</x-admin>
