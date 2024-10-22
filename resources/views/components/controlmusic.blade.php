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
            <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton" style="max-height: 200px; overflow-y: auto;">
                <li>
                    <input type="text" class="form-control mb-2" placeholder="Find a playlist">
                </li>
                <li><hr class="dropdown-divider"></li>
                <li class="dropdown-item">
                    <div data-bs-toggle="modal" data-bs-target="#success"> 
                        <i class="fa-regular fa-square-plus"></i>
                        <label for="">Add New Playlist</label>
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
                </li>
                {{ $playlistadd }}
            </ul>
        </div>
        
    
        <!-- Volume Control -->
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-volume-high me-2"></i>
            <input type="range" id="volume" value="100">
        </div>
    
        <!-- Maximize Icon -->
        <i class="fa-solid fa-up-right-and-down-left-from-center pe-auto" onclick="maximizeFullscreen()"></i>
    </div>
</footer>  