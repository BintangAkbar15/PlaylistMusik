<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard - Bara FM</title>
    
        <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">  
        <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app-dark.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/auth.css') }}">
    </head>
    <body >
        {{ $slot }}
        <script src="{{ asset("dist/assets/static/js/components/dark.js") }}"></script>
        <script src="{{ asset('dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('dist/assets/compiled/js/app.js') }}"></script>
    </body>
</html>