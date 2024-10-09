<x-layout>
    <script src="{{ asset('dist/assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main" class='layout-navbar navbar-fixed'>
            <x-header></x-header>
            <div class="col-12 pb-5 d-flex flex-column align-items-center">
                <h2 class="mt-2 fw-bold col-11 text-start">Report</h2>
                <div class="col-12 d-flex justify-content-evenly pt-5">
                    <div style="height: 250px; width: 250px;" class="text-light bg-primary gap-3 p-5 rounded d-flex flex-column align-items-center">
                        <i class="fa-solid fa-right-to-bracket" style="font-size:80px"></i>
                        <label class="h5">User Login</label>
                        <h3 class="text-bold">9,000</h3>
                    </div>
                    <div style="height: 250px; width: 250px;" class="text-light bg-primary gap-3 p-5 rounded d-flex flex-column align-items-center">
                        <i class="fa-brands fa-itunes-note" style="font-size:80px"></i>
                        <label class="h5">Available song</label>
                        <h3 class="text-bold">1,000,000</h3>
                    </div>
                    <div style="height: 250px; width: 250px;" class="text-light bg-primary gap-3 p-5 rounded d-flex flex-column align-items-center">
                        <i class="fa-solid fa-users" style="font-size:80px"></i>
                        <label class="h5">User Account</label>
                        <h3 class="text-bold">999,902,123</h3>
                    </div>
                </div>
                <h2 class="mt-5 fw-bold col-11 text-start">Top search</h2>
                <div class="col-11 mt-3 gap-3 d-flex flex-column align-items-center justify-content-start overflow-y-scroll" style="max-height: 30vh">
                    <div class="bg-primary text-light col-12 rounded d-flex gap-3 ps-3 align-items-center" style="height: 7vh">
                        <i class="fa-solid fa-crown" style="font-size: 25px"></i>
                        <label style="font-size: 17px">Sampai Menutup Mata - Mahahili</label>
                    </div>
                </div>
                <h2 class="mt-5 fw-bold col-11 text-start">View report</h2>
                <div class="col-11 bg-secondary mt-2" style="height: 50vh"></div>
            </div> 
        </div>
        
    </div>
</x-layout>