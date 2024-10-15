<x-layout>
    <div class="position-relative vh-100 overflow-hidden">
        <!-- Video Background -->
        <video class="position-fixed top-0 start-0 w-100 h-100" autoplay muted loop style="object-fit: cover;">
            <source src="{{ url('video/background.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-75">
            <nav class="col-12 px-4 py-3 border-bottom border-3 border-primary d-flex justify-content-between bg-dark bg-opacity-50" style="backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                <img src="{{ url('img/logo-bara-fm.png') }}" height="40" alt="">
                <div class="d-flex gap-3">
                    <a class="btn rounded-pill fs-6" href="{{ route('log.user') }}">Log In</a>
                    <span class="border border-light"></span>
                    <a class="btn rounded-pill fs-6 btn-light" href="{{ route('register.email.tampil') }}">Sign Up</a>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="col-12 d-flex flex-column justify-content-center align-items-center p-5 gap-5" style="height: 90vh;">
                <div class="d-flex gap-5">
                    <img src="{{ url('img/logo.png') }}" height="150" alt="">
                    <label for="" style="font-size: 100px;">Bara FM</label>
                </div>
                <div class="col-8 d-flex justify-content-center">
                    <p class="text-center">
                        This app is a music platform designed to deliver the best audio experience for everyone. With a diverse collection of music, it is committed to providing superior sound quality, creating an immersive experience for users. Enjoy your favorite tracks with unmatched clarity, anytime, anywhere.
                    </p>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <a class="btn btn-light col-5 py-2 rounded-pill fw-bold" href="{{ route('log.user') }}">
                        Start Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
