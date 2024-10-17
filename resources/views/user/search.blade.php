<x-mainpage>
    <x-slot:artistdesc>a
    </x-slot:artistdesc>
    <x-slot:artistut>a
    </x-slot:artistut>
    <x-slot:songinfo>a
    </x-slot:songinfo>
    <x-slot:imagesong>a
    </x-slot:imagesong>
    <x-slot:botinfo>a
    </x-slot:botinfo>
    <x-slot:botimg>    a
    </x-slot:botimg>
    <x-slot:audio>    
        a
    </x-slot:audio>
    <x-slot:fdesc>
        a
    </x-slot:fdesc>
    <x-slot:fullscimg>
        a
    </x-slot:fullscimg>
    <x-slot:playlist> a </x-slot:playlist>
    <x-slot:inputlike> a </x-slot:inputlike>
    <x-slot:liked>a</x-slot:liked>
    <div class="col-12 pt-4 px-4 bg-dark">
        <div class="col-12 gap-2 d-flex">
            <button class="btn bg-light rounded-pill border-none">
                All
            </button>
            <button class="btn bg-light rounded-pill border-none">
                Music
            </button>
            <button class="btn bg-light rounded-pill border-none">
                Artist
            </button>
        </div>
        <div class="col-12 rounded p-2 mt-2 d-flex flex-column flex-md-row">
            <div class="col-md-6 col-12 d-flex flex-column">
                <h3>Top result</h3>
                <div class="col-12 d-flex flex-column bg-secondary bg-opacity-50 p-4 rounded gap-3">
                    <img src="{{ url('img/dumpimg.png') }}" width="100px" alt="">
                    <div class="d-flex flex-column justify-content-center">
                        <h5>Semua aku di rayakan</h5>
                        <label for=""><i class="bi bi-check-circle-fill" style="color: rgb(80, 80, 255)"></i> Song &#8226 pergi tak pulang</label>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-3 mt-md-0 ps-2 gap-1">
                <h3>Songs</h3>
                <div class="col-12 p-2 d-flex gap-3">
                    <img src="{{ url('img/dumpimg.png') }}" width="40px" class="rounded" alt="">
                    <div class="d-flex flex-column">
                        <label for="" style="font-size: 14px" class="fw-bold">Semua aku di rayakan</label>
                        <label for="" style="font-size: 10px">Artist pergi tak pulang</label>
                    </div>
                </div>
                <div class="col-12 p-2 d-flex gap-3">
                    <img src="{{ url('img/dumpimg.png') }}" width="40px" class="rounded" alt="">
                    <div class="d-flex flex-column">
                        <label for="" style="font-size: 14px" class="fw-bold">Semua aku di rayakan</label>
                        <label for="" style="font-size: 10px">Artist pergi tak pulang</label>
                    </div>
                </div>
                <div class="col-12 p-2 d-flex gap-3">
                    <img src="{{ url('img/dumpimg.png') }}" width="40px" class="rounded" alt="">
                    <div class="d-flex flex-column">
                        <label for="" style="font-size: 14px" class="fw-bold">Semua aku di rayakan</label>
                        <label for="" style="font-size: 10px">Artist pergi tak pulang</label>
                    </div>
                </div>
                <div class="col-12 p-2 d-flex gap-3">
                    <img src="{{ url('img/dumpimg.png') }}" width="40px" class="rounded" alt="">
                    <div class="d-flex flex-column">
                        <label for="" style="font-size: 14px" class="fw-bold">Semua aku di rayakan</label>
                        <label for="" style="font-size: 10px">Artist pergi tak pulang</label>
                    </div>
                </div>
            </div>
        </div>
        
        <label for="" class="fs-4 mt-4" style="color: white">Artist</label>
        <div class="col-12 d-flex justify-content-evenly overflow-x-auto">
            <div class="p-2 d-flex flex-column align-items-center gap-2"
                onmouseenter="this.classList.add('bg-secondary')" 
                onmouseleave="this.classList.remove('bg-secondary')">
                <img src="{{ url('img/dumpimg.png') }}" class="rounded-circle" width="150px" alt="">
                <label for="" class="fs-5" style="color: white">Pop</label>
            </div>
            <div class="p-2 d-flex flex-column align-items-center gap-2"
                onmouseenter="this.classList.add('bg-secondary')" 
                onmouseleave="this.classList.remove('bg-secondary')">
                <img src="{{ url('img/dumpimg.png') }}" class="rounded-circle" width="150px" alt="">
                <label for="" class="fs-5" style="color: white">Pop</label>
            </div>
            <div class="p-2 d-flex flex-column align-items-center gap-2"
                onmouseenter="this.classList.add('bg-secondary')" 
                onmouseleave="this.classList.remove('bg-secondary')">
                <img src="{{ url('img/dumpimg.png') }}" class="rounded-circle" width="150px" alt="">
                <label for="" class="fs-5" style="color: white">Pop</label>
            </div>
            <div class="p-2 d-flex flex-column align-items-center gap-2">
                <div style="width: 150px; height: 160px; color: white" class="d-flex gap-3 flex-column rounded bg-dark justify-content-center align-items-center">
                    <i class="fa-solid fa-circle-arrow-right" style="font-size: 50px"></i>
                    <label for="" class="fs-5" style="color: white">More</label>
                </div>
            </div>
        </div>
        <label for="" class="fs-4 mt-4" style="color: white">Genre</label>
        <div class="col-12 d-flex justify-content-evenly overflow-x-auto">
            <div class="p-2 d-flex flex-column align-items-center gap-2"
                onmouseenter="this.classList.add('bg-secondary')" 
                onmouseleave="this.classList.remove('bg-secondary')">
                <img src="{{ url('img/dumpimg.png') }}" class="rounded" width="150px" alt="">
                <label for="" class="fs-5" style="color: white">Pop</label>
            </div>
            <div class="p-2 d-flex flex-column align-items-center gap-2"
                onmouseenter="this.classList.add('bg-secondary')" 
                onmouseleave="this.classList.remove('bg-secondary')">
                <img src="{{ url('img/dumpimg.png') }}" class="rounded" width="150px" alt="">
                <label for="" class="fs-5" style="color: white">Pop</label>
            </div>
            <div class="p-2 d-flex flex-column align-items-center gap-2"
                onmouseenter="this.classList.add('bg-secondary')" 
                onmouseleave="this.classList.remove('bg-secondary')">
                <img src="{{ url('img/dumpimg.png') }}" class="rounded" width="150px" alt="">
                <label for="" class="fs-5" style="color: white">Pop</label>
            </div>
            <div class="p-2 d-flex flex-column align-items-center gap-2">
                <div style="width: 150px; height: 160px; color: white" class="d-flex gap-3 flex-column rounded bg-dark justify-content-center align-items-center">
                    <i class="fa-solid fa-circle-arrow-right" style="font-size: 50px"></i>
                    <label for="" class="fs-5" style="color: white">More</label>
                </div>
            </div>
        </div>
    </div>
</x-mainpage>