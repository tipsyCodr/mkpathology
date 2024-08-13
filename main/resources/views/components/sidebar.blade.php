<div class='bg-gray-900 text-white h-full min-h-screen px-4 py-6 'id="sidebar">
    <style>
        .close {
            width: 50px;
        }
    </style>
    <div class="flex items-start justify-start  mb-8 transition-all">
        <span class="text-md text-left font-semibold cursor-pointer" onclick="toggleSidebar()">
            <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </span>

    </div>
    <ul class="space-y-4" id="sidebar-menu">
        <li>
            @if (auth()->user()->hasRole('patient'))
                <a href="{{ route('patient.dashboard') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-home mr-2"></span> Dashboard
                </a>
            @else
                <a href="{{ route('admin') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-home mr-2"></span> Admin Dashboard
                </a>
            @endif
        </li>
        <li>
            @if (auth()->user()->hasRole('patient'))
                <a href="{{ route('patient.bookings') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-list mr-2"></span> Bookings
                </a>
            @else
                <a href="{{ route('all.bookings') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-list mr-2"></span> All Bookings
                </a>
            @endif
        </li>
        <li>
            @if (auth()->user()->hasRole('patient'))
                <a href="{{ route('patient.prescription.view') }}"
                    class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-users mr-2"></span> Prescriptions
                </a>
            @endif
            @if (auth()->user()->hasRole('admin'))
                <a href="{{ route('prescription.view') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-users mr-2"></span> Prescriptions
                </a>
            @endif
        </li>

        @if (auth()->user()->hasRole('admin'))
            <li>
                <a href="{{ route('parameters.view') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-folder mr-2"></span> Parameters
                </a>
            </li>
            <li>
                <a href="{{ route('category.show') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-folder mr-2"></span> Category
                </a>
            </li>
            <li>
                <a href="{{ route('package.view') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-folder mr-2"></span> Packages
                </a>
            </li>
        @endif
        @if (auth()->user()->hasRole('admin'))
            <li>
                <a href="{{ route('test.view') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-folder mr-2"></span> Tests
                </a>
            </li>
        @else
            <li>
                <a href="{{ route('patient.tests.view') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-folder mr-2"></span> Tests
                </a>
            </li>
        @endif
        @if (auth()->user()->hasRole('patient'))
            <li>
                <a href="{{ route('patient.reports') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-folder mr-2"></span> Reports
                </a>
            </li>
        @endif
        @if (auth()->user()->hasRole('admin'))
            <li>
                <a href="{{ route('admin.reports') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-folder mr-2"></span> Reports
                </a>
            </li>
        @endif
        @if (auth()->user()->hasRole('patient'))
            <li>
                <a href="{{ route('patient.settings') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <span class="flaticon-settings mr-2"></span> Settings
                </a>
            </li>
        @endif

    </ul>
</div>

<script>
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        var sidebarMenu = document.getElementById('sidebar-menu');

        sidebar.classList.toggle('close');
        sidebarMenu.classList.toggle('hidden');
    }
</script>
