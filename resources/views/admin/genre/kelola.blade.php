<x-layout>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main" class='layout-navbar navbar-fixed'>
            <x-header></x-header>
            <x-datatable>
                <x-slot:title>Kelola Genre</x-slot:t>
                <x-slot:theader>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Slug</th>
                        <th colspan="2">action</th>
                    </tr>
                </x-slot>
                <tr>
                    <td>1</td>
                    <td>921736</td>
                    <td>Jazz</td>
                    <td>blue</td>
                    <td>/blue/red/yellow</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </x-datatable>
        </div>
    </div>
</x-layout>