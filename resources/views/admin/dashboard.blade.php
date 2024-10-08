<x-layout>
    <script src="{{ asset('dist/assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main" class='layout-navbar navbar-fixed'>
            <x-header></x-header>
            <div id="main-content">   
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Vertical Layout with Navbar</h3>
                                <p class="text-subtitle text-muted">Navbar will appear on the top of the page.</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <h2 class="mt-5 fw-bold col-11 text-start">Report</h2>
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
</x-layout>