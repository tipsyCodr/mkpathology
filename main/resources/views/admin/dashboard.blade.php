<x-admin>
    <div class="card-header text-4xl font-bold">
        Dashboard
    </div>
    <div class="container mx-auto flex justify-center">

        <div class="grid grid-cols-2 gap-4">
            <div class="card">

                <div class="card-body ">
                    @php
                        $counts = [
                            'tests' => \App\Models\Test::count(),
                            'packages' => \App\Models\Package::count(),
                            'patients' => \App\Models\Patient::count(),
                            'bookings' => \App\Models\PackageBooking::count(),
                        ];
                    @endphp

                    @foreach ($counts as $key => $count)
                        <a href="{{ route('test.view') }}"
                            class="{{ $key === 'tests' ? 'mt-2' : '' }}">{{ ucfirst($key) }}</a>
                        <a href="{{ route('test.view') }}">{{ $count }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-admin>
