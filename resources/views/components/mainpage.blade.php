<x-layout>
    <div class="container-fuild d-flex" style="height: 100vh">
        <x-headeruser></x-headeruser>
            <div class="col-12 d-flex " style="height: 76vh; margin-top: 8.5vh">
                <x-playlistpage></x-playlistpage>
                <div class="col-12 col-md-9 col-lg-7 p-1">
                    <div class="rounded bg-opacity-25 h-100 overflow-y-auto" style="background: linear-gradient(to bottom, rgb(103, 103, 255), rgba(88, 88, 88, 0.508), rgba(88, 88, 88, 0.255));" >
                        {{ $slot }}
                    </div>
                </div>
                <x-infopage></x-infopage>
            </div>
        <x-controlmusic></x-controlmusic>
    </div>
</x-layout>