<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard - Bara FM</title>

        <link rel="stylesheet" href="{{ asset('dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/table-datatable-jquery.css') }}">
        <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">  
        <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app-dark.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/iconly.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        
    </head>
    <body>
        {{ $slot }}
        
        <script src="{{ asset('dist/assets/static/js/components/dark.js') }}"></script>
        <script src="{{ asset('dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('dist/assets/compiled/js/app.js') }}"></script>
        <script src="{{ asset('dist/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('dist/assets/static/js/pages/dashboard.js') }}"></script>        
                    
        <script src="{{ asset('dist/assets/extensions/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/static/js/pages/datatables.js') }}"></script>
    </body>
</html>