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
    <body class="max-h-100 d-flex col-12">
        <div class="col-2 bg-primary vh-100">
            
        </div>
        <div class="col-7 bg-warning d-flex flex-column">
            <div class="col-12 bg-light" style="height: 90%">
                <button id="top-center" class="btn btn-outline-primary btn-block btn-lg">{{session('success')}}</button>
            </div>
            <div class="col-12 bg-success" style="height: 10%">

            </div>
        </div>
        <div class="col-3 bg-danger vh-100">
            
        </div>
        <script src="{{ asset('dist/assets/extensions/toastify-js/src/toastify.js') }}"></script>
        @if (session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Toastify({
                        text: "{{ session('success') }}",
                        duration: 3000,
                        close: true,     
                        gravity: "top", 
                        backgroundColor: "#dc3545",  
                        stopOnFocus: true,
                        className: "p-3 position-fixed",  
                        style: { 
                            top: "10px",
                            color: "#fff",  
                            borderRadius: "5px",  
                        },
                        onClick: function() {}, 
                    }).showToast();
                    const closeButtons = document.querySelectorAll('.toastify .toast-close');
                    closeButtons.forEach(function(button) {
                        button.style.backgroundColor = 'transparent';  
                        button.style.border = 'none';  
                        button.style.color = '#fff';
                        button.style.marginstart = 50;
                    });
                });

            </script>
        @endif
    </body>
</html>