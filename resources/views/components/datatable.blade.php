<div class="container justify-content-center d-flex mt-5">
    <div class="row col-11">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ $title }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                    {{ $theader }}
                            </thead>
                            <tbody>
                                {{ $slot }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>