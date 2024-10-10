<footer class="fixed-bottom  bg-dark col-12 d-flex pt-3" style="height: 15vh">
    <div class="col-8 col-md-3 d-flex align-items-center ps-4 gap-3" style="height:12vh;">
        <img src="{{ url('img/dumpimg.png') }}" style="width: 70px; height: 70px;" class="rounded d-none d-md-block" alt="">
        <div class="d-flex flex-column gap-1 overflow-hidden">
            <label for="" class="fs-4 text-nowrap">Semua aku di rayakan</label>
            <label for="" class="fs-6 text-nowrap">artis pergi tak pulang</label>
        </div>
    </div>
    <div class="col-4 col-md-9 col-lg-6 px-sm-5 pe-2 pe-md-0 d-flex flex-column align-items-center">
        <div class="d-flex align-items-center d-none  d-md-flex justify-content-center w-100">
            <label for="customRange1" class="me-2 mb-0 text-nowrap">-:--</label> 
            <input type="range" class="form-range px-4 flex-grow-1" id="customRange1"> 
            <label for="customRange1" class="ms-2 me-4 me-lg-0 mb-0 text-nowrap">-:--</label> 
        </div>        
        <div class="d-flex align-items-center justify-content-end justify-content-md-center gap-3 gap-md-5" style="height: 12vh; font-size: 30px;">
            <i class="fa-solid fa-shuffle d-none d-md-block"></i> 
            <i class="fa-solid fa-backward-step"></i>
            <i class="fa-solid fa-pause"></i>
            <i class="fa-solid fa-forward-step"></i>
            <i class="fa-solid fa-repeat d-none d-md-block"></i> 
        </div>
    </div>
    
    <div class="col-3 gap-3 d-none d-lg-flex justify-content-end align-items-center pe-4">
        <i class="fa-solid fa-list"></i>
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-volume-high me-2"></i>
            <input type="range">
        </div>
        <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
    </div>    
</footer>  