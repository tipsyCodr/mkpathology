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
                        @php
                            $bookings = $bookings->sortBy([
                                fn($booking1, $booking2) => $booking2['status'] <=> $booking1['status'],
                                'status' => 'SORT_ASC',
                            ]);
                        @endphp

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
                                    <a href="{{ route('confirm.booking', [$booking['id'], strtolower($booking['status']), $booking['type']]) }}"
                                        class="bg-green-400 text-white p-2 mx-1 hover:bg-green-500  inline-block my-1"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg></a>
                                    <button popovertarget="myheader{{ $booking['id'] }}"
                                        class="bg-orange-400 text-white p-2 mx-1 hover:bg   -orange-500 inline-block my-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>

                                    <div popover id="myheader{{ $booking['id'] }}" class="bg-gray-800 p-2 mr-10 ight-2">
                                        <form action="{{ route('reschedule.booking') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="hidden" name="id" value="{{ $booking['id'] }}"
                                                    class="form-control">
                                                <input type="hidden" name="status"
                                                    value="{{ strtolower($booking['status']) }}" class="form-control">
                                                <input type="hidden" name="type"
                                                    value="{{ strtolower($booking['type']) }}" class="form-control">
                                                <input type="date" class="form-control" id="date" name="date"
                                                    required min="{{ now()->toDateString() }}"
                                                    onchange="this.setCustomValidity('')"
                                                    oninput="this.setCustomValidity(this.value < new Date().toISOString().split('T')[0] ? 'Date cannot be in the past!' : '')"
                                                    pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-30)|(?:(?:0[13578]|1[02])-31))"
                                                    title="Enter a date in the format YYYY-MM-DD"
                                                    onkeydown="if(event.key=='Enter'){this.blur()}">
                                                <span id='date-error' class="text-red-500 p-1"></span>
                                            </div>
                                            <div class="mb-3">
                                                <select class="form-select" id="slot" name="slot" required>
                                                    <option value="">Select A Slot</option>
                                                    <option value="morning">Morning (10:00 AM - 12:00 PM)</option>
                                                    <option value="afternoon">Afternoon (12:00 PM - 04:00 PM)</option>
                                                    <option value="evening">Evening (04:00 PM - 08:00 PM)</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <input type="submit" value="Reschedule Booking"
                                                    class="btn rounded bg-orange-400 p-2 text-white">
                                            </div>
                                        </form>
                                    </div>

                                    <form class="m-0 inline" action="{{ route('package.cancel') }}" method="GET">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $booking['id'] }}">
                                        <input type="hidden" name="type" value="{{ $booking['type'] }}">

                                        <button type="submit"
                                            class="bg-red-500 text-white p-2 rounded text-red-500 hover:text-red-700"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if ($bookings instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{ $bookings->links() }}
                        @endif
                    </tbody>
                </table>
            </ul>
        </div>
    </div>
    <script>
        var dateInput = document.getElementById('date');
        var dateError = document.getElementById('date-error');
        if (dateInput) {
            dateInput.addEventListener('input', function(e) {
                var day = new Date(this.value).getDay();

                if (day === 0) {
                    dateError.textContent = 'Not Available';
                } else {
                    dateError.textContent = '';
                }

                this.setCustomValidity(day === 0 ? 'Not Available' : '');
            });
        }
    </script>
</x-admin>
