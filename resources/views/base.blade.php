<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    
    {{-- <script src="https://unpkg.com/@tailwindcss/browser@4"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://kit.fontawesome.com/8048c89e9e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js" integrity="sha512-KaIyHb30iXTXfGyI9cyKFUIRSSuekJt6/vqXtyQKhQP6ozZEGY8nOtRS6fExqE4+RbYHus2yGyYg1BrqxzV6YA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/@develoka/angka-rupiah-js/index.min.js"></script>

    <script>
        function showSuccessToast(message = "Data Berhasil Disimpan") {
            Toastify({
                text: message,
                duration: 3000,
                // destination: "https://github.com/apvarun/toastify-js",
                newWindow: true,
                // close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    // background: "linear-gradient(to right, #00b09b, #96c93d)",
                    background: "white",
                    borderBottom: "3px solid #96c93d",
                    color: "black",
                },
            }).showToast();
        }

        function showErrorToast(message = "Terjadi Kesalahan") {
            Toastify({
                text: message,
                duration: 3000,
                // destination: "https://github.com/apvarun/toastify-js",
                newWindow: true,
                // close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    // background: "linear-gradient(to right, #00b09b, #96c93d)",
                    background: "white",
                    borderBottom: "3px solid red",
                    color: "black",
                },
            }).showToast();
        }

        document.addEventListener("DOMContentLoaded", function () {
            @if (session('success'))
                showSuccessToast("{{ session('success') }}");
            @elseif (session('error'))
                showErrorToast("{{ session('error') }}");
            @endif

            @error('message')
                showErrorToast("{{ $message }}");
            @enderror
        });
    </script>
    

    <title>Magenta App | @yield('title')</title>
</head>

<body class="font-sans">
    <div class="min-h-screen flex bg-light">
        {{-- SIDEBAR --}}
        @include('components.sidebar.index')

        {{-- CONTENT --}}
        <div class="flex-1 flex flex-col">
            {{-- NAVBAR --}}
            @include('components.navbar.index')

            {{-- MAIN --}}
            <div class="p-16">
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
