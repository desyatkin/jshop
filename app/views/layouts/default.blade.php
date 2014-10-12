<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Joint Shop</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
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


    @yield('javascript')
    @yield('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>