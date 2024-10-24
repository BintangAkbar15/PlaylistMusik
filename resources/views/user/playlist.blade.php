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
                        <img src="{{ url('img/dumpimg.png') }}" class="img-fluid d-lg-block d-none" style="max-height: 55px" alt="">
                        <img src="{{ url('img/dumpimg.png') }}" class="img-fluid d-lg-none" alt="">
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
        <i class="{{ 1==1 ? 'fa-regular fa-heart': 'fa-solid fa-heart' }} fs-4 pe-auto text-center" style="color: white;" id="like-btn"></i>   
    </x-slot:inputlike>
    <x-slot:liked>{{ $lLagu }} {{ $lLagu > 1 ? 'Songs' : 'Song'}}</x-slot:liked>
    <div>
        @csrf
        <div class="col-12 rounded-top px-5 py-3 d-flex flex-column justify-content-end"
            style="height: 400px; background: url('{{ url('img/background-dump.jpeg') }}'); color: white; background-size: cover;">
            <div class="d-flex flex-row gap-3 align-items-end">
                <div class="col-12 col-lg-3">
                    <img src="{{ url($item->thumb ? 'storage/'.$item->thumb : 'img/dumpimg.png') }}" class="img-fluid" style="object-fit: cover;width: 200px" alt="">
                </div>
                <div class="">
                    <h5 class="mb-1">{{ Auth::user()->name }}'s Playlist</h5>
                    <div class="d-flex align-items-center">
                        <h1 class="mt-5">{{ $pname[0]->name }}</h1>
                        <a href="{{ route('playlist.change',$pname[0]->name) }}"><i class="ms-2 fa-solid fa-pen" style="cursor: pointer"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex p-4 flex-column" style="background: rgb(104, 104, 104, 0.5); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);">
            <button id="playAll" class="rounded-circle btn bg-success text-dark d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                <i class="fa-solid fa-play"></i>
            </button>
            <div class="d-flex flex-column col-12 mt-2">
                <div class="d-flex align-items-stretch">
                    <!-- Button untuk informasi utama -->
                    <div  class="d-flex py-2 ps-3 align-items-center col-10 bg-dark bg-opacity-25 mb-0">
                        <label class="me-3" style="width: 5%;">#</label> <!-- Nomor urutan -->
                        <label class="me-3" style="width: 5%;">Image</label> <!-- Nomor urutan -->
                        <label class="ms-5  flex-grow-1">Title</label> <!-- Nama item -->
                        <label class="text-end me-3" style="width: 20%;">Seen</label> <!-- Jumlah dilihat -->
                    </div>   
                    <!-- Menu kontrol tambahan -->
                    <div class="d-flex align-items-center justify-content-center gap-3 px-2 col-2 bg-dark bg-opacity-25">
                        <label class="mb-0">Action</label> <!-- Panjang audio -->
                    </div>
                </div>              
                @forelse ($lagu as $item)
                    @forelse ($item->plagu as $item)
                    <div class="d-flex align-items-stretch hoverbutton">
                        <!-- Button untuk informasi utama -->
                        <div id="button{{ $loop->iteration }}" class="d-flex py-2 ps-3 align-items-center col-10 bg-dark bg-opacity-25 mb-0">
                            <label class="me-3" style="width: 5%;">{{ $loop->iteration }}</label> <!-- Nomor urutan -->
                            <img src="{{ url('storage/'.$item->thumb) }}" width="50" height="50" alt="Thumbnail" class="rounded me-3"> <!-- Gambar thumbnail -->
                            <label class="flex-grow-1">{{ $item->name }}</label> <!-- Nama item -->
                            <label class="text-end me-3" style="width: 20%;">{{ $item->dilihat }} Dilihat</label> <!-- Jumlah dilihat -->
                        </div>   
                        <!-- Menu kontrol tambahan -->
                        <div class="d-flex align-items-center justify-content-center gap-3 px-2 col-2 bg-dark bg-opacity-25" 
                            onmouseover="falseplay()" 
                            onmouseout="trueplay()">
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
                            artist: '',
                            artistimg: '',
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
                    @empty
                    <div class="d-flex align-items-stretch">
                        <!-- Button untuk informasi utama -->
                        <div  class="d-flex py-2 ps-3 align-items-center col-10 bg-dark bg-opacity-25 mb-0">
                            <label class="text-end me-3" style="width: 20%;">Seen</label> <!-- Jumlah dilihat -->
                        </div>   
                        <!-- Menu kontrol tambahan -->
                        <div class="d-flex align-items-center justify-content-center gap-3 px-2 col-2 bg-dark bg-opacity-25">
                            <label class="mb-0"></label> <!-- Panjang audio -->
                        </div>
                    </div>        
                    @endforelse
                @empty
                    <div class="d-flex align-items-stretch">
                        <!-- Button untuk informasi utama -->
                        <div  class="d-flex py-2 ps-3 align-items-center col-10 bg-dark bg-opacity-25 mb-0">
                            <label class="text-center flex-grow-1" style="width: 100%;">No Data Found</label> <!-- Jumlah dilihat -->
                        </div>   
                        <!-- Menu kontrol tambahan -->
                        <div class="d-flex align-items-center justify-content-center gap-3 px-2 col-2 bg-dark bg-opacity-25">
                            <label class="mb-0"></label> <!-- Panjang audio -->
                        </div>
                    </div>        
                @endforelse
            </div>
        </div>
    </div>
    <script>
    document.getElementById('playAll').addEventListener('click', function() {
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
            artist: '', // Ganti jika artist berbeda
            artistimg: '', // Ganti jika artist berbeda
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
    console.log('All songs stored:', allSongs);

    // Memuat dan memutar lagu pertama
    loadSongData(allSongs[0]);
    playAudio(allSongs[0].audio);
});

function parseAudioLength(length) {
    // Ubah format waktu MM:SS menjadi milidetik
    let [minutes, seconds] = length.split(':').map(Number);
    return (minutes * 60 + seconds) * 1000; // Kembalikan dalam milidetik
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

currentSongIndex = 0; // Inisialisasi indeks lagu saat ini

function playAudio(audioSrc) {
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
        
        // Lanjutkan ke lagu berikutnya berdasarkan indeks
        if (currentSongIndex < storedSongs.length - 1) {
            currentSongIndex++; // Increment index ke lagu berikutnya
            let nextSong = storedSongs[currentSongIndex];
            loadSongData(nextSong); // Memuat data lagu berikutnya
            playAudio(nextSong.audio); // Memutar lagu berikutnya
        } else {
            // Jika tidak ada lagi lagu di playlist, set tombol play kembali ke mode play
            document.getElementById('play-pause').classList.remove('fa-pause');
            document.getElementById('play-pause').classList.add('fa-play');
        }
    };
}
    </script>
    <script>
        const inputFile = document.getElementById('thumb');
        const previewContainer = document.getElementById('preview-container');
        const imageIcon = document.getElementById('image-icon');

        inputFile.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Create a new image element
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100%'; // Set image width to fill the container
                    img.style.height = '100%'; // Set image height to fill the container
                    img.style.objectFit = 'cover';
                    img.className = 'rounded'; // Add Bootstrap rounded class

                    // Clear the preview container and append the image
                    previewContainer.innerHTML = '';
                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
                // Hide the icon when image is uploaded
                imageIcon.style.display = 'none';
            }
        });
    </script>
    
</x-mainpage>
