<x-mainpage>
    <x-slot:playlist>
        @forelse ($playlists as $item)
            <div class="col-lg-12 col-auto p-2 p-lg-3 mb-3 rounded d-flex gap-3 shadow" style="background: #424445">
                <div class="col-12 col-lg-3">
                    <img src="{{ url('img/dumpimg.png') }}" class="img-fluid d-lg-block d-none" style="max-height: 55px" alt="">
                    <img src="{{ url('img/dumpimg.png') }}" class="img-fluid d-lg-none" alt="">
                </div>
                <div class="col-9 d-none d-lg-block d-flex flex-column justify-content-center">
                    <label for="" class="fs-5 d-none d-lg-block">{{ $item->name }}</label>
                    <label for="" class="fs-6 d-none d-xl-block">Playlist &#8226 {{ $jlagu }} {{ $jlagu > 1 ? 'Songs' : 'Song'}}</label>
                </div>
            </div>
        @empty
            
        @endforelse
    </x-slot:playlist>
    <x-slot:liked>{{ $lLagu }} {{ $lLagu > 1 ? 'Songs' : 'Song'}}</x-slot:liked>
    <div class="px-3 pt-3">
        <div class="col-12 rounded-top p-5 d-flex flex-column" style="height: 200px; background: linear-gradient(to bottom, hsl(35, 100%, 50%), rgb(104, 104, 104)); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); color: white">
            @php
                if ($hour >= 5 && $hour < 12) {
                    $greeting = 'Selamat Pagi';
                } elseif ($hour >= 12 && $hour < 15) {
                    $greeting = 'Selamat Siang';
                } elseif ($hour >= 15 && $hour < 18) {
                    $greeting = 'Selamat Sore';
                } else {
                    $greeting = 'Selamat Malam';
                }
            @endphp

            <h1>{{ $greeting }} {{ Auth::user()->name }}</h1>
            <label for="" class="fs-6">Bara FM siap nih setel lagu kesukaan mu untuk menemani hari mu</label>
        </div>
        <div class="col-12 d-flex p-4 flex-column" style="background: rgb(104, 104, 104, 0.5); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);">
            <div class="col-12 d-flex gap-2">
                <button class="px-3 py-1 rounded-pill btn btn-light border-none ">All</button>
                <button class="px-3 py-1 rounded-pill btn btn-light border-none ">Music</button>
                <button class="px-3 py-1 rounded-pill btn btn-light border-none ">Artist</button>
            </div>
            <label for="" class="fs-4 mt-4" style="color: white">Previously</label>
            <div class="col-12 d-flex flex-column flex-md-row">
                <div class="col-md-6 p-2 col-12">
                    <div class="col-12 p-2 d-flex align-items-center m-2 gap-3 bg-dark rounded">
                        <img src="{{ url('img/dumpimg.png') }}" width="40px" alt="">
                        <label for="" class="fs-6">Favorite song</label>
                    </div>
                    <div class="col-12 p-2 d-flex align-items-center m-2 gap-3 bg-dark rounded">
                        <img src="{{ url('img/dumpimg.png') }}" width="40px" alt="">
                        <label for="" class="fs-6">Favorite song</label>
                    </div>
                    <div class="col-12 p-2 d-flex align-items-center m-2 gap-3 bg-dark rounded">
                        <img src="{{ url('img/dumpimg.png') }}" width="40px" alt="">
                        <label for="" class="fs-6">Favorite song</label>
                    </div>
                    <div class="col-12 p-2 d-flex align-items-center m-2 gap-3 bg-dark rounded">
                        <img src="{{ url('img/dumpimg.png') }}" width="40px" alt="">
                        <label for="" class="fs-6">Favorite song</label>
                    </div>
                </div>
                <div class="col-6 p-2 d-none d-md-block">
                    <div class="col-12 p-2 d-flex align-items-center m-2 gap-3 bg-dark rounded">
                        <img src="{{ url('img/dumpimg.png') }}" width="40px" alt="">
                        <label for="" class="fs-6">Favorite song</label>
                    </div>
                    <div class="col-12 p-2 d-flex align-items-center m-2 gap-3 bg-dark rounded">
                        <img src="{{ url('img/dumpimg.png') }}" width="40px" alt="">
                        <label for="" class="fs-6">Favorite song</label>
                    </div>
                    <div class="col-12 p-2 d-flex align-items-center m-2 gap-3 bg-dark rounded">
                        <img src="{{ url('img/dumpimg.png') }}" width="40px" alt="">
                        <label for="" class="fs-6">Favorite song</label>
                    </div>
                    <div class="col-12 p-2 d-flex align-items-center m-2 gap-3 bg-dark rounded">
                        <img src="{{ url('img/dumpimg.png') }}" width="40px" alt="">
                        <label for="" class="fs-6">Favorite song</label>
                    </div>
                </div>
            </div>
            <label for="" class="fs-4 mt-4" style="color: white">Recomended For You</label>
            <div class="col-12 d-flex justify-content-evenly overflow-x-auto">
                <div class="p-2 d-flex flex-column align-items-center gap-2" 
                    onmouseenter="this.classList.add('bg-secondary')" 
                    onmouseleave="this.classList.remove('bg-secondary')">
                    <img src="{{ url('img/dumpimg.png') }}" class="rounded" width="150px" alt="">
                    <label for="" class="fs-5" style="color: white">Pop</label>
                </div>
                <div class="p-2 d-flex flex-column align-items-center gap-2"
                    onmouseenter="this.classList.add('bg-secondary')" 
                    onmouseleave="this.classList.remove('bg-secondary')">
                    <img src="{{ url('img/dumpimg.png') }}" class="rounded" width="150px" alt="">
                    <label for="" class="fs-5" style="color: white">Pop</label>
                </div>
                <div class="p-2 d-flex flex-column align-items-center gap-2"
                    onmouseenter="this.classList.add('bg-secondary')" 
                    onmouseleave="this.classList.remove('bg-secondary')">
                    <img src="{{ url('img/dumpimg.png') }}" class="rounded" width="150px" alt="">
                    <label for="" class="fs-5" style="color: white">Pop</label>
                </div>
                <div class="p-2 d-flex flex-column align-items-center gap-2">
                    <div style="width: 150px; height: 160px; color: white" class="d-flex gap-3 flex-column rounded bg-dark justify-content-center align-items-center">
                        <i class="fa-solid fa-circle-arrow-right" style="font-size: 50px"></i>
                        <label for="" class="fs-5" style="color: white">More</label>
                    </div>
                </div>
            </div>
            <label for="" class="fs-4 mt-4" style="color: white">Best Music</label>
            <div class="col-12 d-flex justify-content-evenly overflow-x-auto">
                <div class="p-2 d-flex flex-column align-items-center gap-2"
                    onmouseenter="this.classList.add('bg-secondary')" 
                    onmouseleave="this.classList.remove('bg-secondary')">
                    <img src="{{ url('img/dumpimg.png') }}" class="rounded" width="150px" alt="">
                    <label for="" class="fs-5" style="color: white">Pop</label>
                </div>
                <div class="p-2 d-flex flex-column align-items-center gap-2"
                    onmouseenter="this.classList.add('bg-secondary')" 
                    onmouseleave="this.classList.remove('bg-secondary')">
                    <img src="{{ url('img/dumpimg.png') }}" class="rounded" width="150px" alt="">
                    <label for="" class="fs-5" style="color: white">Pop</label>
                </div>
                <div class="p-2 d-flex flex-column align-items-center gap-2"
                    onmouseenter="this.classList.add('bg-secondary')" 
                    onmouseleave="this.classList.remove('bg-secondary')">
                    <img src="{{ url('img/dumpimg.png') }}" class="rounded" width="150px" alt="">
                    <label for="" class="fs-5" style="color: white">Pop</label>
                </div>
                <div class="p-2 d-flex flex-column align-items-center gap-2">
                    <div style="width: 150px; height: 160px; color: white" class="d-flex gap-3 flex-column rounded bg-dark justify-content-center align-items-center">
                        <i class="fa-solid fa-circle-arrow-right" style="font-size: 50px"></i>
                        <label for="" class="fs-5" style="color: white">More</label>
                    </div>
                </div>
            </div>
            <label for="" class="fs-4 mt-4" style="color: white">Artist</label>
            <div class="col-12 d-flex justify-content-evenly overflow-x-auto">
                @forelse ($artists as $item)
                    <div class="p-2 d-flex flex-column align-items-center gap-2"
                        onmouseenter="this.classList.add('bg-secondary')" 
                        onmouseleave="this.classList.remove('bg-secondary')">
                        <img src="{{ url($item->thumb ? 'storage/'.$item->thumb : 'img/dumpimg.png') }}" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;" alt="">
                        <label for="" class="fs-6" style="color: white">{{ $item->name }}</label>
                    </div>
                    @if ($loop->iteration == 4)
                        <div class="p-2 d-flex flex-column align-items-center gap-2">
                            <div style="width: 150px; height: 160px; color: white" class="d-flex gap-3 flex-column rounded bg-dark justify-content-center align-items-center">
                                <i class="fa-solid fa-circle-arrow-right" style="font-size: 50px"></i>
                                <label for="" class="fs-5" style="color: white">More</label>
                            </div>
                        </div>
                        @break
                    @endif
                @empty
                    
                @endforelse
            </div>
            @if ($playlists->count() > 0)
                <label for="" class="fs-4 mt-4" style="color: white">Your playlist</label>
                <div class="col-12 d-flex justify-content-evenly overflow-x-auto">
                    @forelse ($playlists as $item)
                        <div class="p-2 d-flex flex-column align-items-center gap-2"
                            onmouseenter="this.classList.add('bg-secondary')" 
                            onmouseleave="this.classList.remove('bg-secondary')">
                            <img src="{{ url('img/dumpimg.png') }}" class="rounded" width="150px" alt="">
                            <label for="" class="fs-5" style="color: white">Pop</label>
                        </div>
                        @if ($loop->iteration == 4)
                            <div class="p-2 d-flex flex-column align-items-center gap-2">
                                <div style="width: 150px; height: 160px; color: white" class="d-flex gap-3 flex-column rounded bg-dark justify-content-center align-items-center">
                                    <i class="fa-solid fa-circle-arrow-right" style="font-size: 50px"></i>
                                    <label for="" class="fs-5" style="color: white">More</label>
                                </div>
                            </div>
                            @break
                        @endif
                    @empty
                        
                    @endforelse
                </div>
            @endif
        </div>        
    </div>
</x-mainpage>