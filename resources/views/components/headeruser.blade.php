<navbar class="fixed-top bg-dark col-12" style="height: 8vh">
    <div class="col-12 h-100 px-4 d-flex align-items-center justify-content-between">
        <div class="col-3">
            <a href="{{ route('userDashboard') }}">
                <img src="{{ url('img/logo-bara-fm.png') }}" class="img-fluid" width="150px" alt="Logo">
            </a>
        </div>
        <div class="h-100 col-7 d-flex align-items-center justify-content-center">
            <div class="row w-100 align-items-center h-100">
                <div class="col-12 h-100">
                    <form action="{{ route('user.search') }}" method="POST" class="form-group d-flex w-100 h-100 align-items-center">
                        @csrf
                        <div class="flex-grow-1 me-2">
                            <input type="text" name="search-field" class="form-control" placeholder="What do you want to play?" aria-describedby="passwordHelpInline" id="search-field">
                        </div>
                        <div>
                            <input type="submit" value="Search" name="submit" class="btn btn-primary">
                        </div>
                    </form>                                     
                </div>
            </div>
        </div>                
        <div class="col-2 d-flex justify-content-center justify-content-md-end align-items-center" style="font-size: 20px">
            <div class="user-menu d-flex gap-3">
                <div class="dropdown">
                    <div class="user-img d-flex align-items-center dropdown-toggle" type="button"
                        id="dropdownMenuButtonSec" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="avatar avatar-md">
                            <img src="{{ asset('dist/assets/compiled/jpg/5.jpg') }}" class="img-fluid rounded-circle" alt="User Avatar">
                        </div>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSec">
                        <a class="dropdown-item" href="#">Option 1</a>
                        <a class="dropdown-item" href="#">Option 2</a>
                        <form action="{{ route('logout') }}" class="dropdown-item" method="post">
                            @csrf
                            <button class="sidebar-link btn text-danger">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Log out</span>
                            </button>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>    
</navbar>