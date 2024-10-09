<x-layout>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main" class='layout-navbar navbar-fixed'>
            <x-header></x-header>
            <x-datatable>
                <x-slot:title>Kelola Penyanyi</x-slot:t>
                <x-slot:theader>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Debut</th>
                        <th>Region</th>
                        <th colspan="2">Action</th>
                    </tr>
                </x-slot>
                <tr>
                    <td>1</td>
                    <td>98172376</td>
                    <td>Cigarettes After Sex</td>
                    <td>iniXD.png</td>
                    <td>2012</td>
                    <td>America</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </x-datatable>
        </div>
    </div>
</x-layout>