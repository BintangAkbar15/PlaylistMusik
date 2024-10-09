<x-layout>
    <script src="{{ asset('dist/assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main" class='layout-navbar navbar-fixed'>
            <x-header></x-header>
            <div class="col-12 pb-5 d-flex flex-column align-items-center">
                <h2 class="mt-2 fw-bold col-11 text-start">Report</h2>
                <div class="col-12 d-flex justify-content-evenly pt-5">
                    <div style="height: 250px; width: 250px;" class="bg-light rounded">
    
                    </div>
                    <div style="height: 250px; width: 250px;" class="bg-light rounded">
    
                    </div>
                    <div style="height: 250px; width: 250px;" class="bg-light rounded">
    
                    </div>
                </div>
                <h2 class="mt-5 fw-bold col-11 text-start">Top search</h2>
                <div class="col-11 mt-3 gap-3 d-flex flex-column align-items-center justify-content-start overflow-y-scroll" style="max-height: 30vh">
                    <div class="bg-secondary col-12 rounded" style="height: 7vh">a</div>
                    <div class="bg-secondary col-12 rounded" style="height: 7vh">a</div>
                    <div class="bg-secondary col-12 rounded" style="height: 7vh">a</div>
                    <div class="bg-secondary col-12 rounded" style="height: 7vh">a</div>
                    <div class="bg-secondary col-12 rounded" style="height: 7vh">a</div>
                    <div class="bg-secondary col-12 rounded" style="height: 7vh">a</div>
                    <div class="bg-secondary col-12 rounded" style="height: 7vh">a</div>
                </div>
                <h2 class="mt-5 fw-bold col-11 text-start">View report</h2>
                <div class="col-11 bg-secondary mt-2" style="height: 50vh"></div>
            </div> 
        </div>
        
    </div>
</x-layout>