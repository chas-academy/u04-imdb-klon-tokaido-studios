<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IGDb')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <!-- Header -->
    @include('partials.header')

    <!-- Main content -->
    <main class="py-8 px-6">
        <!-- @yield('content') -->
    </main>

    <!-- Footer -->
    @include('partials.footer')
</body>
</html>