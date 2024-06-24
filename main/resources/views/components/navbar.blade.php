<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-white shadow-lg w-full z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <a class="text-2xl font-bold text-gray-800" href="#">Admin </a>
            <button class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" type="button"
                onclick="toggleNavbar()">
                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png"
                    alt="Avatar" class="h-8 w-8 rounded-full">
            </button>
        </div>
        <div id="navbarNav"
            class="hidden lg:absolute top-16 right-0 md:items-end md:justify-end md:bg-white md:absolute md:w-48 md:mt-4 md:rounded-lg md:shadow-lg md:z-10">
            <ul class="flex flex-col md:flex-col w-full">
                <li class="md:mr-4">
                    <a class="block py-2 px-4 text-gray-800 hover:text-gray-600" href="#">Profile</a>
                </li>

                <li class="md:mr-4">
                    <a class="block py-2 px-4 text-gray-800 hover:text-gray-600" href="#">Settings</a>
                </li>
                <li>
                    <a class="block py-2 px-4 text-gray-800 hover:text-gray-600" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function toggleNavbar() {
        var navbar = document.getElementById('navbarNav');
        if (navbar.style.display === 'none' || navbar.style.display === '') {
            navbar.style.display = 'block';
        } else {
            navbar.style.display = 'none';
        }
    }
</script>
