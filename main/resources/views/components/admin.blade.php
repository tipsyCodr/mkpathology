<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<style>
    .sidebar {
        width: 200px;
    }
</style>

<body>

    <!--Navbar-->
    <x-navbar />
    <!--Navbar End-->

    <!-- Sidebar and Main Content Start -->
    <div class="flex">
        <div class="sidebar">
            <x-sidebar />
        </div>
        <div class="w-4/5 ">
            <x-alerts />
            <div class="container mt-16 pl-5">
                {{ $slot }}
            </div>
        </div>
    </div>
    <!-- Sidebar and Main Content End -->
    <!-- Main Content End -->

    <!-- Bootstrap JS -->

    {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/lib/multi-select/multiselect.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.fancytable/dist/fancyTable.min.js"></script>


</body>

</html>
