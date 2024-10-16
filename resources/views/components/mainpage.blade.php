<x-layout>
    <div class="container-fuild" style="height: 100vh; display: flex;" id="normalpage">
        <x-headeruser></x-headeruser>
            <div class="col-12 d-flex " style="height: 76vh; margin-top: 8.5vh">
                <x-playlistpage>
                    <x-slot:liked> {{ $liked }} </x-slot>
                    <x-slot:slot> {{ $playlist }} </x-slot>
                </x-playlistpage>
                <div class="col-12 col-md-9 col-lg-7 p-1">
                    <div class="rounded bg-opacity-25 h-100 overflow-y-auto" style="background: linear-gradient(to bottom, rgb(103, 103, 255), rgba(88, 88, 88, 0.508), rgba(88, 88, 88, 0.255));" >
                        {{ $slot }}
                    </div>
                </div>
                <x-infopage>
                    <x-slot:artistdesc>{{ $artistdesc }}</x-slot:artistdesc>
                    <x-slot:artistut>{{ $artistut }}</x-slot:artistut>
                    <x-slot:songinfo>{{ $songinfo }}</x-slot:songinfo>
                    <x-slot:imagesong>{{ $imagesong }}</x-slot:imagesong>
                </x-infopage>
            </div>
        <x-controlmusic>
            <x-slot:inputlike>{{ $inputlike }}</x-slot:inputlike>
            <x-slot:botimg>{{ $botimg }}</x-slot:botimg>
            <x-slot:botinfo>{{ $botinfo }}</x-slot:botinfo>
        </x-controlmusic>
    </div>
    <div class="col-12 bg-secondary overflow-hidden" style="height: 100vh; display: none;" id="fullscreen">
        <div class="col-12 bg-dark bg-opacity-25 d-flex flex-column justify-content-end" style="height: 100vh; backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
            <div class="col-12 d-flex justify-content-end" style="height: 20vh;">
                <div class="d-flex flex-column justify-content-center ps-3 text-white" style="width: 74%">
                    {{ $fdesc }}
                </div>
            </div>
            <div class="bg-dark col-12 bg-opacity-50 d-flex flex-column justify-content-end" style="height: 24vh;">
                <div class="d-flex align-items-center" style="transform: translateX(100px);">
                    {{ $fullscimg }}
                </div>
                <div class="col-12 pt-5">
                    <div class="col-12 px-5 d-flex flex-column align-items-center">
                        <div class="d-flex align-items-center d-none d-md-flex justify-content-center w-100">
                            <label for="customRange1" class="me-2 mb-0 text-nowrap" id="progres-time-fsc">-:--</label> 
                            <input type="range" class="form-range px-4 flex-grow-1" id="customRange1-fsc" value="0"> 
                            <label for="customRange1" class="ms-2 me-4 me-lg-0 mb-0 text-nowrap" id="end-time-fsc">-:--</label> 
                            <audio id="my-audio" class="d-none">
                                {{ $audio }}
                            </audio>
                        </div>        
                    </div>
                    <div class="d-flex justify-content-end col-12 pe-4">
                        <div class="d-flex align-items-center col-6 justify-content-center justify-content-md-center gap-3 gap-md-5" style="height: 12vh; font-size: 30px;">
                            <i class="fa-solid fa-shuffle d-none d-md-block pe-auto" id="shuffle-fsc"></i> 
                            <i class="fa-solid fa-backward-step pe-auto" id="prev-fsc"></i>
                            <i class="fa-solid fa-play pe-auto" id="play-pause-fsc"></i>
                            <i class="fa-solid fa-forward-step pe-auto" id="next-fsc"></i>
                            <i class="fa-solid fa-repeat d-none d-md-block pe-auto" id="repeat-fsc"></i> 
                        </div>
                        <div class="gap-3 d-none d-lg-flex col-3 justify-content-end align-items-center pe-4">
                            <form action="">
                                <i class="fa-regular fa-heart fs-4 pe-auto" style="color: white;" id="like-btn-fsc"></i>
                            </form>
                            <i class="fa-solid fa-list pe-auto" id="queue-fsc"></i>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-volume-high me-2 pe-auto"></i>
                                <input type="range" id="volume-fsc" value='100'>
                            </div>
                                <i class="fa-solid fa-down-left-and-up-right-to-center text-light" id="minimize"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/controlmusic.js') }}"></script>
</x-layout>