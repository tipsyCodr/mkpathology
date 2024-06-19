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
            <a href="{{ route('admin') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                <span class="flaticon-home mr-2"></span> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('all.bookings') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                <span class="flaticon-list mr-2"></span> Bookings
            </a>
        </li>
        <li>
            <a href="{{ route('prescription.view') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                <span class="flaticon-users mr-2"></span> Prescriptions
            </a>
        </li>

        <li>
            <a href="{{ route('package.view') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                <span class="flaticon-folder mr-2"></span> Packages
            </a>
        </li>
        <li>
            <a href="{{ route('test.view') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                <span class="flaticon-folder mr-2"></span> Tests
            </a>
        </li>

        <li>
            <a href="{{ route('all.bookings') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                <span class="flaticon-settings mr-2"></span> Settings
            </a>
        </li>
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
