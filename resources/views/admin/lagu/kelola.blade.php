<x-layout>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main" class='layout-navbar navbar-fixed'>
            <x-header></x-header>
            <x-datatable>
                <x-slot:title>Kelola Lagu</x-slot:t>
                <x-slot:theader>
                        <th>No</th>
                        <th>Name</th>
                        <th>Track</th>
                        <th>Artist</th>
                        <th>Photo</th>
                        <th>Didengarkan</th>
                        <th colspan="2">Action</th>
                    </tr>
                </x-slot>
                @forelse ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ gmdate("i:s", $item->audio_length) }}</td>
                    <td>Artist</td>
                    <td><img src="{{ url('storage/'. $item->thumb ) }}" alt="{{ $item->name }}" width="100" height="100"></td>
                    <td>{{ $item->dilihat }} kali</td>
                    <td>
                        <a href="{{  }}" class="btn btn-outline-warning">Ubah</a>
                        <button type="button" class="btn btn-outline-danger" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-bs-toggle="modal" data-bs-target="#danger">Hapus</button>
                        <!--Danger theme Modal -->
                        <div class="modal fade text-left" id="danger" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel120" aria-hidden="true" >
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title white" id="myModalLabel120">Peringatan!
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Jika anda menekan button hapus maka semua data dari lagu <strong></strong> akan dihapus untuk selamanya
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary"
                                            data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Batal</span>
                                        </button>
                                        <form id="deleteForm" action="" method="delete">
                                            @csrf
                                            <input type="hidden" name="id" id="idToDelete" value="">    
                                            <button type="submit" class="btn btn-danger ms-1"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan=10 class='text-center'>Data Not Found</td>
                    </tr>
                @endforelse
            </x-datatable>
        </div>
    </div>
    <script>
        const deleteModal = document.getElementById('danger');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            // Button yang memicu modal
            const button = event.relatedTarget;
            // Ambil data dari button (data-nis)
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            document.querySelector('strong').innerHTML = name
            // Update form action dan value nis di dalam modal
            const form = document.getElementById('deleteForm');
            const idInput = document.getElementById('idToDelete').value = id;
                console.log(idInput)
            // Set action URL sesuai id
            form.action = `/admin/lagu/delete/${id}`;
        });
    </script>
</x-layout>