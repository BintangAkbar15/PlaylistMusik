<x-mainpage>
    <x-slot:artistdesc>
        <img src="" id="img-info-artist" class="artist-image" width="50px" alt="" class="rounded-circle shadow">
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
        <img src="" id="image-song" alt="" width="100%" class="rounded songimg">
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

    <x-slot:playlist></x-slot:playlist>
    <x-slot:liked></x-slot:liked>
    <div>
        <div class="col-12 rounded-top px-5 py-3 d-flex flex-column justify-content-end"
            style="height: 400px; background: url('{{ url('data/artist/one republic/one republic.png') }}'); color: white; background-size: cover;">
            <div class="d-flex gap-2 align-items-center" style="color: #74c1fc;">
                <i class="fa-solid fa-circle-check"></i>
                <label for="" class="text-light">Verified Artist</label>
            </div>
            <h1>OneRepublic</h1>
            <div class="d-flex gap-2 align-items-center">
                <i class="fa-solid fa-user"></i>
                <label for="">50,123,903 Follower</label>
            </div>
        </div>
        <div class="col-12 d-flex p-4 flex-column" style="background: rgb(104, 104, 104, 0.5); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);">
            <h3>Popular</h3>
            <div class="d-flex flex-column col-12">
                @foreach ($lagu as $item)
                <button id="button{{ $loop->iteration }}" class="hoverbutton d-flex py-2 px-5 align-items-center btn col-12 bg-dark bg-opacity-25 mb-3">
                    <label for="" style="width: 4%;">{{ $loop->iteration }}</label>
                    <img src="{{ url('storage/'.$item->thumb) }}" width="4%" alt="" class="bg-dark">
                    <label for="" style="width: 40%" class="ps-3">{{ $item->name }}</label>
                    <label for="" style="width: 40%">{{ $item->dilihat }}</label>
                    <div class="d-flex align-items-center justify-content-between gap-3" style="width: 12%;">
                        <i class="bi bi-plus-circle d-flex align-items-center add-to-like"></i>
                        <label class="mb-0">{{ date('i:s' ,$item->audio_length) }}</label>
                        <i class="bi bi-three-dots d-flex align-items-center option"></i>
                    </div>
                </button>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                // Memuat lagu pertama dari localStorage saat halaman dimuat
                let storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
                if (storedSongs.length > 0) {
                    loadSongData(storedSongs[0]);
                }
            
                document.getElementById('button{{ $loop->iteration }}').addEventListener('click', function() {
                    const button = document.getElementById('button{{ $loop->iteration }}');
                    const children = button.children;
            
                    let song = {
                        image: '',
                        name: '',
                        views: '',
                        audio_length: '',
                        audio: '{{ $item->audio }}'
                    };
            
                    // Ambil data dari elemen anak
                    for (let i = 0; i < children.length; i++) {
                        let element = children[i];
            
                        if (element.tagName.toLowerCase() === 'img') {
                            song.image = element.src || '';
                        } else if (i === 2) {
                            song.name = element.innerText || '';
                        } else if (i === 3) {
                            song.views = element.innerText || '';
                        } else if (i === 4) {
                            let divChildren = element.children;
                            let audioLengthFormatted = divChildren[1]?.innerText || '';
                            if (audioLengthFormatted) {
                                let [minutes, seconds] = audioLengthFormatted.split(':').map(Number);
                                song.audio_length = ((minutes * 60) + seconds) * 1000;
                            }
                        }
                    }
            
                    let storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
                    const songExists = storedSongs.some(storedSong => storedSong.name === song.name);
            
                    if (!songExists) {
                        storedSongs.push(song);
                        localStorage.setItem('songs', JSON.stringify(storedSongs));
                        console.log('Song object stored:', song);
                        playAudio(song.audio); // Memutar lagu yang baru ditambahkan
                        loadSongData(song)
                    } else {
                        console.log('Song already exists:', song);
                    }
                    playmusic()
                    playsong(song.audio_length); // Mengatur durasi dan memutar lagu
                });
            
                function loadSongData(song) {
                    document.getElementById('img-info-artist').src = song.image;
                    document.getElementById('name-info-artist').textContent = song.name;
                    document.querySelectorAll('.artist-name').forEach(el => el.textContent = song.name);
                    document.querySelectorAll('.songname').forEach(el => el.textContent = song.name);
                    document.getElementById('normal-title').textContent = song.name;
                    document.getElementById('image-song').src = song.image;
                    document.getElementById('image-fullscreen').src = song.image;
                    document.querySelectorAll('.songimg').src = song.image;
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
                @endforeach
            </div>
        </div>
    </div>
    
</x-mainpage>
