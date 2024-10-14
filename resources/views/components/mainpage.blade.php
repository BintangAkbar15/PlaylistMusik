<x-layout>
    <div class="container-fuild d-flex" style="height: 100vh">
        <x-headeruser></x-headeruser>
            <div class="col-12 d-flex" style="height: 76vh; margin-top: 8.5vh">
                <x-playlistpage></x-playlistpage>
                <div class="col-12 p-1 col-md-9 col-lg-7">
                    <div class="col-12 rounded bg-secondary bg-opacity-25 h-100">
                        {{ $slot }}
                    </div>
                </div>
                <x-infopage></x-infopage>
            </div>
        <x-controlmusic></x-controlmusic>
    </div>
</x-layout>