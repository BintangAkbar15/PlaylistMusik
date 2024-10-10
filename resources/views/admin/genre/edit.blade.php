<x-layout>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main" class='layout-navbar navbar-fixed'>
            <x-header></x-header>
            <div class="col-12 pb-5 d-flex flex-column align-items-center mt-5">
                <div class="col-md-6 col-12">
                @if ($errors->any())
                    @foreach ($errors->all() as $item)
                        <div class="alert">{{$item}}</div>
                    @endforeach
                @endif
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between col-auto">
                            <div>
                                <a href="{{ route('kelola.genre') }}" class="fs-3 fw-bold">
                                    <i class="bi bi-arrow-left me-2"></i>
                                </a>
                                <label class="card-title fs-3 pe-none">Edit Genre</label>
                            </div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('kelola.genre') }}">Genre</a></li>
                                    <li class="breadcrumb-item active">Genre-name</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" action="{{ route('genre.editNew',$data->id) }}" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label class="mb-2" for="genre-name">Genre Name</label>
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control"
                                                            placeholder="Genre" name="name" value="{{ $data->name }}" id="first-name-icon">
                                                        <div class="form-control-icon">
                                                            <i class="fa-solid fa-record-vinyl"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label class="mb-2" for="Color-id-icon">Color</label>
                                                    <div class="position-relative">
                                                        <input type="color" name="color" value="{{ $data->color }}" id="">
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