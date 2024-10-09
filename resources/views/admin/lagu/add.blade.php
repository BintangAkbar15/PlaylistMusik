<x-layout>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main" class='layout-navbar navbar-fixed'>
            <x-header></x-header>
            <div class="col-12 d-flex flex-column align-items-center">
                <div class="col-md-10 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Music</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label class="mb-2" for="music-name">Music Name</label>
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control"
                                                            placeholder="Music" id="first-name-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-music-note-beamed"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                   <label class="mb-2" for="file-audio">Genre</label>
                                                    <div class="position-relative">
                                                        <div class="container-fluid gap-2 bg-secondary rounded d-flex p-3 flex-wrap-reverse">
                                                            <div class="tag-congainer d-flex align-items-center flex-wrap gap-2" id="container-tag">
                                                                
                                                            </div>
                                                            <input id="tag-input" class="flex-grow-1" style="border: none; background: none; outline: none; min-width: 5vw;" onfocus="this.style.outline='none';" onblur="this.style.outline='none';" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                   <label class="mb-2" for="file-audio">File Audio</label>
                                                    <div class="position-relative">
                                                        <input type="file" id="first-name-icon">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label class="mb-2" for="Artist-name">Artist</label>
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control"
                                                            placeholder="Artist" id="first-name-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left ">
                                                    <label class="mb-2" for="Slug-id-icon">Photo</label>
                                                    <div class="position-relative d-flex align-items-center">
                                                        <div style="width: 20vh; height: 20vh;" class="bg-secondary rounded d-flex align-items-center justify-content-center">
                                                            <i class="fa-regular fa-image" style="font-size: 40px"></i>
                                                        </div>
                                                        <input type="file" name="" id="" class="ms-5">
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
        let container = document.getElementById('container-tag')
        let inputtag = document.getElementById('tag-input')

        var tagray = []

        function createTag(label){
            const div = document.createElement('div');
            div.setAttribute('class', 'tag p-2 rounded d-flex align-items-center bg-dark');
            const span = document.createElement('span');
            span.innerHTML = label;
            span.style.cursor = 'default';
            const closeBtn = document.createElement('i')
            closeBtn.setAttribute('class', 'fa-solid fa-x ms-2');
            closeBtn.style.cursor = 'pointer';
            closeBtn.setAttribute('data-item', label);

            div.appendChild(span)
            div.appendChild(closeBtn)

            return div;
        }

        function reset(){
            document.querySelectorAll('.tag').forEach(function(tag){
                tag.parentElement.removeChild(tag);
            })
        }

        function addtag(){
            reset();
            tagray.slice().reverse().forEach(function(tag){
                const input = createTag(tag);
                container.prepend(input)               
            });
        }

        inputtag.addEventListener('keyup', function(e){
            if(e.key == ' '){
                tagray.push(inputtag.value)
                addtag();
                inputtag.value = '';
            }
        })

        document.addEventListener('click', function(e){
            if(e.target.tagName === 'I'){
                const value = e.target.getAttribute('data-item')
                const index = tagray.indexOf(value);
                tagray = [ ...tagray.slice(0, index), ...tagray.slice(index + 1)];
                
                addtag();
            }   
        })
    </script>
</x-layout>