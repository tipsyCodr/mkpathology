<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    @vite('resources/css/app.css')

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
            <div class="container mt-16 pl-5">
                {{ $slot }}
            </div>
        </div>
    </div>
    <!-- Sidebar and Main Content End -->
    <!-- Main Content End -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
