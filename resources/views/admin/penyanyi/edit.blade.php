<x-layout>
    <div id="app">
        <x-sidebar></x-sidebar>
        @if ($errors->any())
            @foreach ($errors->all() as $item)
                <div class="alert alert-danger">
                    {{ $item }}
                </div>
            @endforeach
        @endif
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
                                <label class="card-title fs-3 pe-none">Edit Artist</label>
                            </div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('kelola.penyanyi') }}">Artist</a></li>
                                    <li class="breadcrumb-item active">Artist-name</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" action="{{ route('penyanyi.editNew',$id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label class="mb-2" for="artist-name">Artist Name</label>
                                                    <div class="position-relative">
                                                        <input required type="text" value="{{ $data->name }}" class="form-control"
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
                                                        <input required type="text" value="{{ $data->debut }}" class="form-control"
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
                                                        <input required type="text" name="negara" value="{{ $data->negara }}" class="form-control"
                                                            placeholder="region" id="first-name-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-globe-americas"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left ">
                                                    <label class="mb-2" for="Slug-id-icon">Photo</label>
                                                    <div class="form-group has-icon-left">
                                                        <label class="mb-2" for="Slug-id-icon">Photo</label>
                                                        <div class="position-relative d-flex align-items-center">
                                                            <div id="preview-container" style="width: 20vh; height: 20vh;" class="bg-secondary rounded d-flex align-items-center justify-content-center">
                                                                @if($data->thumb) <!-- Periksa apakah ada gambar yang diunggah -->
                                                                    <img src="{{ url('storage/' . $data->thumb) }}" style="width: 100%; height: 100%; object-fit: cover;" class="rounded" alt="Uploaded Photo">
                                                                @else
                                                                    <i class="fa-regular fa-image" style="font-size: 40px"></i>
                                                                @endif
                                                            </div>
                                                            <input type="file" name="thumb" id="thumb" class="ms-5" accept="image/*">
                                                        </div>
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
    <script>
        const inputFile = document.getElementById('thumb');
        const previewContainer = document.getElementById('preview-container');
        const imageIcon = document.getElementById('image-icon');

        inputFile.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Create a new image element
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100%'; // Set image width to fill the container
                    img.style.height = '100%'; // Set image height to fill the container
                    img.style.objectFit = 'cover';
                    img.className = 'rounded'; // Add Bootstrap rounded class

                    // Clear the preview container and append the image
                    previewContainer.innerHTML = '';
                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
                // Hide the icon when image is uploaded
                imageIcon.style.display = 'none';
            }
        });
    </script>
</x-layout>