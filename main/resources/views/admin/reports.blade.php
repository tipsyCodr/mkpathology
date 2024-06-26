<x-admin>
    <?php $reports = []; ?>
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center items-center my-4">
            <h2 class="text-2xl font-bold">All Reports</h2>
        </div>
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/3">
                <ul class="list-none">
                    <li class="py-2 px-4 rounded-lg bg-gray-100 mb-2">
                        <a href="{{ route('admin.reports') }}" class="block text-gray-800 hover:text-gray-900">
                            Packaged Test Report
                        </a>
                    </li>
                    <li class="py-2 px-4 rounded-lg bg-gray-100 mb-2">
                        <a href="{{ route('admin.reports') }}" class="block text-gray-800 hover:text-gray-900">
                            Test Report
                        </a>
                    </li>
                </ul>
            </div>
            <div class="w-full md:w-2/3">
                @if (count($reports))
                    @yield('content')
                @else
                    <div class="text-center text-gray-500">
                        No Report Data to show.
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin>
user
