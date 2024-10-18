let buttonplaylist = document.getElementById('show-playlist')
let buttonqueue = document.getElementById('show-queue')
let playlist = document.getElementById('side-playlist')
let queue = document.getElementById('side-queue')

var playlistctrl = 0;
var queuectrl = 0;

function control(){

    if(playlistctrl == 1){
        if(queue.style.display == 'block'){
            queue.style.display = 'none'
            playlist.style.display = 'block'
            playlistctrl = 0;
        }else{
            playlist.style.display = 'block'
            playlistctrl = 0;
        }
    }

    if(queuectrl == 1){
        if(playlist.style.display == 'block'){
            playlist.style.display = 'none'
            queue.style.display = 'block'
            queuectrl = 0;
        }else{
            queue.style.display = 'block'
            queuectrl = 0;
        }
    }

}

buttonplaylist.addEventListener('click', function(){
    playlistctrl += 1;
    control();
})

buttonqueue.addEventListener('click', function(){
    queuectrl += 1;
    control();
})