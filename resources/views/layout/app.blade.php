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
            @include('inc.messages')
                @yield('content')
            </div>
        </div>
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    </body>
</html>