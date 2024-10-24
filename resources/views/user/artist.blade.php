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
            <a href="{{ route('user.playlist',$item->name) }}">
                <div class="col-lg-12 col-auto p-2 p-lg-3 mb-3 rounded d-flex gap-3 shadow" style="background: #424445">
                    <div class="col-12 col-lg-3">
                        <img src="{{ url($item->thumb ? 'storage/'.$item->thumb : 'img/dumpimg.png') }}" class="img-fluid d-lg-block d-none" style="max-height: 55px" alt="">
                        <img src="{{ url($item->thumb ? 'storage/'.$item->thumb : 'img/dumpimg.png') }}" class="img-fluid d-lg-none" alt="">
                    </div>
                    <div class="col-9 d-none d-lg-block d-flex flex-column justify-content-center">
                        <label for="" class="fs-5 d-none d-lg-block">{{ $item->name }}</label>
                        <label for="" class="fs-6 d-none d-xl-block">Playlist &#8226 {{ $jlagu }} {{ $jlagu > 1 ? 'Songs' : 'Song'}}</label>
                    </div>
                </div>
            </a>
        @empty
            
        @endforelse
    </x-slot:playlist>
    <x-slot:playlistadd> 
        
    <li class="dropdown-item"><i class="fa-regular me-3 fa-bookmark"></i><label for="">My Playlist 1</label></li>
    <li class="dropdown-item"><i class="fa-regular me-3 fa-bookmark"></i><label for="">My Playlist 2</label></li>
    <li class="dropdown-item"><i class="fa-regular me-3 fa-bookmark"></i><label for="">My Playlist 3</label></li>
    <li class="dropdown-item"><i class="fa-regular me-3 fa-bookmark"></i><label for="">My Playlist 4</label></li>
    <li class="dropdown-item"><i class="fa-regular me-3 fa-bookmark"></i><label for="">My Playlist 5</label></li>

    </x-slot:playlistadd>
    <x-slot:inputlike>
        <input type="hidden" name="like" id="likedsong" value="">
        <i class="fa-regular fa-heart fs-4 pe-auto text-center" style="color: white;" id="like-btn"></i>   
    </x-slot:inputlike>
    <x-slot:liked>{{ $lLagu }} {{ $lLagu > 1 ? 'Songs' : 'Song'}}</x-slot:liked>
    <x-slot:queue>
        <script>
            // Mengambil data lagu dari localStorage
            storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
    
            // Kirim data lagu ke Blade untuk diproses
            window.addEventListener('DOMContentLoaded', (event) => {
                const queueElement = document.getElementById('queue');
    
                storedSongs.forEach((song, index) => {
                    const label = `
                    <div class="d-flex gap-2" onclick="handleSongClick(${index})">
                        <div class="col-12 col-lg-3">
                            <img style="height: 55px; width: 55px;" src="${song.image}" class="rounded shadow">
                        </div>
                        <div class="col-9 d-none d-lg-block d-flex flex-column justify-content-center">
                            <label for="" class="fs-5 d-none d-lg-block"> ${song.name} </label>
                            <label for="" class="fs-6 d-none d-xl-block"> ${song.artist} </label>
                        </div>
                    </div>
                    `;
                    queueElement.innerHTML += label;
                });
            });
    
            // Fungsi untuk menangani klik
            function handleSongClick(index) {
                // Akses data lagu berdasarkan indeks
                const song = JSON.parse(localStorage.getItem('songs'))[index];
                playAudio(song.audio); // Memutar lagu yang baru ditambahkan
                loadSongData(song)
                likeyy(song)
                // Di sini kamu bisa melakukan tindakan lebih lanjut
                // Misalnya, memutar lagu, menampilkan detail, dll.
            }
            function playAudio(audioSrc) {
                const audioPlayer = document.getElementById('my-audio');
                storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
                //(storedSongs)
                // Hentikan pemutaran jika ada audio yang sedang diputar
                if (!audioPlayer.paused) {
                    audioPlayer.pause();
                    audioPlayer.currentTime = 0; // Reset waktu pemutaran
                }

                // Set audio baru dan mulai memutar
                audioPlayer.src = `/storage/${audioSrc}`;

                // Mulai pemutaran
                audioPlayer.play()
                    .then(() => {
                        document.getElementById('play-pause').classList.remove('fa-play');
                        document.getElementById('play-pause').classList.add('fa-pause');
                    })
                    .catch(error => {
                        console.error('Error playing audio:', error);
                    });

                // Event ketika lagu selesai
                audioPlayer.onended = function () {
                    if (currentSongIndex < storedSongs.length - 1) {
                        currentSongIndex++; // Increment index ke lagu berikutnya
                        let nextSong = storedSongs[currentSongIndex];
                        loadSongData(nextSong); // Memuat data lagu berikutnya
                        likeyy(nextSong.id); // Memuat data lagu berikutnya
                        playAudio(nextSong.audio); // Memutar lagu berikutnya
                    } else {
                        // Jika tidak ada lagi lagu di playlist, set tombol play kembali ke mode play
                        document.getElementById('play-pause').classList.remove('fa-pause');
                        document.getElementById('play-pause').classList.add('fa-play');
                    }
                };
            }
            function likeyy(song){
                        let likedSong = @json($liked)||[];

                        if( likedSong.includes(Number(song.id))  ){
                            document.getElementById('like-btn').classList.add('fa-solid')
                            document.getElementById('like-btn').classList.remove('fa-regular')
                            document.getElementById('like-btn').style.color = "#90EE90";
                        }
                        else{
                            document.getElementById('like-btn').classList.remove('fa-solid')
                            document.getElementById('like-btn').classList.add('fa-regular')    
                        }
                    }
                
                    function loadSongData(song) {

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

                        fetch('/song/seen', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Jika menggunakan Laravel
                            },
                            body: JSON.stringify({ id: song.id })
                        })
                        .then(response => response.json())
                        .then(data => {
                            //('Song seen status updated:', data);
                        })
                        .catch(error => {
                            console.error('Error sending seen status:', error);
                        });
                    }
                    
                currentSongIndex = 0; // Global variable to track the current song index
                    window.next = function() {
                    if (currentSongIndex < storedSongs.length - 1) {
                        currentSongIndex++;
                        let nextSong = storedSongs[currentSongIndex];
                        loadSongData(nextSong);
                        likeyy(nextSong.id);
                        playAudio(nextSong.audio);
                    }else{
                        // Gabungkan rekomendasi ke playlist di localStorage jika diperlukan
                        if (currentSongIndex >= storedSongs.length - 1 || recomend.length > 0) {
                            // Tambahkan rekomendasi ke akhir playlist
                            storedSongs = storedSongs.concat(transformedRecomend); 
                            localStorage.setItem('songs', JSON.stringify(storedSongs));

                            // Reset currentSongIndex untuk memulai lagu rekomendasi
                            currentSongIndex++;
                            let nextSong = storedSongs[currentSongIndex];
                            loadSongData(nextSong); // Memuat data lagu dari rekomendasi
                            likeyy(nextSong.id); // Memuat data lagu dari rekomendasi
                            playAudio(nextSong.audio); // Memutar lagu dari rekomendasi
                        } else {
                            // Jika tidak ada rekomendasi, set tombol play kembali ke mode play
                            document.getElementById('play-pause').classList.remove('fa-pause');
                            document.getElementById('play-pause').classList.add('fa-play');
                        }            
                    }
                }

                // Global function to access previous song
                window.prev = function() {
                    if (currentSongIndex > 0) {
                        currentSongIndex--;
                        let prevSong = storedSongs[currentSongIndex];
                        loadSongData(prevSong);
                        playAudio(prevSong.audio);
                        likeyy(prevSong.id);
                    }
                }
        </script>
    </x-slot:queue>
    <div>
        @csrf
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
                    <div class="d-flex align-items-stretch hoverbutton">
                        <!-- Button untuk informasi utama -->
                        <div id="button{{ $loop->iteration }}" class="d-flex py-2 ps-3 align-items-center col-10 bg-dark bg-opacity-25 mb-0">
                            <label class="me-3" style="width: 5%;">{{ $loop->iteration }}</label> <!-- Nomor urutan -->
                            <img src="{{ url('storage/'.$item->thumb) }}" width="50" height="50" alt="Thumbnail" class="rounded me-3"> <!-- Gambar thumbnail -->
                            <label class="flex-grow-1">{{ $item->name }}</label> <!-- Nama item -->
                            <label class="text-end me-3" style="width: 20%;">{{ $item->dilihat }} Dilihat</label> <!-- Jumlah dilihat -->
                        </div>   
                        <!-- Menu kontrol tambahan -->
                        <div class="d-flex align-items-center justify-content-center gap-3 px-2 col-2 bg-dark bg-opacity-25">
                            <div class="pe-auto" style="z-index: 999">
                                <i class="bi bi-plus-circle d-flex align-items-center add-to-like"></i> <!-- Ikon suka -->
                            </div>
                            <label class="mb-0">{{ date('i:s' ,$item->audio_length) }}</label> <!-- Panjang audio -->
                            <div class="pe-auto" style="z-index: 999">
                                <i class="bi bi-three-dots option d-flex align-items-center"></i> <!-- Ikon opsi lainnya -->
                            </div>
                        </div>
                    </div>                    
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                    // Memuat lagu pertama dari localStorage saat halaman dimuat
                    storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
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
                                if ({{ $loop->iteration }} - 1 === {{ $loop->iteration }}-1) {
                                    song.id = '{{ $plaguItem->id }}';
                                    song.like = '{{ $like }}';
                                }
                            @endforeach
                        @endforeach
                        
                        // Ambil data daaudiori elemen anak
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
                
                        const songExists = storedSongs.some(storedSong => storedSong.name === song.name);
                        const songIndex = storedSongs.findIndex(storedSong => storedSong.name === song.name);

                        
                        if (!songExists) {
                            if(songExists > 1){
                                storedSongs.shift()
                            }
                            storedSongs.unshift (song);
                            localStorage.setItem('songs', JSON.stringify(storedSongs));
                            //('Song object stored:', song);
                            playAudio(song.audio); // Memutar lagu yang baru ditambahkan
                            loadSongData(song)
                            likeyy(song)
                        } else {
                            if (songIndex !== -1) {
                                // Jika lagu sudah ada, hapus dari array
                                storedSongs.splice(songIndex, 1); // Menghapus lagu yang ada
                                //('Song removed:', storedSongs[songIndex]);
                            }

                            // Tambahkan lagu baru ke indeks ke-0
                            storedSongs.unshift(song);
                            localStorage.setItem('songs', JSON.stringify(storedSongs));
                            //('Song object stored:', song);
                            loadSongData(song);
                            likeyy(song);
                            playAudio(song.audio); // Memutar lagu yang baru ditambahkan
                        }
                        playmusic()
                        playsong(song.audio_length); // Mengatur durasi dan memutar lagu
                    });

                    function likeyy(song){
                        let likedSong = @json($liked)||[];

                        if( likedSong.includes(Number(song.id))  ){
                            document.getElementById('like-btn').classList.add('fa-solid')
                            document.getElementById('like-btn').classList.remove('fa-regular')
                            document.getElementById('like-btn').style.color = "#90EE90";
                        }
                        else{
                            document.getElementById('like-btn').classList.remove('fa-solid')
                            document.getElementById('like-btn').classList.add('fa-regular')    
                        }
                    }
                
                    function loadSongData(song) {

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

                        fetch('/song/seen', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Jika menggunakan Laravel
                            },
                            body: JSON.stringify({ id: song.id })
                        })
                        .then(response => response.json())
                        .then(data => {
                            //('Song seen status updated:', data);
                        })
                        .catch(error => {
                            console.error('Error sending seen status:', error);
                        });
                    }
                    
                    function playAudio(audioSrc) {
                        const audioPlayer = document.getElementById('my-audio');
                        audioPlayer.src = `/storage/${audioSrc}`;
                        audioPlayer.play();
                        document.getElementById('play-pause').classList.remove('fa-play');
                        document.getElementById('play-pause').classList.add('fa-pause');
                        let nextfsc = document.getElementById("next-fsc");
                        let prevfsc = document.getElementById("prev-fsc");
                        let next = document.getElementById("next");
                        let prev = document.getElementById("prev");
                    }
                
                    function playsong(duration) {
                        setTimeout(function() {
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
    var recomend = @json($recomend);
            //(recomend)
            // Array untuk menyimpan data yang telah diubah formatnya
            var transformedRecomend = [];
            
            // Gunakan forEach untuk mengubah format data
            @foreach ($recomend as $laguIndex => $laguItem)
                @foreach ($laguItem->plagu as $plaguIndex => $plaguItem)
                    transformedRecomend.push({
                        id: {{ $laguItem->id }}, // Ubah ID ke bentuk string
                        image: `/storage/{{ $laguItem->thumb }}`, // Ubah thumb menjadi URL lengkap
                        name: `{{ $laguItem->name }}`, // Ambil nama asli dari data
                        views: `{{ $laguItem->dilihat }}} Didengar`, // Ubah format dilihat menjadi string dengan "Dilihat"
                        like: "", // Data like (statik atau dinamis)
                        audio_length: {{ $laguItem->audio_length }} || null, // Tetapkan null jika audio_length kosong
                        artist: "{{ $plaguItem->name }}", // Menggunakan nama artis statis atau dari sumber lain
                        artistimg: `{{ $plaguItem->thumb }}`, // Gambar artis
                        audio: "{{ $laguItem->audio }}" // Mengambil dari data asli
                    });
                @endforeach
            @endforeach

    document.getElementById('playAll').addEventListener('click', function () {
        let allSongs = []; // Array untuk menyimpan semua lagu

        // Ambil data dari semua tombol
        const buttons = document.querySelectorAll('[id^="button"]'); // Memilih semua tombol yang diawali dengan "button"

        buttons.forEach((button, index) => {
            const children = button.children;

            let song = {
                id: '',
                image: '',
                name: '',
                views: '',
                like: '',
                audio_length: '',
                artist: '{{ $lagu[0]->name }}', // Ganti jika artist berbeda
                artistimg: '{{ $lagu[0]->thumb }}', // Ganti jika artist berbeda
                audio: ''
            };

            @foreach ($lagu as $laguIndex => $laguItem)
                @foreach ($laguItem->plagu as $plaguIndex => $plaguItem)
                    if (index === {{ $loop->iteration }} - 1) {
                        song.audio = '{{ $plaguItem->audio }}';
                        song.id = '{{ $plaguItem->id }}';
                        song.audio_length = parseAudioLength('{{ $plaguItem->audio_length }}'); // Pastikan ini sudah dalam milidetik
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
                }
            }

            allSongs.push(song); // Tambahkan lagu ke array allSongs
        });

        // Simpan semua lagu di localStorage
        localStorage.setItem('songs', JSON.stringify(allSongs));

        // Memuat dan memutar lagu pertama
        currentSongIndex = 0; // Reset currentSongIndex to 0
        loadSongData(allSongs[currentSongIndex]);
        likeyy(allSongs[currentSongIndex].id);
        playAudio(allSongs[currentSongIndex].audio);
    });

        function parseAudioLength(length) {
            // Ubah format waktu MM:SS menjadi milidetik
            let [minutes, seconds] = length.split(':').map(Number);
            return (minutes * 60 + seconds) * 1000; // Kembalikan dalam milidetik
        }

        function likeyy(song){
            let likedSong = @json($liked)||[];
            console.log(song)
            let likeBtn = document.getElementById('like-btn');

            if (likeBtn.classList.contains('fa-heart') && likeBtn.classList.contains('fa-regular')) {
                document.getElementById('like-btn').addEventListener('click',function(){
                    let id = document.getElementById('likedsong').value;
                    console.log(id)
                    fetch('/user/like', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            song_id: song // Kirim song_id sebagai song_id, bukan 'like'
                        })
                    }).then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    }).then(data => {
                        console.log('Song like status updated:', data);
                    }).catch(error => {
                        console.error('Error:', error.message);
                    });
                })
            } else {
            document.getElementById('like-btn').addEventListener('click',function(){
                    let id = document.getElementById('likedsong').value;
                    console.log(id)
                    fetch('/user/unlike', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            song_id: song // Kirim song_id sebagai song_id, bukan 'like'
                        })
                    }).then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    }).then(data => {
                        console.log('Song like status updated:', data);
                    }).catch(error => {
                        console.error('Error:', error.message);
                    });
                })
            }
            if( likedSong.includes(Number(song))  ){
                document.getElementById('like-btn').classList.add('fa-solid')
                document.getElementById('like-btn').classList.remove('fa-regular')
                document.getElementById('like-btn').style.color = "#90EE90";
            }
            else{
                document.getElementById('like-btn').classList.remove('fa-solid')
                document.getElementById('like-btn').classList.add('fa-regular')    
                document.getElementById('like-btn').style.color = "#ffff";
            }
        }

                function loadSongData(song) {
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

                currentSongIndex = 0; // Global variable to track the current song index
                let storedSongs = JSON.parse(localStorage.getItem('songs')) || []; // Retrieve songs from localStorage
                window.next = function() {
                    if (currentSongIndex < storedSongs.length - 1) {
                        currentSongIndex++;
                        let nextSong = storedSongs[currentSongIndex];
                        loadSongData(nextSong);
                        likeyy(nextSong.id);
                        playAudio(nextSong.audio);
                    }else{
                        // Gabungkan rekomendasi ke playlist di localStorage jika diperlukan
                        if (currentSongIndex >= storedSongs.length - 1 || recomend.length > 0) {
                            // Tambahkan rekomendasi ke akhir playlist
                            storedSongs = storedSongs.concat(transformedRecomend); 
                            localStorage.setItem('songs', JSON.stringify(storedSongs));

                            // Reset currentSongIndex untuk memulai lagu rekomendasi
                            currentSongIndex++;
                            let nextSong = storedSongs[currentSongIndex];
                            loadSongData(nextSong); // Memuat data lagu dari rekomendasi
                            likeyy(nextSong.id); // Memuat data lagu dari rekomendasi
                            playAudio(nextSong.audio); // Memutar lagu dari rekomendasi
                        } else {
                            // Jika tidak ada rekomendasi, set tombol play kembali ke mode play
                            document.getElementById('play-pause').classList.remove('fa-pause');
                            document.getElementById('play-pause').classList.add('fa-play');
                        }            
                    }
                }

                // Global function to access previous song
                window.prev = function() {
                    if (currentSongIndex > 0) {
                        currentSongIndex--;
                        let prevSong = storedSongs[currentSongIndex];
                        loadSongData(prevSong);
                        playAudio(prevSong.audio);
                        likeyy(prevSong.id);
                    }
                }

        function playAudio(audioSrc) {
            const audioPlayer = document.getElementById('my-audio');
            storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
            //(storedSongs)
            // Hentikan pemutaran jika ada audio yang sedang diputar
            if (!audioPlayer.paused) {
                audioPlayer.pause();
                audioPlayer.currentTime = 0; // Reset waktu pemutaran
            }

            // Set audio baru dan mulai memutar
            audioPlayer.src = `/storage/${audioSrc}`;

            // Mulai pemutaran
            audioPlayer.play()
                .then(() => {
                    document.getElementById('play-pause').classList.remove('fa-play');
                    document.getElementById('play-pause').classList.add('fa-pause');
                })
                .catch(error => {
                    console.error('Error playing audio:', error);
                });

            // Event ketika lagu selesai
            audioPlayer.onended = function () {
                if (currentSongIndex < storedSongs.length - 1) {
                    currentSongIndex++; // Increment index ke lagu berikutnya
                    let nextSong = storedSongs[currentSongIndex];
                    loadSongData(nextSong); // Memuat data lagu berikutnya
                    likeyy(nextSong.id); // Memuat data lagu berikutnya
                    playAudio(nextSong.audio); // Memutar lagu berikutnya
                } else {
                    // Jika tidak ada lagi lagu di playlist, set tombol play kembali ke mode play
                    document.getElementById('play-pause').classList.remove('fa-pause');
                    document.getElementById('play-pause').classList.add('fa-play');
                }
            };
        }
    </script>
</x-mainpage>
