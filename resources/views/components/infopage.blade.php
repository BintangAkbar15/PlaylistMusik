<div class="col-2 p-1 d-none d-lg-block">
    <div class="col-12 rounded bg-secondary p-3 bg-opacity-10 h-100 d-flex flex-column overflow-y-auto">
        {{ $imagesong }}
        <div class="col-12 overflow-hidden" id="container-cover">
            <div id="content-title" class="col-12">
                {{ $songinfo }}
            </div>
        </div>
        {{ $artistut }}
        <div class="p-3 rounded bg-opacity-50 mt-4" style="background: linear-gradient(to bottom right, rgba(255, 255, 255, 0.5), rgba(128, 128, 128, 0.5)); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
            <div class="col-12 d-flex gap-3">
                {{ $artistdesc }}
            </div>
            <div class="col-12 text-end">
                <label for="">Jumlah Lagu 10</label>
            </div>            
        </div>
    </div>
</div>