<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Bara FM</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">  
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/auth.css') }}">
</head>

<body>

    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger">
                {{ $item }}
            </div>
        @endforeach
    @endif
    <script src="{{ asset('dist/assets/static/js/initTheme.js') }}"></script>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left" class="py-5">
                    <a href="index.html" class="d-flex gap-3">
                        <img src="{{ asset('img/logo.png') }}" width="40px" alt="Logo">
                        <h3 for="fw-bold">Bara FM</h3>
                    </a>
                    <h1 class="mt-3">Sign Up Phone</h1>
                    <p class="mb-5">Input your data to register to our website.</p>

                    <form action="{{ route('regis.phone.submit') }}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="tel" id="phone" class="form-control" name="telp" placeholder="123-456-7890">
                            <div class="form-control-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <label for="" id="phoneMessage" class="text-danger d-none" style="font-size: 14px">
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-md" name="name" placeholder="Username" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-md" id="password-field" name="password" placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <label for="" id="passMessage" class="text-danger d-none" style="font-size: 14px">
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-md" id="c_password-field" name="c_password" placeholder="Confirm Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <label for="" id="checkMessage" class="text-danger d-none" style="font-size: 14px">
                        </div>
                        <div class="form-check form-check-md d-flex align-items-end mb-4" id="container-showpass">
                            <input class="form-check-input me-2" type="checkbox" value="" id="showpass">
                            <label class="form-check-label text-gray-600" for="showpass">
                                Show Password
                            </label>
                        </div>
                        <input type="hidden" class="form-control form-control-md" id="email" name="email" placeholder="Email" required>

                        <button class="btn btn-primary btn-block btn-md shadow-lg mt-2">Sign Up</button>
                    </form>
                    <div class="text-center mt-3 text-lg fs-6">
                        <p class='text-gray-600'>Already have an account? <a href="{{ route('login.tampil') }}" class="font-bold">Log in</a>.</p>
                        <p class='text-gray-600'>Or <a href="{{ route('register.email.tampil') }}" class="font-bold">Register With Email</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="background-size: cover; background: url('{{ url('img/background-dump-2.jpeg') }}');">

                </div>
            </div>
        </div>
    </div>
    <x-validasi></x-validasi>
    <script src="{{ url('js/login.js') }}"></script>
</body>

</html>