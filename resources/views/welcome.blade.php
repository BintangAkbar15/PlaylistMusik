<x-layout>
    <div class="col-12 vh-100" style="background: url({{ url('img/background-dump.jpeg') }}); background-size: ;">
        <nav class="col-12 px-4 py-3 border-bottom border-3 border-primary d-flex justify-content-between" style="background-color: black;">
            <img src="{{ url('img/logo-bara-fm.png') }}" height="40" alt="">
            <div class="d-flex gap-3">
                <button class="btn rounded-pill fs-6">Log In</button>
                <span class="border border-light"></span>
                <button class="btn rounded-pill fs-6 btn-light">Sign Up</button>
            </div>
        </nav>
    </div>
</x-layout>