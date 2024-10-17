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
            <i class="fa-solid fa-backward-step pe-auto" onclick="prev()"></i>
            <i class="fa-solid fa-play pe-auto" id="play-pause"></i>
            <i class="fa-solid fa-forward-step pe-auto" onclick="next()"></i>
            <i class="fa-solid fa-repeat d-none d-md-block pe-auto" id="repeat"></i> 
        </div>
    </div>
    
    <div class="col-3 gap-3 d-none d-lg-flex justify-content-end align-items-center pe-4">
        <!-- Form Input -->
        <form action="" method=""> 
            {{ $inputlike }} 
        </form>
    
        <!-- Dropdown Button with Playlist -->
        <div class="dropdown">
            <button class="btn btn-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-list"></i>
            </button>
            <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
                <li>
                    <input type="text" class="form-control" placeholder="Find a playlist">
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">New Playlist</a></li>
                <li><a class="dropdown-item" href="#">roll mood</a></li>
                <li><a class="dropdown-item" href="#">Daily</a></li>
                <li><a class="dropdown-item" href="#">D2B</a></li>
            </ul>
        </div>
    
        <!-- Volume Control -->
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-volume-high me-2"></i>
            <input type="range" id="volume" value="100">
        </div>
    
        <!-- Maximize Icon -->
        <i class="fa-solid fa-up-right-and-down-left-from-center pe-auto" id="maximize"></i>
    </div>
</footer>  