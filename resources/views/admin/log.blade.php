<x-layout>
    <div id="app">
        <x-sidebar></x-sidebar>
        @if (session('success'))
            {{ session('success') }}
        @endif
        <div id="main" class='layout-navbar navbar-fixed'>
            <x-header></x-header>
            <div class="container d-flex justify-content-center">
                <div class="row col-11">
                    <h2 class="pe-none">
                        Log User
                    </h2>
                </div>
            </div>
            <div class="container d-flex justify-content-center">
                <div class="row col-11 d-flex justify-content-between">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active pe-none">Log</li>
                        </ol>
                    </nav>
                    <form action="{{ route('kelola.penyanyi') }}" method="get">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                              <label for="" class="col-form-label">Search : </label>
                            </div>
                            <div class="col-auto">
                              <input type="text" name="search-field" class="form-control" aria-describedby="passwordHelpInline">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-secondary" type="submit">Cari</button>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-success" name="add" href="{{ route('penyanyi.add') }}">Add</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <x-datatable>
                <x-slot:title>Tabel Log User</x-slot:t>
                <x-slot:theader>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </x-slot>
                @forelse ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td> {{ $item->name }}</td>
                    <td> {{ $item->date }}</td>
                    <td>
                        <span class="badge bg-success">{{ $item->status }}</span>
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
            document.querySelector('strong').innerHTML = name;
            // Update form action dan value nis di dalam modal
            const form = document.getElementById('deleteForm');
            const idInput = document.getElementById('idToDelete').value = id;
                console.log(idInput)
            // Set action URL sesuai id
            form.action = `/admin/penyanyi/delete/${id}`;
        });
    </script>
</x-layout>