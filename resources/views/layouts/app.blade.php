<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Application Standard')</title>

    @vite('resources/css/app.css')

</head>
<body>
    
<div class="container">

    @include('partials.header')

    <x-content-styles class="flex-grow">

        @yield('content')

    </x-content-styles>

</div>

@include('partials.footer')

</body>
</html>