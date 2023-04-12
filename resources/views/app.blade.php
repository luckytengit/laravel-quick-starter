<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Quickstart - Intermediate</title>

        <!-- CSS And JavaScript -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <div class="min-h-screen bg-gray-100">
            <div class="container">
                <nav class="navbar navbar-default">
                    <!-- Navbar Contents -->
                </nav>
            </div>

            <x-guest-layout>
            @yield('content')
            </x-guest-layout>
        </div>
    </body>
</html>