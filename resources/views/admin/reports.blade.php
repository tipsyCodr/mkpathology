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
    </div>
</x-admin>
