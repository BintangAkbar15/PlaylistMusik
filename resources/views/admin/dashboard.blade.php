<x-layout>
    <script src="{{ asset('dist/assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main" class='layout-navbar navbar-fixed'>
            <x-header></x-header>
            <div class="container d-flex mt-5 justify-content-center">
                <div class="col-11 border-bottom">
                    <h2>Dashboard</h2>
                </div>
            </div>
            <div class="col-12 mt-3 pb-5 d-flex flex-column align-items-center">
                <h2 class="mt-2 fw-bold col-11 text-start">Report</h2>
                <div class="col-12 d-flex justify-content-evenly pt-5">
                    <div style="height: 250px; width: 250px;" class="text-light bg-primary gap-3 p-5 rounded d-flex flex-column align-items-center">
                        <i class="fa-solid fa-right-to-bracket" style="font-size:80px"></i>
                        <label class="h5">User Login</label>
                        <h3 class="text-bold">{{ $data[2] }}</h3>
                    </div>
                    <div style="height: 250px; width: 250px;" class="text-light bg-primary gap-3 p-5 rounded d-flex flex-column align-items-center">
                        <i class="fa-brands fa-itunes-note" style="font-size:80px"></i>
                        <label class="h5">Available song</label>
                        <h3 class="text-bold">{{ $data[0] }}</h3>
                    </div>
                    <div style="height: 250px; width: 250px;" class="text-light bg-primary gap-3 p-5 rounded d-flex flex-column align-items-center">
                        <i class="fa-solid fa-users" style="font-size:80px"></i>
                        <label class="h5">User Account</label>
                        <h3 class="text-bold">{{ $data[1] }}</h3>
                    </div>
                </div>
                <h2 class="mt-5 fw-bold col-11 text-start">Top search</h2>
                <div class="col-11 mt-3 gap-3 d-flex flex-column align-items-center justify-content-start overflow-y-auto" style="max-height: 30vh">
                    @foreach ($rank as $item)
                        <div class="bg-primary text-light col-12 rounded d-flex gap-3 ps-3 align-items-center" style="height: 7vh">
                            <i class="fa-solid fa-crown" style="font-size: 25px; color:
    @if($loop->iteration == 1) 
        #FFD700;  /* Emas untuk urutan 1 */
    @elseif($loop->iteration == 2) 
        #C0C0C0;  /* Perak untuk urutan 2 */
    @elseif($loop->iteration == 3) 
        #cd7f32;  /* Perunggu untuk urutan 3 */
    @else
        #000000;  /* Warna default jika lebih dari 3 */
    @endif
"></i>

                            <label style="font-size: 17px">{{ $item->name }} - {{ $item->plagu[0]->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div> 
        </div>
    </div>

</x-layout>