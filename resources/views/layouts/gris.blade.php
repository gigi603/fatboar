<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.welcome-header')
    <body class="bg-block-gris">
        @include('includes.welcome-navbar')
        <div class="flex-grow">
            @yield('content')
        </div>
        @include('includes.welcome-footer')
    </body>
</html>
