<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Joint Shop</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    @yield('css')
</head>
<body>
    @include('layouts.partials.nav')


    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @yield('content')
        </div>
        <div class="col-md-1"></div>
    </div>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>@yield('javascript')</script>
    @yield('scripts')

</body>
</html>