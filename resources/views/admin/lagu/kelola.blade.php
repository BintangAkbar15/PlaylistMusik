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
                        <th>Track</th>
                        <th>Artist</th>
                        <th>Photo</th>
                        <th>Slug</th>
                        <th colspan="2">Action</th>
                    </tr>
                </x-slot>
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
            </x-datatable>
        </div>
    </div>
</x-layout>