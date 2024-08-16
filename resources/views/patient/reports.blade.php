<x-admin>
    <?php
    $reports = [
        (object) [
            'id' => 1,
            'created_at' => '2023-09-01',
            'test' => (object) [
                'name' => 'Test 1',
            ],
        ],
        (object) [
            'id' => 2,
            'created_at' => '2023-09-02',
            'test' => (object) [
                'name' => 'Test 2',
            ],
        ],
        (object) [
            'id' => 3,
            'created_at' => '2023-09-03',
            'test' => (object) [
                'name' => 'Test 3',
            ],
        ],
    ];
    $reports = [];
    ?>
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold"> Patient Reports</h2>

        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-xs">
                <div class="card">
                    <div class="card-header mb-12">

                    </div>


                    <div class="card-body">
                        @if (count($reports))
                            <ul class="list-none">
                                @foreach ($reports as $report)
                                    <li class="flex items-center justify-between p-2 border-b-2 border-gray-200">

                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $report->test->name }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="h-screen text-center text-gray-500 flex justify-center align-content-center">
                                Currently there are no reports to show.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
