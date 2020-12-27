<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.demo-header')
    <body>
        @include('includes.demo-navbar')
        <div class="flex-grow">
            @yield('content')
        </div>
        @include('includes.demo-footer')
    </body>
</html>
