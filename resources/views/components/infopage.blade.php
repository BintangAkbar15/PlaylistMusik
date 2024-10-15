<div class="col-2 p-1 d-none d-lg-block">
    <div class="col-12 rounded bg-secondary p-3 bg-opacity-10 h-100 d-flex flex-column overflow-y-auto">
        <img src="{{ $imageinfo }}" alt="" width="100%" class="rounded">
        <div class="col-12 overflow-hidden" id="container-cover">
            <div id="content-title" class="col-12">
                <marquee behavior="" direction="" class="col-12" scrollamount='3' style="display: none;" id="marquee">
                    <label for="" class="fs-3 mt-2 text-nowrap fw-bold text-white">{{ $titleinfo }}</label>
                </marquee>
                <label for="" class="fs-3 mt-2 text-nowrap fw-bold text-white col-12" style="display: block" id="normal-title">{{ $titleinfo }}</label>
            </div>
        </div>
        <label for="" class="fs-6 overflow-hidden col-12 text-nowrap text-white">{{ $artistinfo }}</label>
        <div class="p-3 rounded bg-opacity-50 mt-4" style="background: linear-gradient(to bottom right, rgba(255, 255, 255, 0.5), rgba(128, 128, 128, 0.5)); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
            <div class="col-12 d-flex gap-3">
                <img src="{{$imageartistinfo }}" width="50px" alt="" class="rounded-circle shadow">
                <label for="" class="text-white">{{ $artistinfo }}<i class="fa-solid fa-circle-check ms-2" style="color: rgb(0, 208, 255);"></i></label>
            </div>
            <div class="col-12 text-end">
                <button class="py-1 px-3 gap-3 mt-3 btn rounded-pill border border-white text-white">
                    <i class="fa-solid fa-plus"></i>
                    <label for="">Ikut</label>
                </button>
            </div>            
        </div>
    </div>
</div>