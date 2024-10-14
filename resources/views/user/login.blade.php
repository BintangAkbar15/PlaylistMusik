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
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <a href="index.html" class="d-flex gap-3">
                        <img src="{{ asset('img/logo.png') }}" width="40px" alt="Logo">
                        <h3 for="fw-bold">Bara FM</h3>
                    </a>
                    <h2 class="mt-5">Log in.</h1>
                    <p class="mb-3">Log in for enjoy your save music.</p>
                    
                    <form action="{{ route('login.submit') }}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-md @if(session('error')) border-danger @endif" name="name" placeholder="Username" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left @if(session('error')) mb-1 @else mb-4 @endif">
                            <input type="password" class="form-control form-control-md @if(session('error')) border-danger @endif" placeholder="Password" name="password" id="password-field"
                            required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        @if (session('error'))
                            <label for="" class="text-danger" style="font-size: 14px">{{ session('error') }}</label>
                        @endif
                        <div class="form-check form-check-md d-flex align-items-end" id="container-showpass">
                            <input class="form-check-input me-2 " type="checkbox" value="" id="showpass">
                            <label class="form-check-label text-gray-600" for="showpass">
                                Show Password
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-md shadow-lg mt-5">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-6">
                        <p class="text-gray-600">Don't have an account? <a href="{{ route('register.email.tampil') }}" class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="#">Forgot password?</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="background: url('{{ url('img/dumpimg.png') }}');">
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('js/login.js')  }}"></script>
</body>
</html>