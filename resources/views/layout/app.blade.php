<!DOCTYPE html>
<html>
    <head>
        <title>My app</title>
        <link rel="stylesheet" href="{{ URL::to('bootstrap/css/bootstrap.css') }}">
        <script src="{{ URL::to('bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ URL::to('jquery/jquery.js') }}"></script>
    </head>
    <body>
    @include('inc.nav')
        <div class="container">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>