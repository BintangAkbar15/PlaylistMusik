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
    <x-slot:inputlike>
        <input type="hidden" name="like" id="likedsong" value="">
    </x-slot:inputlike>
    <x-slot:liked>{{ $lLagu }} {{ $lLagu > 1 ? 'Songs' : 'Song'}}</x-slot:liked>
    <div>
        <div class="col-12 rounded-top px-5 py-3 d-flex flex-column justify-content-end"
            style="height: 400px; background: url('{{ url('img/background-dump.jpeg') }}'); color: white; background-size: cover;">
            <div class="d-flex gap-2 align-items-center" style="color: #74c1fc;">
                <i class="fa-solid fa-circle-check"></i>
                <label for="" class="text-light">Verified Artist</label>
            </div>
            <h1>{{ $lagu[0]->name }}</h1>
            <div class="d-flex gap-2 align-items-center">
                <i class="fa-solid fa-user"></i>
                <label for="">{{ $lagu[0]->dilihat }} Follower</label>
            </div>
        </div>
        <div class="col-12 d-flex p-4 flex-column" style="background: rgb(104, 104, 104, 0.5); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);">
            <button id="playAll" class="rounded-circle btn bg-success text-dark d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                <i class="fa-solid fa-play"></i>
            </button>
            <h3 class="mt-3">Popular</h3>
            <div class="d-flex flex-column col-12">
                @foreach ($lagu as $item)
                    @foreach ($item->plagu as $item)
                        
                    <button id="button{{ $loop->iteration }}" class="hoverbutton d-flex py-2 px-5 align-items-center btn col-12 bg-dark bg-opacity-25 mb-3">
                        <label for="" style="width: 4%;">{{ $loop->iteration }}</label>
                        <img src="{{ url('storage/'.$item->thumb) }}" width="4%" alt="" class="bg-dark">
                        <label for="" style="width: 40%" class="ps-3">{{ $item->name }}</label>
                        <label for="" style="width: 40%">{{ $item->dilihat }}</label>
                        <div class="d-flex align-items-center justify-content-between gap-3" style="width: 12%;">
                            <i class="bi bi-plus-circle d-flex align-items-center add-to-like"></i>
                            <label  class="mb-0">{{ date('i:s' ,$item->audio_length) }}</label>
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
                            like: '',
                            artist: '{{ $lagu[0]->name }}',
                            artistimg: '{{ $lagu[0]->thumb }}',
                            audio: '{{ $item->audio }}'
                        };

                            
                        @foreach ($lagu as $laguIndex => $laguItem)
                            @foreach ($laguItem->plagu as $plaguIndex => $plaguItem)
                                if (index === {{ $loop->iteration }}-1) {
                                    song.id = '{{ $plaguItem->id }}';
                                    song.like = '{{ $like }}';
                                }
                            @endforeach
                        @endforeach
                        
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
                        const songIndex = storedSongs.findIndex(storedSong => storedSong.name === song.name);

                        
                        if (!songExists) {
                            if(songExists > 1){
                                storedSongs.shift()
                            }
                            storedSongs.unshift (song);
                            localStorage.setItem('songs', JSON.stringify(storedSongs));
                            console.log('Song object stored:', song);
                            playAudio(song.audio); // Memutar lagu yang baru ditambahkan
                            loadSongData(song)
                        } else {
                            if (songIndex !== -1) {
                                // Jika lagu sudah ada, hapus dari array
                                storedSongs.splice(songIndex, 1); // Menghapus lagu yang ada
                                console.log('Song removed:', storedSongs[songIndex]);
                            }

                            // Tambahkan lagu baru ke indeks ke-0
                            storedSongs.unshift(song);
                            localStorage.setItem('songs', JSON.stringify(storedSongs));
                            console.log('Song object stored:', song);
                            loadSongData(song);
                            playAudio(song.audio); // Memutar lagu yang baru ditambahkan
                        }
                        playmusic()
                        playsong(song.audio_length); // Mengatur durasi dan memutar lagu
                    });
                
                    function loadSongData(song) {
                        console.log(song.artist)
                        document.getElementById('img-info-artist').src = `/storage/${song.artistimg}`;
                        document.getElementById('likedsong').value = song.id;
                        document.getElementById('name-info-artist').textContent = song.artist;
                        document.querySelectorAll('.artist-name').forEach(el => el.textContent = song.artist);
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
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <script>
         document.getElementById('playAll').addEventListener('click', function() {
        let allSongs = []; // Array untuk menyimpan semua lagu

        // Ambil data dari semua tombol
        const buttons = document.querySelectorAll('[id^="button"]'); // Memilih semua tombol yang diawali dengan "button"
        
        buttons.forEach((button,index) => {
            const children = button.children;
            console.log(button)

            let song = {
                id: '',
                image: '',
                name: '',
                views: '',
                like: '',
                audio_length: '',
                artist: '{{ $lagu[0]->name }}', // Ganti dengan cara yang sesuai jika artist berbeda
                artistimg: '{{ $lagu[0]->thumb }}', // Ganti jika artist berbeda
                audio: ''
            };

            @foreach ($lagu as $laguIndex => $laguItem)
                @foreach ($laguItem->plagu as $plaguIndex => $plaguItem)
                    if (index === {{ $loop->iteration }}-1) {
                        song.audio = '{{ $plaguItem->audio }}';
                        song.id = '{{ $plaguItem->id }}';
                        song.like = '{{ $like }}';
                    }
                @endforeach
            @endforeach


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
                // Simpan audio path
                if (i === 5) {
                    song.audio = '{{ $item->audio }}'; // Pastikan ini sesuai dengan data lagu
                }
            }

            allSongs.push(song); // Tambahkan lagu ke array allSongs
        });
        console.log()
        // Kosongkan localStorage dan simpan lagu baru
        localStorage.setItem('songs', JSON.stringify(allSongs));
        console.log('All songs stored:', allSongs);

        // Memuat dan memutar lagu pertama
        playmusic()
        loadSongData(allSongs[0]);
        playAudio(allSongs[0].audio);
        playsong(allSongs[0].audio_length);
    });

    function loadSongData(song) {
                        console.log(song.artist)
                        document.getElementById('img-info-artist').src = `/storage/${song.artistimg}`;
                        document.getElementById('name-info-artist').textContent = song.artist;
                        document.querySelectorAll('.artist-name').forEach(el => el.textContent = song.artist);
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
    </script>
</x-mainpage>
