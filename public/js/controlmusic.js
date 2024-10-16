function playmusic() {
    // Mengambil elemen-elemen dari DOM
    let next = document.getElementById("next");
    let prev = document.getElementById("prev");
    let playpause = document.getElementById("play-pause");
    let repeat = document.getElementById("repeat");
    let shuffle = document.getElementById("shuffle");
    let like = document.getElementById("like-btn");
    let volumelevel = document.getElementById('volume');
    let audio = document.getElementById("my-audio");
    let progres = document.getElementById('customRange1');
    let timeend = document.getElementById('end-time');
    let timeprogres = document.getElementById('progres-time');
    let minimize = document.getElementById('minimize');
    let maximize = document.getElementById('maximize');
    let input = document.getElementById('search-field');
    let containertitle = document.getElementById('container-cover');
    let contenttitle = document.getElementById('content-title');
    let marquee = document.getElementById('marquee');
    let normaltitle = document.getElementById('normal-title');

    document.addEventListener('DOMContentLoaded', function() {
        // Ambil data dari localStorage
        let storedSongs = JSON.parse(localStorage.getItem('songs')) || [];
        if (storedSongs.length > 0) {
            loadSongData(storedSongs[0]);
        } else {
            console.log('No songs found in localStorage.');
        }

        // Event listener untuk tombol like
        like.addEventListener('click', toggleLike);

        // Atur volume audio awal
        audio.volume = volumelevel.value / 100;
        volumelevel.addEventListener('input', updateVolume);

        // Event listeners untuk audio
        audio.onloadedmetadata = updateMetadata;
        playpause.addEventListener('click', togglePlayPause);
        progres.oninput = updateCurrentTime;
        progres.onchange = handleProgresChange;

        document.addEventListener('keydown', handleKeydown);
        audio.addEventListener('play', updateProgressInterval);
        audio.addEventListener('pause', clearProgressInterval);
        audio.addEventListener('ended', resetAudio);

        repeat.addEventListener('click', toggleRepeat);
        minimize.addEventListener('click', minimizeFullscreen);
        maximize.addEventListener('click', maximizeFullscreen);

        checkOverflow();
    });

    // Fungsi untuk memuat data lagu ke elemen-elemen
    function loadSongData(song) {
        console.log(song.name);
        document.getElementById('img-info-artist').src = song.image;
        document.getElementById('name-info-artist').textContent = song.name;
        
        let artistUtility = document.querySelectorAll('.artist-name');
        artistUtility.forEach(el => el.textContent = song.name);

        document.getElementById('normal-title').textContent = song.name;
        document.getElementById('image-song').src = song.image;

        let botSongName = document.querySelector('.songname');
        let botArtistName = document.querySelector('.artist-name');
        botSongName.textContent = song.name;
        botArtistName.textContent = song.name;

        let botImage = document.querySelector('.songimg');
        botImage.src = song.image;

        document.querySelector('.fs-2.fw-bold.songname').textContent = song.name;
        document.querySelector('.fs-5.artist-name').textContent = song.name;

        // Mengatur sumber audio
        audio.src = `/storage/${song.audio}`;
    }

    // Fungsi untuk toggle like button
    function toggleLike() {
        if (like.classList.contains('fa-regular')) {
            like.classList.remove('fa-regular');
            like.classList.add('fa-solid');
            like.style.color = "#90EE90"; // Warna hijau
        } else {
            like.classList.remove('fa-solid');
            like.classList.add('fa-regular');
            like.style.color = "white"; // Warna putih
        }
    }

    // Fungsi untuk mengupdate volume audio
    function updateVolume() {
        audio.volume = volumelevel.value / 100;
    }

    // Fungsi untuk mengupdate metadata audio
    function updateMetadata() {
        progres.max = audio.duration;
        timeend.innerText = formatTime(audio.duration);
    }

    // Fungsi untuk toggle play/pause
    function togglePlayPause() {
        if (playpause.classList.contains('fa-play')) {
            audio.play();
            playpause.classList.remove('fa-play');
            playpause.classList.add('fa-pause');
            updateProgressInterval();
        } else {
            audio.pause();
            playpause.classList.remove('fa-pause');
            playpause.classList.add('fa-play');
            clearProgressInterval();
        }
    }

    // Fungsi untuk mengupdate waktu audio saat diputar
    function updateProgressInterval() {
        let progressInterval = setInterval(() => {
            progres.value = audio.currentTime;
            timeprogres.innerText = formatTime(audio.currentTime);
        }, 500);
        audio.progressInterval = progressInterval; // Simpan interval dalam audio
    }

    // Fungsi untuk menghapus interval progres
    function clearProgressInterval() {
        clearInterval(audio.progressInterval);
        playpause.classList.remove('fa-pause');
        playpause.classList.add('fa-play');
    }

    // Fungsi untuk mengatur waktu saat slider diubah
    function updateCurrentTime() {
        audio.currentTime = progres.value;
    }

    // Fungsi untuk menangani perubahan pada slider
    function handleProgresChange() {
        if (audio.paused && playpause.classList.contains('fa-play')) {
            audio.play();
            playpause.classList.remove('fa-play');
            playpause.classList.add('fa-pause');
            updateProgressInterval();
        }
    }

    // Fungsi untuk menangani penekanan tombol
    function handleKeydown(event) {
        if (event.code === 'Space') {
            event.preventDefault();
            if (document.activeElement !== input) {
                togglePlayPause();
            }
        }
    }

    // Fungsi untuk mereset audio
    function resetAudio() {
        clearProgressInterval();
        progres.value = 0;
        timeprogres.innerText = formatTime(0);
    }

    // Fungsi untuk mengubah format waktu
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${minutes < 10 ? '0' + minutes : minutes}:${secs < 10 ? '0' + secs : secs}`;
    }

    // Fungsi untuk toggle repeat
    function toggleRepeat() {
        if (audio.hasAttribute('loop')) {
            audio.removeAttribute('loop');
            repeat.style.color = 'gray';
        } else {
            audio.setAttribute('loop', '');
            repeat.style.color = 'white';
        }
    }

    // Fungsi untuk meminimalkan tampilan penuh
    function minimizeFullscreen() {
        document.getElementById('fullscreen').style.display = 'none';
        document.getElementById('normalpage').style.display = 'flex';
    }

    // Fungsi untuk memaksimalkan tampilan penuh
    function maximizeFullscreen() {
        document.getElementById('normalpage').style.display = 'none';
        document.getElementById('fullscreen').style.display = 'block';
    }

    // Fungsi untuk memeriksa overflow teks
    function checkOverflow() {
        if (contenttitle.scrollWidth > containertitle.clientWidth) {
            marquee.style.display = 'block';
            normaltitle.style.display = 'none';
        } else {
            marquee.style.display = 'none';
            normaltitle.style.display = 'block';
        }
    }
}

// Panggil fungsi playmusic saat halaman dimuat
playmusic();
