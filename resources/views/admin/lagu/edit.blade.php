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
                                <a href="{{ route('kelola.lagu') }}" class="fs-3 fw-bold">
                                    <i class="bi bi-arrow-left me-2"></i>
                                </a>
                                <label class="card-title fs-3 pe-none">Edit Lagu</label>
                            </div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('kelola.lagu') }}">Lagu</a></li>
                                    <li class="breadcrumb-item active">lagu-name</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                @if ($errors->any())
                                    @foreach ($errors->all() as $item)
                                        <div class="alert">{{$item}}</div>
                                    @endforeach
                                @endif
                                <form class="form form-vertical" action="{{ route('lagu.addNew') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input required type="hidden" name='track' id="track">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label class="mb-2" for="music-name">Music Name</label>
                                                    <div class="position-relative">
                                                        <input required type="text" class="form-control"
                                                            placeholder="Music" name="name" value="{{ request('name') }}" id="first-name-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-music-note-beamed"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label class="mb-2" for="file-audio">Genre</label>
                                                    <select class="form-select" id="multiple-select-field" name="genre" data-placeholder="Pilih Genre" multiple>
                                                        @forelse ($data as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @empty
                                                            <option disabled>No Data Found</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                   <label class="mb-2" for="file-audio">File Audio</label>
                                                    <div class="position-relative">
                                                        <input required type="file" name="audio" value="{{ request('audio') }}" id="audio-input required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label class="mb-2" for="Artist-name">Artist</label>
                                                    <select class="form-select" id="single-select-clear-field" data-placeholder="Pilih Artist">
                                                        @forelse ($penyanyi as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @empty
                                                            
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left ">
                                                    <label class="mb-2" for="Slug-id-icon">Photo</label>
                                                    <div class="position-relative d-flex align-items-center">
                                                        <div style="width: 20vh; height: 20vh;" class="bg-secondary rounded d-flex align-items-center justify-content-center">
                                                            <i class="fa-regular fa-image" style="font-size: 40px"></i>
                                                        </div>
                                                        <input required type="file" name="thumb" id="thumb" class="ms-5">
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        const modal = 
        `<option disabled>No Data Found</option>
        <button type="button" class="btn btn-outline-success w-100" data-bs-toggle="modal" data-bs-target="#success">Tambah genre</button>
                        <!--success theme Modal -->
                        <div class="modal fade text-left" id="success" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel120" aria-hidden="true" >
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-success">
                                        <h5 class="modal-title white" id="myModalLabel120">Tambah Genre Baru
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form id="genre-form" action="{{ route('lagu.add.genre') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label class="mb-2" for="genre-name">Genre Name</label>
                                                            <div class="position-relative">
                                                                <input required type="text" class="form-control"
                                                                    placeholder="Genre" name="name" id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="fa-solid fa-record-vinyl"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label class="mb-2" for="Color-id-icon">Color</label>
                                                                <div class="position-relative">
                                                                    <input required type="color" name="color" id="">
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
                                                <span class="d-none d-sm-block">Tambah genre</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        `
        const modal1 = 
        `<option disabled>No Data Found</option>
        <button type="button" class="btn btn-outline-success w-100" data-bs-toggle="modal" data-bs-target="#success">Tambah penyanyi</button>
                        <!--success theme Modal -->
                        <div class="modal fade text-left" id="success" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel120" aria-hidden="true" >
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-success">
                                        <h5 class="modal-title white" id="myModalLabel120">Tambah penyanyi Baru
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form id="artist-form" action="{{ route('lagu.add.penyanyi') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label class="mb-2" for="artist-name">Artist Name</label>
                                                    <div class="position-relative">
                                                        <input required type="text" class="form-control"
                                                            placeholder="artist" name="name" id="first-name-icon">
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
                                                        <input required value="{{ request('name') }}" type="text" class="form-control"
                                                            placeholder="Debut" name="debut" id="first-name-icon">
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
                                                            placeholder="region" value="{{ request('negara') }}" name="negara" id="first-name-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-globe-americas"></i>
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
                                                <span class="d-none d-sm-block">Tambah penyanyi</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        `
        $(document).ready(function() {
            // Inisialisasi Select2
            $('#multiple-select-field').select2({
                theme: "bootstrap-5",
                width: '100%',
                placeholder: 'Choose anything',
                closeOnSelect: false,
                language: {
                    noResults: function() {
                        return modal;
                    }
                },
                escapeMarkup: function (markup) {
                    return markup; // Biarkan HTML tampil apa adanya
                }
            });
    
            // Event listener untuk Select2 ketika dibuka
            $('#multiple-select-field').on('select2:open', function() {
                // Event listener untuk tombol "Tambah Genre" saat tidak ada hasil
                let addNewGenreBtn = document.querySelector('#add-new-genre');
                
                if (addNewGenreBtn) {
                    addNewGenreBtn.addEventListener('click', function() {
                        let newGenre = prompt("Masukkan genre baru:");
                        if (newGenre) {
                            // Tambahkan genre baru ke Select2
                            let newOption = new Option(newGenre, newGenre, true, true);
                            $('#multiple-select-field').append(newOption).trigger('change');
    
                            // Tampilkan genre baru di pilihan
                            $('#multiple-select-field').trigger('select2:close');
                        }
                    });
                }
            });
    
            $(document).on('submit', '#genre-form', function(event) {
                event.preventDefault(); // Mencegah form dari refresh

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'), // URL yang diambil dari atribut action form
                    data: $(this).serialize(), // Mengambil data form
                    success: function(response) {
                        // Misalkan response berisi genre baru
                        // Tambahkan genre baru ke Select2
                        let newOption = new Option(response.name, response.id, true, true);
                        $('#multiple-select-field').append(newOption).trigger('change');
                        $('#multiple-select-field').trigger('select2:close');
                        $('#success').modal('hide'); // Tutup modal setelah berhasil
                    },
                    error: function(xhr) {
                        // Menampilkan pesan kesalahan
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });

            // Event listener untuk tombol "Tambah penyanyi" saat modal terbuka
            $(document).on('submit', '#artist-form', function(event) {
                event.preventDefault(); // Mencegah form dari refresh

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'), // URL yang diambil dari atribut action form
                    data: $(this).serialize(), // Mengambil data form
                    success: function(response) {
                        // Misalkan response berisi artis baru
                        // Tambahkan artis baru ke Select2
                        let newOption = new Option(response.name, response.id, true, true);
                        $('#single-select-clear-field').append(newOption).trigger('change');
                        $('#single-select-clear-field').trigger('select2:close');
                        $('#success').modal('hide'); // Tutup modal setelah berhasil
                    },
                    error: function(xhr) {
                        // Menampilkan pesan kesalahan
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });

            // Event listener untuk perubahan pada Select2
            $('#multiple-select-field').on('change', function() {
                let selectedItems = document.querySelectorAll('.select2-selection__choice__display');
                selectedItems.forEach(item => {
                    console.log(item.innerText); // Menampilkan teks dari setiap item yang dipilih
                });
            });

            $('#single-select-clear-field').select2({
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                allowClear: true,
                language: {
                    noResults: function() {
                        return modal1;
                    }
                },
                escapeMarkup: function (markup) {
                    return markup; // Biarkan HTML tampil apa adanya
                }
            });
    
            // Event listener untuk Select2 ketika dibuka
            $('#single-select-clear-field').on('select2:open', function() {
                // Event listener untuk tombol "Tambah Genre" saat tidak ada hasil
                let addNewGenreBtn = document.querySelector('#add-new-penyanyi');
                
                if (addNewGenreBtn) {
                    addNewGenreBtn.addEventListener('click', function() {
                        let newGenre = prompt("Masukkan genre baru:");
                        if (newGenre) {
                            // Tambahkan genre baru ke Select2
                            let newOption = new Option(newGenre, newGenre, true, true);
                            $('#single-select-clear-field').append(newOption).trigger('change');
    
                            // Tampilkan genre baru di pilihan
                            $('#single-select-clear-field').trigger('select2:close');
                        }
                    });
                }
            });
    
            // Event listener untuk perubahan pada Select2
            $('#single-select-clear-field').on('change', function() {
                let selectedItems = document.querySelectorAll('.select2-selection__choice__display');
                selectedItems.forEach(item => {
                    console.log(item.innerText); // Menampilkan teks dari setiap item yang dipilih
                });
            });
        });
        document.getElementById('audio-input required').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const audio = new Audio(URL.createObjectURL(file));
                audio.addEventListener('loadedmetadata', function() {
                    document.getElementById('track').setAttribute('value',audio.duration)
                });
            }
        });
    </script>
    
</x-layout>