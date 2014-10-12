<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Joint Shop</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    @yield('css')
</head>
<body>
{{--    @include('layouts.partials.nav')--}}

            @yield('content')



    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>@yield('javascript')</script>
    @yield('scripts')

</body>
</html>