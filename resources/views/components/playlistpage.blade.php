<div class="col-2 p-1 col-md-3 d-none d-md-block overflow-hidden">
    <div class="col-12 rounded bg-secondary bg-opacity-10 h-100">
        <div class="col-12 pt-4 px-4">
            <div class="d-flex gap-4 fs-4 fw-bold">
                <i class="bi bi-collection"></i>
                <label for="">Collection</label>
            </div>
            <div class="col-12 d-flex align-items-center" style="max-height: 40px;">
                <div class="col-11 d-flex">
                    <form action="">
                        <div class="form-group position-relative has-icon-left mb-0"> 
                            <input type="text" class="form-control form-control-md" name="Search-play" placeholder="Search" required>
                            <div class="form-control-icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-1 d-none d-xl-flex justify-content-end align-items-center" data-bs-toggle="modal" data-bs-target="#success" style="font-size: 20px; cursor:pointer;"> 
                    <i class="fa-regular fa-square-plus"></i>
                </div>
                <!--success theme Modal -->
                <div class="modal fade text-left" id="success" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel120" aria-hidden="true" >
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h5 class="modal-title white" id="myModalLabel120">Tambah Playlist Baru
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form id="genre-form" action="{{ route('playlist.add') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label class="mb-2" for="genre-name">Playlist Name</label>
                                                    <div class="position-relative">
                                                        <input required type="text" class="form-control"
                                                            placeholder="Playlist" name="name" id="first-name-icon">
                                                        <div class="form-control-icon">
                                                            <i class="fa-solid fa-record-vinyl"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Batal</span>
                                    </button>
                                    <input required type="hidden" name="id" id="idToDelete" value="">    
                                    <button type="submit" class="btn btn-success ms-1"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Add Playlist</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="col-12 mt-1">
                <div class=" align-items-center py-2 gap-2 d-lg-flex d-none">
                    <button class="rounded-circle d-flex p-2 btn btn-light d-none">
                        <i class="fa-solid fa-x "></i>
                    </button>
                    <button id="show-playlist" class="rounded-pill d-flex px-3 align-items-center py-1 btn btn-light gap-2">
                        <label for="">Playlist</label>
                        <i class="fa-solid fa-x d-none"></i>
                    </button> 
                    <button id="show-queue" class="rounded-pill d-flex px-3 align-items-center py-1 btn btn-light gap-2">
                        <label for="">Queue</label>
                        <i class="fa-solid fa-x d-none"></i>
                    </button> 
                </div>
                <div class="d-flex align-items-center py-2 mt-3 gap-2 d-lg-none">
                    <button class="rounded-circle d-flex p-2 btn btn-light ">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="col-12 mt-2 overflow-y-auto" style="max-height: 48vh; display: block;" id="side-playlist">
                <label for="">Playlist</label>
                <div class="col-lg-12 col-auto p-2 mt-2 p-lg-3 mb-3 rounded d-flex gap-3 shadow" style="background: #424445">
                    <div class="col-12 col-lg-3">
                        <div style="height: 55px; width: 55px; background: linear-gradient(to bottom right, rgb(12, 22, 226), white); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);" class="bg-opacity-50 d-flex align-items-center justify-content-center rounded shadow">
                            <i class="fa-solid fa-heart fs-5 text-white"></i>
                        </div>
                    </div>
                    <div class="col-9 d-none d-lg-block d-flex flex-column justify-content-center">
                        <label for="" class="fs-5 d-none d-lg-block">Liked Songs</label>
                        <label for="" class="fs-6 d-none d-xl-block">Playlist &#8226 {{ $liked }} </label>
                    </div>
                </div>
                {{ $slot }}
            </div>    
            <div class="col-12 mt-2 overflow-y-auto" style="max-height: 48vh; display: none;" id="side-queue">
                <label for="">Next Song</label>
                <div class="col-lg-12 col-auto p-2 mt-2 p-lg-3 mb-3 rounded d-flex gap-3 shadow" style="background: #424445">
                    <div class="col-12 col-lg-3">
                        <img style="height: 55px; width: 55px;" src="{{ url('img/dumpimg.png') }}" class="rounded shadow">
                    </div>
                    <div class="col-9 d-none d-lg-block d-flex flex-column justify-content-center">
                        <label for="" class="fs-5 d-none d-lg-block">Mirage</label>
                        <label for="" class="fs-6 d-none d-xl-block">One Republic </label>
                    </div>
                </div>
            </div>         
        </div>
    </div>
    <script src="{{ url('js/toggleplaylist.js') }}"></script>
</div>
