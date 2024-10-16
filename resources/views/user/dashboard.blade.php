<x-mainpage>
    <x-slot:artistdesc>
        <img src="" id="img-info-artist" class="artist-image" style="object-fit: cover; width:50px; height:50px" alt="" class="rounded-circle shadow">
        <label for="" id="name-info-artist" class="text-white artist-name-desc"><i class="fa-solid fa-circle-check ms-2" style="color: rgb(0, 208, 255);"></i></label>
    </x-slot:artistdesc>
    <x-slot:artistut>
        <label for="" class="fs-6 overflow-hidden col-12 text-nowrap text-white artist-name"></label>
    </x-slot:artistut>
    <x-slot:songinfo>
        <marquee behavior="" direction="" class="col-12" scrollamount='3' style="display: none;" id="marquee">
            <label for="" class="fs-3 mt-2 text-nowrap fw-bold text-white songname"></label>
        </marquee>
        <label for="" class="fs-3 mt-2 text-nowrap fw-bold text-white col-12 songname" style="display: block" id="normal-title"></label>
    </x-slot:songinfo>
    <x-slot:imagesong>
        <img src="" id="image-song" alt=""  style="object-fit: cover; width:100%" class="rounded songimg">
    </x-slot:imagesong>
    <x-slot:botinfo>
        <label for="" class="fs-4 text-nowrap songname"></label>
        <label for="" class="fs-6 text-nowrap artist-name"></label>
    </x-slot:botinfo>
    <x-slot:botimg>    
        <img src="" style="width: 70px; height: 70px;" class="rounded d-none d-md-block songimg" alt="">
    </x-slot:botimg>
    <x-slot:audio>    
        <source src="" id="audio" type="audio/mp3">
    </x-slot:audio>
    <x-slot:fdesc>
        <label class="fs-2 fw-bold songname" ></label>
        <label class="fs-5 artist-name"></label>
    </x-slot:fdesc>
    <x-slot:fullscimg>
        <img src="" id="image-fullscreen" class="rounded shadow" style="width: 300px; height: 300px; margin-top: -150px;" alt="Caramel Ribbon Cursetard">
    </x-slot:fullscimg>
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
            <label for="" class="fs-4 mt-4" style="color: white">Favorite Song</label>
            <div class="col-12 d-flex flex-column flex-md-row">
                <div class="col-md-6 p-2 col-12">
                    @forelse ($artists as $item)
                        @if ($loop->iteration <=4)
                            <div class="col-12 p-2 d-flex align-items-center m-2 gap-3 bg-dark rounded">
                                <img src="{{ url($item->thumb ? 'storage/'.$item->thumb : 'img/dumpimg.png') }}" width="40px" alt="">
                                <label for="" class="fs-6">{{ $item->name }}</label>
                            </div>        
                        @endif
                    @empty
                        
                    @endforelse
                </div>
                <div class="col-6 p-2 d-none d-md-block">
                    @forelse ($artists as $item)
                        @if ($loop->iteration > 4)
                            <div class="col-12 p-2 d-flex align-items-center m-2 gap-3 bg-dark rounded">
                                <img src="{{ url('img/dumpimg.png') }}" width="40px" alt="">
                                <label for="" class="fs-6">{{ $item->name }}</label>
                            </div>        
                        @endif
                    @empty
                        
                    @endforelse
                </div>
            </div>
            <label for="" class="fs-4 mt-4" style="color: white">Recomended For You</label>
            <div class="col-12 d-flex justify-content-evenly overflow-x-auto">
                @forelse ($recomend as $item)
                    <div class="p-2 d-flex flex-column align-items-center gap-2" 
                        onmouseenter="this.classList.add('bg-secondary')" 
                        onmouseleave="this.classList.remove('bg-secondary')">
                        <img src="{{ url($item->thumb ? 'storage/'.$item->thumb : 'img/dumpimg.png') }}" class="rounded" width="140px" alt="">
                        <label for="" class="fs-6" style="color: white; text-align: center">{{$item->name}}</label>
                    </div>
                @empty
                    
                @endforelse
                <div class="p-2 d-flex flex-column align-items-center gap-2">
                    <div style="width: 140px; height: 160px; color: white" class="d-flex gap-3 flex-column rounded bg-dark justify-content-center align-items-center">
                        <i class="fa-solid fa-circle-arrow-right" style="font-size: 50px"></i>
                        <label for="" class="fs-5" style="color: white">More</label>
                    </div>
                </div>
            </div>
            <label for="" class="fs-4 mt-4" style="color: white">Music Genre</label>
            <div class="col-12 d-flex justify-content-evenly overflow-x-auto">
                @php
                function isBright($color) {
                    // Function to check if the color is bright
                    $color = ltrim($color, '#');
                    $r = hexdec(substr($color, 0, 2));
                    $g = hexdec(substr($color, 2, 2));
                    $b = hexdec(substr($color, 4, 2));
                    $brightness = sqrt(0.299 * ($r * $r) + 0.587 * ($g * $g) + 0.114 * ($b * $b));
                    return $brightness > 128; // Adjust threshold as needed
                }
                @endphp
                @forelse ($genre as $item)
                    <div class="p-2 d-flex flex-column align-items-center gap-2 justify-content-center rounded"onmouseenter="this.classList.add('bg-secondary')" onmouseleave="this.classList.remove('bg-secondary')" style="width: 140px; height: 160px; background: {{ $item->color }};">
                        <label for="" class="fs-3 {{ (isBright($item->color) ? 'text-dark' : 'text-light') }}">{{ $item->name }}</label>
                    </div>
                    @if ($loop->iteration == 3)
                        <div class="p-0 d-flex flex-column align-items-center gap-2">
                            <div style="width: 140px; height: 160px; color: white" class="d-flex gap-3 flex-column rounded bg-dark justify-content-center align-items-center">
                                <i class="fa-solid fa-circle-arrow-right" style="font-size: 50px"></i>
                                <label for="" class="fs-5" style="color: white">More</label>
                            </div>
                        </div>
                        @break
                    @endif
                    
                @empty
                    
                @endforelse
                
            </div>
            <label for="" class="fs-4 mt-4" style="color: white">Artist</label>
            <div class="col-12 d-flex justify-content-evenly overflow-x-auto">
                @forelse ($artists as $item)
                    <a href="{{ route('artist',$item->slug) }}">
                        <div class="p-2 d-flex flex-column align-items-center gap-2"
                            onmouseenter="this.classList.add('bg-secondary')" 
                            onmouseleave="this.classList.remove('bg-secondary')">
                            <img src="{{ url($item->thumb ? 'storage/'.$item->thumb : 'img/dumpimg.png') }}" class="rounded-circle" style="width: 140px; height: 140px; object-fit: cover;" alt="">
                            <label for="" class="fs-6" style="color: white">{{ $item->name }}</label>
                        </div>
                    </a>
                    @if ($loop->iteration == 3)
                        <div class="p-2 d-flex flex-column align-items-center gap-2">
                            <div style="width: 140px; height: 160px; color: white" class="d-flex gap-3 flex-column rounded bg-dark justify-content-center align-items-center">
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
                            <img src="{{ url('img/dumpimg.png') }}" class="rounded" width="140px" alt="">
                            <label for="" class="fs-5" style="color: white">{{ $item->name }}</label>
                        </div>
                        @if ($loop->iteration == 3)
                            <div class="p-2 d-flex flex-column align-items-center gap-2">
                                <div style="width: 140px; height: 160px; color: white" class="d-flex gap-3 flex-column rounded bg-dark justify-content-center align-items-center">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                // Memuat lagu pertama dari localStorage saat halaman dimuat
                let storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
                if (storedSongs.length > 0) {
                    loadSongData(storedSongs[0]);
                }        
                playmusic()
                playsong(song.audio_length); // Mengatur durasi dan memutar lagu
                
            
                function loadSongData(song) {
                    document.getElementById('img-info-artist').src = `/storage/${song.artistimg}`;
                    document.getElementById('name-info-artist').textContent = song.name;
                    document.querySelectorAll('.artist-name').forEach(el => el.textContent = song.name);
                    document.querySelectorAll('.songname').forEach(el => el.textContent = song.name);
                    document.getElementById('normal-title').textContent = song.name;
                    document.getElementById('image-song').src = song.image;
                    document.getElementById('image-fullscreen').src = song.image;
                    document.querySelectorAll('.songimg').forEach(el => el.src = song.image);
                    document.getElementById('audio').src = `/storage/${song.audio}`;
                }
            
                function playAudio(audioSrc) {
                    const audioPlayer = document.getElementById('my-audio');
                    audioPlayer.src = `/storage/${audioSrc}`;
                    audioPlayer.play();
                    document.getElementById('play-pause').classList.remove('fa-play');
                    document.getElementById('play-pause').classList.add('fa-pause');
                }
            
                function playsong(duration) {
                    setTimeout(function() {
                        let storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
                        if (storedSongs.length > 0) {
                            storedSongs.shift(); // Hapus lagu pertama dari playlist
                            localStorage.setItem('songs', JSON.stringify(storedSongs));
            
                            if (storedSongs.length > 0) {
                                let nextSong = storedSongs[0];
                                loadSongData(nextSong); // Memuat lagu berikutnya
                                playAudio(nextSong.audio);
                                playsong(nextSong.audio_length);
                            }
                        }
                    }, duration); // Durasi sesuai dengan panjang lagu
                }
            });
    </script>
</x-mainpage>