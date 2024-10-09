<x-layout>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main" class='layout-navbar navbar-fixed'>
            <x-header></x-header>
            <x-datatable>
                <x-slot:title>Kelola Lagu</x-slot:t>
                <x-slot:theader>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Audio Legnth</th>
                        <th>Artist</th>
                        <th>Photo</th>
                        <th>Slug</th>
                        <th colspan="2">Action</th>
                    </tr>
                </x-slot>
                @forelse ($lagu as $item)
                <tr>
                    <td>1</td>
                    <td>Ab2</td>
                    <td>appocalypse</td>
                    <td>4:50</td>
                    <td>Cigarettes After Sex</td>
                    <td>ini.png</td>
                    <td>sad/kumenangis/dark/satanic</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                @empty
                    
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
            form.action = `/admin/lagu/delete/${id}`;
        });
    </script>
</x-layout>