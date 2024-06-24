<x-admin>
    <div class="container mx-auto">
        <div class="flex flex-col items-center">
            <h1 class="text-2xl font-semibold mb-4">Welcome to your dashboard, {{ auth()->user()->name }}</h1>
            {{-- @dd(auth()->user()->packageBooking) --}}

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="card">
                    <div class="card-header bg-green-200 p-4">
                        Upcoming Bookings
                    </div>
                    <div class="card-body p-4">
                        @php
                            $upcomingBookings = auth()
                                ->user()
                                ->packageBooking()
                                ->where('status', 'pending')
                                ->orWhere(function ($query) {
                                    $query->where('status', 'booked')->whereHas('package', function ($query) {
                                        $query->whereNotNull('name');
                                    });
                                })
                                ->where('user_id', auth()->id())
                                ->latest()
                                ->get();
                        @endphp
                        {{-- @dd($upcomingBookings); --}}
                        @forelse ($upcomingBookings as $booking)
                            <div
                                class="border-b border-gray-200 {{ $booking->status == 'pending' ? 'bg-orange-100' : 'bg-green-100' }} p-4">
                                <p class="mb-2 flex items-center">{{ $booking->package->name ?? '' }} -
                                    {{ $booking->booking_date }} -
                                    {{ $booking->slot }}
                                    <span
                                        class="ml-5 bg-{{ $booking->status == 'pending' ? 'orange-200' : 'green-200' }} px-2 py-1 rounded-md text-{{ $booking->status == 'pending' ? 'orange-800' : 'green-800' }}">{{ $booking->status == 'pending' ? 'Pending' : 'Booked' }}</span>
                                </p>
                            </div>
                        @empty
                            <p class="text-gray-500">No upcoming bookings</p>
                        @endforelse
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-blue-200 p-4">
                        Previous Bookings
                    </div>
                    <div class="card-body p-4">
                        @php
                            $completedBookings = auth()->user()->packageBooking->where('status', 'completed');
                            $cancelledBookings = auth()->user()->packageBooking->where('status', 'cancelled');
                            $bookings = $completedBookings->merge($cancelledBookings);
                        @endphp
                        @foreach ($bookings as $booking)
                            <div class="{{ $loop->index % 2 == 0 ? 'bg-gray-200' : '' }} p-4">
                                <p class="mb-2 flex items-center">
                                    {{ $booking->package->name }} - {{ $booking->booking_date }} -
                                    {{ $booking->slot }}
                                </p>
                            </div>
                        @endforeach
                        @if ($bookings->isEmpty())
                            <p class="text-gray-500">No Previous bookings</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-ad>
