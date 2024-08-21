<x-admin>
    <?php $reports = []; ?>
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center items-center my-4">
            <h2 class="text-2xl font-bold">All Reports</h2>
        </div>
        <div class="wrapper">
            Pending Tests: {{ App\Models\PackageBooking::where('status', 'pending')->count() }} |
            Booked Tests: {{ App\Models\PackageBooking::where('status', 'booked')->count() }} |
            Completed Tests: {{ App\Models\PackageBooking::where('status', 'completed')->count() }}
        </div>

        <div class="wrapper my-8">
            <h2 class='my-6 font-bold text-4xl'>All Packages Bookings</h2>
            @if (count($confirmedPackageBookings) > 0)
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-orange-500 text-white">
                            <th class="py-2 px-4">Patient Name</th>
                            <th class="py-2 px-4">Package Name</th>
                            <th class="py-2 px-4">Booking Date</th>
                            <th class="py-2 px-4">Action</th>
                            <th class="py-2 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($confirmedPackageBookings as $packageBooking)
                            @if ($packageBooking['user_name'] !== null && $packageBooking['package_name'] !== null)
                                <tr class="border-b border-gray-200">
                                    <td class="py-2 px-4">{{ $packageBooking['user_name'] }}</td>
                                    <td class="py-2 px-4">{{ $packageBooking['package_name'] }}</td>
                                    <td>{{ $packageBooking['booking_date'] }}</td>
                                    <td class="py-2 px-4 flex flex-row justify-center">
                                        <form action="{{ route('admin.report.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" id="user_id"
                                                value="{{ $packageBooking['user_id'] }}">
                                            <input type="hidden" name="user_name" id="user_name"
                                                value="{{ $packageBooking['user_name'] }}">
                                            <input type="hidden" name="package_name" id="package_name"
                                                value="{{ $packageBooking['package_name'] }}">
                                            <input class='bg-red-500 text-white p-2 rounded' type="submit"
                                                value="Upload">
                                        </form>
                                        {{-- <a class="rounded p-2 bg-red-500 text-white"
                                            href="{{ route('admin.report.add') }}">Upload Report</a> --}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center my-4">
                    <h3 class='font-bold text-gray-600 text-2xl'>No bookings yet...</h3>
                </div>
            @endif


            <h2 class='my-6 font-bold text-4xl'>All Tests Bookings</h2>
            @if (count($confirmedTestBookings) > 0)
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-orange-500 text-white">
                            <th class="py-2 px-4">Patient Name</th>
                            <th class="py-2 px-4">Test Name</th>
                            <th class="py-2 px-4">Booking Date</th>
                            <th class="py-2 px-4">Action</th>
                            <th class="py-2 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($confirmedTestBookings as $testBooking)
                            @if ($testBooking['user_name'] !== null && $testBooking['test_name'] !== null)
                                <tr class="border-b border-gray-200">
                                    <td class="py-2 px-4">{{ $testBooking['user_name'] }}</td>
                                    <td class="py-2 px-4">{{ $testBooking['test_name'] }}</td>
                                    <td>{{ $testBooking['booking_date'] }}</td>
                                    <td class="py-2 px-4 flex flex-row justify-center">
                                        <form action="post" method="POST" enctype="multipart/form-data"
                                            class="flex items-center space-x-2">
                                            @csrf
                                            <input type="file" name="reports[]" id="reports" multiple required
                                                class="hidden">
                                            <label for="reports"
                                                class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Upload</label>
                                            <input type="hidden" name="user_id" id="user_id">
                                        </form>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center my-4">
                    <h3 class='font-bold text-gray-600 text-2xl'>No bookings yet...</h3>
                </div>
            @endif





        </div>
</x-admin>
