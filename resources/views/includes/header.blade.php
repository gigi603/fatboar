<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/cookieconsent.min.css') }}" rel="stylesheet" type="text/css">
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/cookieconsent.min.js') }}"></script>
    <script src="{{ asset('js/cookie.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>