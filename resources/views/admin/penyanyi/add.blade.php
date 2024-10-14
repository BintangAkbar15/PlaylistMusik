<x-layout>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main" class='layout-navbar navbar-fixed'>
            <x-header></x-header>
            <div class="col-12 d-flex flex-column align-items-center">
                <div class="col-md-10 col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between col-auto">
                            <div>
                                <a href="{{ route('kelola.penyanyi') }}" class="fs-3 fw-bold">
                                    <i class="bi bi-arrow-left me-2"></i>
                                </a>
                                <label class="card-title fs-3 pe-none">Add Artist</label>
                            </div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('kelola.penyanyi') }}">Artist</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" action="{{ route('penyanyi.addNew') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <x-info></x-info>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label class="mb-2" for="artist-name">Artist Name</label>
                                                    <div class="position-relative">
                                                        <input required type="text" class="form-control"
                                                            placeholder="artist" name="name" value="{{ old('name') }}" id="first-name-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label class="mb-2" for="Debut-year">Debut Year</label>
                                                    <div class="position-relative">
                                                        <input required type="text" class="form-control"
                                                            placeholder="Debut" value="{{ old('debut') }}" name="debut" id="first-name-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-calendar-date"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label class="mb-2" for="region">Region</label>
                                                    <div class="position-relative">
                                                        <input required type="text" class="form-control"
                                                            placeholder="region" name="negara" value="{{ old('negara') }}" id="first-name-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-globe-americas"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left ">
                                                    <label class="mb-2" for="Slug-id-icon">Photo</label>
                                                    <div class="position-relative d-flex align-items-center">
                                                        <div style="width: 20vh; height: 20vh;" class="bg-secondary rounded d-flex align-items-center justify-content-center">
                                                            <i class="fa-regular fa-image" style="font-size: 40px"></i>
                                                        </div>
                                                        <input required type="file" name="thumb" id="" class="ms-5">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>