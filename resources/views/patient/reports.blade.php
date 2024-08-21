<x-admin>

    <div class="container ">
        <h2 class="text-2xl font-bold my-4"> Patient Reports</h2>

        <div class="container">
            @if (isset($reports) && count($reports) > 0)
                <ul class="list-none">
                    @foreach ($reports as $report)
                        <a href="{{ asset('storage/uploads/reports/' . $report->user_id . '/' . $report->reports) }}"
                            class="" target="_blank" download>
                            <li
                                class="flex items-center justify-between p-2 border-b-2 border-gray-200 hover:bg-gray-100 transition-all">
                                <div class="card w-full">
                                    <div class="card-header">
                                        <p class="font-bold text-xl">{{ $report->test_name }}</p>
                                        <p class="text-muted">File Name:<span
                                                class="text-gray-500">{{ $report->reports }}</span></p>
                                    </div>
                                    <div class="card-body">
                                        Uploaded on {{ $report->created_at }}
                                    </div>
                                </div>
                                <i class="bi bi-arrow-down-circle-fill text-blue-500 text-2xl"></i>
                            </li>
                        </a>
                    @endforeach
                </ul>
                <i class="text-gray-500 my-2">Click on the item to download the reports listed below</i>
            @else
                <div class="h-screen text-center text-gray-500 flex justify-center align-content-center">
                    Currently there are no reports to show.
                </div>
            @endif
        </div>


    </div>
</x-admin>
