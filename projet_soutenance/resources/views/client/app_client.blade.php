<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{--  meta for seo  --}}
        @yield('meta')

        {{--  tittle  --}}
        @yield('tittle')

        {{--  style  --}}
        @yield('style')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- bootstrap core css -->
       <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}" />

        <!-- Custom styles for this template -->
       <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
       <!-- responsive style -->
       <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" />


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

        {{--  inclure navigation  --}}
 

        {{--  content  --}}
        @yield('content')

        {{--  script  --}}
        @yield('script')

       @include('fournisseur.footer')


       <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
       <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
       </script>
       <script src="{{ asset('assets/js/custom.js') }}"></script>

    </body>
</html>

