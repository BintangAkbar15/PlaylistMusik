<x-mainpage>
    {{-- {{ dd($recomend) }} --}}
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
    <x-slot:queue>
        <script>
            // Mengambil data lagu dari localStorage
            const storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
    
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
                let storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
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
                    
                let currentSongIndex = 0; // Global variable to track the current song index
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
    <x-slot:liked>{{ $lLagu }} {{ $lLagu > 1 ? 'Songs' : 'Song'}}</x-slot:liked>
    <x-slot:inputlike>
        <input type="hidden" name="like" id="likedsong" value="">
        <i class="{{ 1==1 ? 'fa-regular fa-heart': 'fa-solid fa-heart' }} fs-4 pe-auto text-center" style="color: white;" id="like-btn"></i>   
    </x-slot:inputlike>
    <x-slot:playlistadd> {{ $playlistadd }} </x-slot:playlistadd>
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
            <label for="" class="fs-4 mt-4" style="color: white">Artist</label>
            <div class="col-12 d-flex flex-column flex-md-row">
                <div class="col-md-6 p-2 col-12">
                    @forelse ($new as $item)
                        @if ($loop->iteration % 2 == 1)
                        <a href="{{ route('artist',$item->slug) }}">
                            <div class="col-12 p-2 d-flex align-items-center m-2 gap-3 bg-dark rounded">
                                <img src="{{ url($item->thumb ? 'storage/'.$item->thumb : 'img/dumpimg.png') }}" style="object-fit: cover" width="40px" height="40px" alt="">
                                <label for="" class="fs-6">{{ $item->name }}</label>
                            </div>        
                        </a>
                        @endif
                    @empty
                        
                    @endforelse
                </div>
                <div class="col-6 p-2 d-none d-md-block">
                    @forelse ($new as $item)
                        @if ($loop->iteration % 2 == 0)
                        <a href="{{ route('artist',$item->slug) }}">
                            <div class="col-12 p-2 d-flex align-items-center m-2 gap-3 bg-dark rounded">
                                <img src="{{ url($item->thumb ? 'storage/'.$item->thumb : 'img/dumpimg.png') }}" style="object-fit: cover" width="40px" height="40px" alt="">
                                <label for="" class="fs-6">{{ $item->name }}</label>
                            </div>        
                        </a>
                        @endif
                    @empty
                        
                    @endforelse
                </div>
            </div>
            <label for="" class="fs-4 mt-4" style="color: white">Recomended For You</label>
            <div class="col-12 d-flex justify-content-evenly overflow-x-auto">
                @forelse ($recomend as $item)
                    <div class="p-2 d-flex flex-column align-items-center gap-2" 
                        {{-- {{ dd($item) }} --}}
                        onmouseenter="this.classList.add('bg-secondary')" 
                        onmouseleave="this.classList.remove('bg-secondary')">
                        <img src="{{ url($item->thumb ? 'storage/'.$item->thumb : 'img/dumpimg.png') }}" class="rounded" width="140px" height="140px" alt="">
                        <label for="" class="fs-6" style="color: white; text-align: center">{{$item->name}}</label>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Initialize variables
                            var recomend = @json($recomend);
                            var transformedRecomend = [];
                            var currentSongIndex = 0;
                            var storedSongs = JSON.parse(localStorage.getItem('songs')) || [];

                            // Populate transformedRecomend array
                            recomend.forEach(function(laguItem, laguIndex) {
                                laguItem.plagu.forEach(function(plaguItem, plaguIndex) {
                                    transformedRecomend.push({
                                        id: laguItem.id,
                                        image: `/storage/${laguItem.thumb}`,
                                        name: laguItem.name,
                                        views: `${laguItem.dilihat} Dilihat`,
                                        audio_length: laguItem.audio_length || null,
                                        artist: plaguItem.name,
                                        artistimg: plaguItem.thumb,
                                        audio: laguItem.audio
                                    });
                                });
                            });

                            console.log(transformedRecomend);

                            // Function to load song data
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

                                // Send a request to update seen status (if necessary)
                                fetch('/song/seen', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify({ id: song.id })
                                }).then(response => response.json())
                                .then(data => {
                                    console.log('Song seen status updated:', data);
                                }).catch(error => {
                                    console.error('Error sending seen status:', error);
                                });
                            }

                            // Function to play audio
                            function playAudio(audioSrc) {
                                const audioPlayer = document.getElementById('my-audio');

                                // Stop any playing audio before starting a new one
                                if (!audioPlayer.paused) {
                                    audioPlayer.pause();
                                    audioPlayer.currentTime = 0; // Reset time
                                }

                                // Set the new audio source and play
                                audioPlayer.src = `/storage/${audioSrc}`;
                                audioPlayer.play()
                                    .then(() => {
                                        document.getElementById('play-pause').classList.remove('fa-play');
                                        document.getElementById('play-pause').classList.add('fa-pause');
                                    })
                                    .catch(error => {
                                        console.error("Error playing audio:", error);
                                    });

                                // Handle when the audio ends
                                audioPlayer.onended = function() {
                                    if (currentSongIndex < storedSongs.length - 1) {
                                        // Play next song if available
                                        currentSongIndex++;
                                        let nextSong = storedSongs[currentSongIndex];
                                        loadSongData(nextSong);
                                        playAudio(nextSong.audio);
                                    } else if (transformedRecomend.length > 0) {
                                        // Add recommended songs to playlist and play next
                                        storedSongs = storedSongs.concat(transformedRecomend);
                                        localStorage.setItem('songs', JSON.stringify(storedSongs));

                                        currentSongIndex++;
                                        let nextSong = storedSongs[currentSongIndex];
                                        loadSongData(nextSong);
                                        playAudio(nextSong.audio);
                                    } else {
                                        // If no songs are left, reset the play button
                                        document.getElementById('play-pause').classList.remove('fa-pause');
                                        document.getElementById('play-pause').classList.add('fa-play');
                                    }
                                };
                            }

                            // If songs are stored, load the first song on page load
                            if (storedSongs.length > 0) {
                                loadSongData(storedSongs[0]);
                            }

                            // Add event listeners for song buttons
                            document.querySelectorAll('[id^=button]').forEach((button, index) => {
                                button.addEventListener('click', function() {
                                    let songAudio = document.getElementById(`audio${index + 1}`).innerText;
                                    playAudio(songAudio);
                                });
                            });
                        });

                    </script>
                @empty
                    
                @endforelse
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
                    <a href="{{ route('user.genre',$item->slug) }}">
                        <div class="p-2 d-flex flex-column align-items-center gap-2 justify-content-center rounded"onmouseenter="this.classList.add('bg-secondary')" onmouseleave="this.classList.remove('bg-secondary')" style="width: 140px; height: 160px; background: {{ $item->color }};">
                            <label for="" class="fs-3 {{ (isBright($item->color) ? 'text-dark' : 'text-light') }}">{{ $item->name }}</label>
                        </div>
                    </a>
                    @if ($loop->iteration == 3)
                        <a href="{{ route('genre.all') }}">
                            <div class="p-0 d-flex flex-column align-items-center gap-2">
                                <div style="width: 140px; height: 160px; color: white" class="d-flex gap-3 flex-column rounded bg-dark justify-content-center align-items-center">
                                    <i class="fa-solid fa-circle-arrow-right" style="font-size: 50px"></i>
                                    <label for="" class="fs-5" style="color: white">More</label>
                                </div>
                            </div>
                        </a>
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
                        <a href="{{ route('artist.all') }}">
                            <div class="p-2 d-flex flex-column align-items-center gap-2">
                                <div style="width: 140px; height: 160px; color: white" class="d-flex gap-3 flex-column rounded bg-dark justify-content-center align-items-center">
                                    <i class="fa-solid fa-circle-arrow-right" style="font-size: 50px"></i>
                                    <label for="" class="fs-5" style="color: white">More</label>
                                </div>
                            </div>
                        </a>
                        @break
                    @endif
                @empty
                    
                @endforelse
            </div>
        </div>        
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var recomend = @json($recomend);
            console.log(recomend)
            // Array untuk menyimpan data yang telah diubah formatnya
            var transformedRecomend = [];
            
            // Gunakan forEach untuk mengubah format data
            @foreach ($recomend as $laguIndex => $laguItem)
                @foreach ($laguItem->plagu as $plaguIndex => $plaguItem)
                    transformedRecomend.push({
                        id: {{ $laguItem->id }}, // Ubah ID ke bentuk string
                        image: `/storage/{{ $laguItem->thumb }}`, // Ubah thumb menjadi URL lengkap
                        name: `{{ $laguItem->name }}`, // Ambil nama asli dari data
                        views: `{{ $laguItem->dilihat }}} Dilihat`, // Ubah format dilihat menjadi string dengan "Dilihat"
                        like: "", // Data like (statik atau dinamis)
                        audio_length: {{ $laguItem->audio_length }} || null, // Tetapkan null jika audio_length kosong
                        artist: "{{ $plaguItem->name }}", // Menggunakan nama artis statis atau dari sumber lain
                        artistimg: `{{ $plaguItem->thumb }}`, // Gambar artis
                        audio: "{{ $laguItem->audio }}" // Mengambil dari data asli
                    });
                @endforeach
            @endforeach
            

            
            console.log(transformedRecomend)
                // Memuat lagu pertama dari localStorage saat halaman dimuat
                let storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
                if (storedSongs.length > 0) {
                    loadSongData(storedSongs[0]);
                    playAudio(storedSongs)
                }        
                playmusic()
                
            
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
                        console.log('Song seen status updated:', data);
                    })
                    .catch(error => {
                        console.error('Error sending seen status:', error);
                    });
                }
            
                function playAudio(audioSrc = storedSongs.audio) {
                    const audioPlayer = document.getElementById('my-audio');
                    let storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
                    console.log(storedSongs)
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
                            console.error("Error playing audio:", error);
                        });
                    
                    // Event ketika lagu selesai
                    audioPlayer.onended = function() {
                        let storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
                        
                        if (currentSongIndex < storedSongs.length - 1) {
                            // Masih ada lagu di playlist yang tersisa
                            currentSongIndex++; // Increment ke lagu berikutnya
                            let nextSong = storedSongs[currentSongIndex];
                            loadSongData(nextSong); // Memuat data lagu berikutnya
                            playAudio(nextSong.audio); // Memutar lagu berikutnya
                        } else {
                            // Playlist sudah habis, tambahkan lagu rekomendasi ke localStorage
                            if (currentSongIndex >= storedSongs.length - 1 || recomend.length > 0) {
                                // Tambahkan rekomendasi ke akhir playlist
                                storedSongs = storedSongs.concat(transformedRecomend); 
                                localStorage.setItem('songs', JSON.stringify(storedSongs));

                                // Reset currentSongIndex untuk memulai lagu rekomendasi
                                currentSongIndex++;
                                let nextSong = storedSongs[currentSongIndex];
                                loadSongData(nextSong); // Memuat data lagu dari rekomendasi
                                playAudio(nextSong.audio); // Memutar lagu dari rekomendasi
                            } else {
                                // Jika tidak ada rekomendasi, set tombol play kembali ke mode play
                                document.getElementById('play-pause').classList.remove('fa-pause');
                                document.getElementById('play-pause').classList.add('fa-play');
                            }
                        }
                    };
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
                let currentSongIndex = 0; // Global variable to track the current song index
    
                // Global function to access next song
                window.next = function() {
                    if (currentSongIndex < storedSongs.length - 1) {
                        currentSongIndex++;
                        let nextSong = storedSongs[currentSongIndex];
                        loadSongData(nextSong);
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
                    }
                }
            });
    </script>
</x-mainpage>