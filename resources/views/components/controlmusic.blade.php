<footer class="fixed-bottom  bg-dark col-12 d-flex pt-3" style="height: 15vh">
    <div class="col-8 col-md-3 d-flex align-items-center ps-4 gap-3" style="height:12vh;">
        {{ $botimg }}
        <div class="d-flex flex-column gap-1 overflow-hidden">
            {{ $botinfo }}
        </div>
    </div>
    <div class="col-4 col-md-9 col-lg-6 px-sm-5 pe-2 pe-md-0 d-flex flex-column align-items-center">
        <div class="d-flex align-items-center d-none  d-md-flex justify-content-center w-100">
            <label for="customRange1" class="me-2 mb-0 text-nowrap" id="progres-time">-:--</label> 
            <input type="range" class="form-range px-4 flex-grow-1" id="customRange1" value="0"> 
            <label for="customRange1" class="ms-2 me-4 me-lg-0 mb-0 text-nowrap" id="end-time">-:--</label> 
        </div>        
        <div class="d-flex align-items-center justify-content-end justify-content-md-center gap-3 gap-md-5" style="height: 12vh; font-size: 30px;">
            <i class="fa-solid fa-shuffle d-none d-md-block pe-auto" id="shuffle"></i> 
            <i class="fa-solid fa-backward-step pe-auto" id="prev"></i>
            <i class="fa-solid fa-play pe-auto" id="play-pause"></i>
            <i class="fa-solid fa-forward-step pe-auto" id="next"></i>
            <i class="fa-solid fa-repeat d-none d-md-block pe-auto" id="repeat"></i> 
        </div>
    </div>
    
    <div class="col-3 gap-3 d-none d-lg-flex justify-content-end align-items-center pe-4">
        <form id="like-form" action="{{ route('like.song') }}" method="post">
            @csrf
            {{ $inputlike }}
            <button class="d-flex" style="outline: none;background: none;border:none" id="btnlike">
                <i class="fa-regular fa-heart fs-4 pe-auto text-center" style="color: white;" id="like-btn"></i>
            </button>
        </form>
        <i class="fa-solid fa-list pe-auto" id="queue"></i>
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-volume-high me-2 pe-auto"></i>
            <input type="range" id="volume" value='100'>
        </div>
            <i class="fa-solid fa-up-right-and-down-left-from-center pe-auto" id="maximaze"></i>
    </div>
</footer>  