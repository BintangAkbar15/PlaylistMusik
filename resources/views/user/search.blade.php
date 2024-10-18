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
    <x-slot:inputlike>
        <input type="hidden" name="like" id="likedsong" value="">
        <i class="fa-regular fa-heart fs-4 pe-auto text-center" style="color: white;" id="like-btn"></i>   
    </x-slot:inputlike>
    <x-slot:liked>{{ $lLagu }} {{ $lLagu > 1 ? 'Songs' : 'Song'}}</x-slot:liked>
    <div class="col-12 pt-4 px-4 bg-dark">
        <div class="col-12 rounded p-2 mt-2 d-flex flex-column flex-md-row">
            <div class="col-md-6 col-12 d-flex flex-column">
                <h3>Top result</h3>
                <div class="col-12 d-flex flex-column bg-secondary bg-opacity-50 p-4 rounded gap-3" id="top-Song">
                    <img src="{{ url('storage/'.$lagu[0]->thumb) }}" width="100px" alt="">
                    <div class="d-flex flex-column justify-content-center">
                        <h5>{{ $lagu[0]->name }}</h5>
                        <label for=""><i class="bi bi-check-circle-fill" style="color: rgb(80, 80, 255)"></i> Song &#8226 {{ $artist[0]->name }}</label>
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

                    document.getElementById('top-Song').addEventListener('click',function(){
                
                        let song = {
                            image: '{{ url("storage/".$lagu[0]->thumb) }}',
                            name: '{{ $lagu[0]->name }}',
                            views: '{{ $lagu[0]->dilihat }}',
                            audio_length: '{{ $lagu[0]->audio_length }}',
                            like: '',
                            artist: '{{ $lagu[0]->plagu[0]->name }}',
                            artistimg: '{{ $lagu[0]->plagu[0]->thumb }}',
                            audio: '{{ $lagu[0]->audio }}'
                        };
                
                        let storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
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
                        document.getElementById('play-pause').classList.remove('fa-play');
                        document.getElementById('play-pause').classList.add('fa-pause');
                        let nextfsc = document.getElementById("next-fsc");
                        let prevfsc = document.getElementById("prev-fsc");
                        let next = document.getElementById("next");
                        let prev = document.getElementById("prev");
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
                
            })
                </script>
            </div>
            <div class="col-12 col-md-6 mt-3 mt-md-0 ps-2 gap-1 ">
                <h3>Songs</h3>
                @foreach($artist as $items)
                    @foreach($items->plagu as $value)
                        <div class="col-12 p-2 d-flex gap-3 bg-light bg-opacity-25 text-light" id="button{{$loop->iteration}}" data-index={{ $loop->iteration - 1 }}>
                            <img src="{{ url('storage/'.$value->thumb) }}" width="40px" class="rounded" alt="">
                                <div class="d-flex flex-column">
                                <label for="" style="font-size: 14px" class="fw-bold">{{$items->plagu[$loop->iteration - 1]->name}}</label>
                                <label for="" style="font-size: 10px">{{$items->name}}</label>
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
                        
                        const button = document.getElementById('button{{ $loop->iteration }}').getAttribute('data-index');
                        
                        let song = {
                            image: '{{ url("storage/".$value->thumb) }}',
                            name: '{{ $value->name }}',
                            views: '{{ $value->dilihat }}',
                            audio_length: '{{ $value->audio_length }}',
                            like: '',
                            artist: '{{ $items->name }}',
                            artistimg: '{{ $items->thumb }}',
                            audio: '{{ $value->audio }}'
                        };
                
                        let storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
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
        <label for="" class="fs-4 mt-4" style="color: white">Genre</label>
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
    </div>
</x-mainpage>