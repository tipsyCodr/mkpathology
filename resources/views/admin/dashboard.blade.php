<x-admin>
    <style>
        .wrapper {
            margin-left: 20px;
            margin-right: 20px;
        }

        @media (max-width: 768px) {
            .wrapper {
                margin-left: 0;
                margin-right: 0;
            }
        }
    </style>
    <div class="p-3 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
        <div class="text-4xl font-bold text-sky-900">
            Dashboard
        </div>
        @php
            $counts = [
                'tests' => \App\Models\Test::count(),
                'packages' => \App\Models\Package::count(),
                'patients' => \App\Models\Patient::count(),
                'bookings' => \App\Models\PackageBooking::count(),
            ];
        @endphp
        <div class="flex flex-wrap -mx-3 mt-3">
            @foreach ($counts as $key => $count)
                <div class="w-full sm:w-1/2 md:w-1/3 px-3 mb-4">
                    <div class="bg-white p-4 shadow rounded-lg">
                        <div class="text-base font-medium text-gray-900">{{ ucfirst($key) }}</div>
                        <div class="text-xl font-semibold text-sky-700">{{ $count }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class='wrapper'>
        <div class="mt-4">
            <h1 class="font-semibold text-4xl text-gray-800 leading-tight">Latest Bookings</h1>
            <div class="flex justify-end mt-2">

                <span>
                    <a class="bg-green-400 text-white p-2 mx-1 hover:bg-green-500 inline-block my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </a>
                    Approve Booking Slot
                </span>
                <span>
                    <a class="bg-orange-400 text-white p-2 mx-1 hover:bg-orange-500 inline-block my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                    Reschedule Booking Slot
                </span><span>
                    <a class="bg-red-400 text-white p-2 mx-1 hover:bg-red-500 inline-block my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                    Cancel Booking Slot
                </span>

            </div>
            <div class="mt-2 overflow-y-auto shadow-md sm:rounded-lg">
                <table class="table-auto w-full">
                    <thead class="bg-gray-900 text-white">
                        <tr>
                            <th class="px-4 py-2">Patient</th>
                            <th class="px-4 py-2">Package</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Slot</th>
                            <th class="px-4 py-2">Type</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                        {{-- @dd($bookings) --}}
                    </thead>
                    <tbody>
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
                                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"s
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

                                    <div popover id="myheader{{ $booking['id'] }}"
                                        class="bg-gray-800 p-2 mr-10 ight-2">
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
                                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
