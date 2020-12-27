<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.header')
    <body>
        @include('includes.navbar')
        <div class="wrapper d-flex align-items-stretch">
            @include('includes.sidebar')
            @yield('content')
            @include('includes.footer')
        <script src="{{ asset("js/jquery.min.js") }}" rel="stylesheet"></script>
        <script>
            (function($) {
              "use strict";
      
              var fullHeight = function() {
                $(".js-fullheight").css("height", $(window).height());
                $(window).resize(function() {
                  $(".js-fullheight").css("height", $(window).height());
                });
              };
              fullHeight();
      
              $("#sidebarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
              });
            })(jQuery);

            $(function () {
                var url = window.location.pathname,
                    urlRegExp = new RegExp(url.replace(/\/$/, '') + "$");
                $('.nav-item a.nav-link').each(function () {
                    if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                        $(this).addClass('active');
                    }
                });    
            });
          </script>
    </body>
</html>


    