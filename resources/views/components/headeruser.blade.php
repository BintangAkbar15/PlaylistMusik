<navbar class="fixed-top bg-dark col-12" style="height: 8vh">
    <div class="col-12 h-100 px-4 d-flex align-items-center justify-content-between">
        <div class="col-3    col-md-3">
            <img src="{{ url('img/logo-bara-fm.png') }}" class="img-fluid" width="150px" alt="Logo">
        </div>
        <div class="h-100 col-9 col-md-9 justify-content-end d-flex align-items-center">
            <div class="row w-100 align-items-center h-100">
                <div class="col-10 col-md-11 h-100">
                    <form action="" class="form-group mt-1 d-flex w-100 h-100 align-items-center">
                        <div class="flex-grow-1 me-2">
                            <input type="text" name="search-field" class="form-control" placeholder="What do you want to play?" aria-describedby="passwordHelpInline" id="search-field">
                        </div>
                        <div>
                            <input type="submit" value="Search" name="submit" class="btn btn-primary">
                        </div>
                    </form>                                     
                </div>
                <div class="col-2 col-md-1 d-flex justify-content-center justify-content-md-end align-items-center" style="font-size: 20px">
                    <div class="user-menu d-flex">
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-md">
                                <img src="{{ asset('dist/assets/compiled/jpg/5.jpg') }}" class="img-fluid rounded-circle" alt="User Avatar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </div>    
</navbar>  