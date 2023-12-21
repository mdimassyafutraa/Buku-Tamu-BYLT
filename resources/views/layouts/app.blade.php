<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- icon --}}
    <link rel="icon" href="{{ asset('img/logokai.png') }}">


    {{-- Css Tailwind --}}
    @vite('resources/css/app.css')

    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- Icon  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    {{-- Scroll --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>UPT BYLT | @yield('title')</title>

</head>

<body class="text-biru">
    @yield('content')
    {{-- Script --}}
    {{-- Alert --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const closeButtons = document.querySelectorAll('[data-dismiss-target]');

            closeButtons.forEach((button) => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-dismiss-target');
                    const alertElement = document.querySelector(targetId);

                    if (alertElement) {
                        alertElement.remove();
                    }
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
