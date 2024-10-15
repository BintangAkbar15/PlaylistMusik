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
let timeprogres =  document.getElementById('progres-time');
let minimize = document.getElementById('minimize')
let maximize = document.getElementById('maximaze')
let input = document.getElementById('search-field')

like.addEventListener('click', function() {
    if (like.classList.contains('fa-regular')) {
        like.classList.remove('fa-regular');
        like.classList.add('fa-solid');
        like.style.color = "#90EE90";
    } else {
        like.classList.remove('fa-solid');
        like.classList.add('fa-regular');
        like.style.color = "white";
    }
});

audio.volume = volumelevel.value / 100;
volumelevel.addEventListener('input', function() {
    audio.volume = volumelevel.value / 100;
});

audio.onloadedmetadata = function() {
    progres.max = audio.duration;
    progres.value = audio.currentTime;
};

let progressInterval;

playpause.addEventListener('click', function() {
    if (playpause.classList.contains('fa-play')) {
        audio.play();
        playpause.classList.remove('fa-play');
        playpause.classList.add('fa-pause');
        progressInterval = setInterval(() => {
            progres.value = audio.currentTime;
        }, 500);
    } else {
        audio.pause();
        playpause.classList.remove('fa-pause');
        playpause.classList.add('fa-play');
        clearInterval(progressInterval);
    }
});

audio.ontimeupdate = function() {
    progres.value = audio.currentTime;
};

progres.oninput = function() {
    audio.currentTime = progres.value;
};

progres.onchange = function() {
    if (audio.paused && playpause.classList.contains('fa-play')) {
        audio.play();
        playpause.classList.remove('fa-play');
        playpause.classList.add('fa-pause');

        progressInterval = setInterval(() => {
            progres.value = audio.currentTime;
        }, 1000);
    }
};

function togglePlayPause() {
    if (audio.paused) {
        audio.play();
        playpause.classList.remove('fa-play');
        playpause.classList.add('fa-pause');
    } else {
        audio.pause();
        playpause.classList.remove('fa-pause');
        playpause.classList.add('fa-play');
    }
}

document.addEventListener('keydown', function(event) {
    if (event.code === 'Space') {
        event.preventDefault();
        if(document.activeElement !== input){
            togglePlayPause();
        }
    }
});

audio.addEventListener('pause', function() {
    playpause.classList.remove('fa-pause');
    playpause.classList.add('fa-play');
});

let maininterval; 

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const secs = Math.floor(seconds % 60);
    return `${minutes < 10 ? '0' + minutes : minutes}:${secs < 10 ? '0' + secs : secs}`;
}

audio.onloadedmetadata = function() {
    progres.max = audio.duration; 
    timeend.innerText = formatTime(audio.duration);
};

audio.addEventListener('play', function() {
    progressInterval = setInterval(() => {
        progres.value = audio.currentTime; 
        timeprogres.innerText = formatTime(audio.currentTime);
    }, 500);
});

audio.addEventListener('pause', function() {
    clearInterval(progressInterval);
});

audio.addEventListener('ended', function() {
    clearInterval(progressInterval);
    progres.value = 0;
    timeprogres.innerText = formatTime(0); 
});

progres.oninput = function() {
    audio.currentTime = progres.value;
};

repeat.addEventListener('click', function() {
    if (audio.hasAttribute('loop')) {
        audio.removeAttribute('loop');
        repeat.style.color = 'gray'; 
    } else {
        audio.setAttribute('loop', '');
        repeat.style.color = 'white'; 
    }
});


minimize.addEventListener('click', function(){
    document.getElementById('fullscreen').style.display = 'none';
    document.getElementById('normalpage').style.display = 'flex';
})

maximize.addEventListener('click', function(){
    document.getElementById('normalpage').style.display = 'none';
    document.getElementById('fullscreen').style.display = 'block';
})