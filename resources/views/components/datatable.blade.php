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