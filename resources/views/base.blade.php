<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://kit.fontawesome.com/8048c89e9e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Magenta App | @yield('title')</title>
</head>

<body class="font-sans">
    <div class="min-h-screen flex bg-gray-100">
        <!-- Sidebar -->
        @include('components.sidebar.index')

        <!-- Content Area -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            @include('components.navbar.index')

            <!-- Main Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </div>
    </div>

    

    <script>
        // Toggle Sidebar Functionality
        const toggleSidebar = document.getElementById("toggleSidebar");
        const sidebar = document.getElementById("sidebar");

        toggleSidebar.addEventListener("click", () => {
            sidebar.classList.toggle("w-64");
            sidebar.classList.toggle("w-16");
            $('.sidebar-title').toggleClass('hidden');
            $('.sidebar-menu').toggleClass('hidden');
        });
    </script>

</body>

</html>
