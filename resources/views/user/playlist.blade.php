<x-mainpage>
    <x-slot:photomusic> a </x-slot>
    <x-slot:titlemusic> a </x-slot>
    <x-slot:artistmusic> a </x-slot>
    <x-slot:imageartist> a </x-slot>
    <x-slot:songtitle> a </x-slot>
    <x-slot:artist> a </x-slot>
    <x-slot:audio> a </x-slot>
    <x-slot:playlist>
    </x-slot:playlist>
    <x-slot:liked></x-slot:liked>
    <div >
        <div class="col-12 rounded-top px-5 py-3 d-flex flex-column justify-content-end" style="height: 200px; background: linear-gradient(to bottom right, rgba(255, 255, 255, 0.449), rgba(44, 113, 216, 0.537)); color: white;">
            <h1>My Playlist</h1>
            <div class="d-flex gap-2 align-items-center">
                <i class="fa-solid fa-user"></i>
                <label for="">41 Songs</label>
            </div>
        </div>
        <div class="col-12 d-flex p-4 flex-column" style="background: rgb(104, 104, 104, 0.5); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);">
            <div class="d-flex flex-column col-12">
                @foreach ($lagu as $item)
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="slug" value="{{ $item->slug }}">
                        <button class="d-flex py-2 px-5 align-items-center col-12 bg-dark bg-opacity-25 mb-3">
                            <label for="" style="width: 4%;">{{ $loop->iteration }}</label>
                            <img src="{{ url('storage/'.$item->thumb) }}" width="4%" alt="" class="bg-dark">
                            <label for="" style="width: 40%" class="ps-3">{{ $item->name }}</label>
                            <label for="" style="width: 40%">{{ $item->dilihat }}</label>
                            <div class="d-flex align-items-center justify-content-between gap-3" style="width: 12%;">
                                <i class="bi bi-plus-circle d-flex align-items-center"></i>
                                <label class="mb-0">{{ date('i:s' ,$item->audio_length) }}</label>
                                <i class="bi bi-three-dots d-flex align-items-center"></i>
                            </div>       
                        </button>
                    </form>
                @endforeach
            </div>
        </div>        
    </div>
</x-mainpage>