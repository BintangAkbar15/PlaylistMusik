<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bara_FM</title>
    
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">  
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/auth.css') }}">
</head>
<body>
    <script src="{{ asset('dist/assets/static/js/initTheme.js') }}"></script>
        <div class="col-11 col-lg-5 container align-items-center vh-100 d-flex">
            <div class="row p-3 rounded shadow">

                <a href="index.html" class="d-flex gap-3">
                    <img src="{{ asset('img/logo.png') }}" width="40px" alt="Logo">
                    <h3 for="fw-bold">Bara FM Admin</h3>
                </a>
                <h2 class="mt-5">Admin.</h1>
                <p class="mb-3">Let’s manage your website for the best user experience.</p>

                <form action="{{ route('login.submit') }}" method="post">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-md" name="name" placeholder="Username">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-md" placeholder="Password" name="password" id="password-field">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-check form-check-md d-flex align-items-end" id="container-showpass">
                        <input class="form-check-input me-2" type="checkbox" value="" id="showpass">
                        <label class="form-check-label text-gray-600" for="showpass">
                            Show Password
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block btn-md shadow-lg mt-5">Log in</button>
                </form>

            </div>
        </div>
    <script src="{{ url('js/login.js')  }}"></script>
</body>

</html>