<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.header')
    <body>
        <div id="container-fluid">
            @include('includes.navbar')
            @yield('content')
        </div>
        @include('includes.demo-footer')
    </body>
</html>
