<x-layout>
    <script src="{{ asset('dist/assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main" class='layout-navbar navbar-fixed'>
            <x-header></x-header>
            <div class="col-12 pb-5 d-flex flex-column align-items-center">
                <h2 class="mt-2 fw-bold col-11 text-start">Report</h2>
                <div class="col-12 d-flex justify-content-evenly pt-5">
                    <div style="height: 250px; width: 250px;" class="text-light bg-primary gap-3 p-5 rounded d-flex flex-column align-items-center">
                        <i class="fa-solid fa-right-to-bracket" style="font-size:80px"></i>
                        <label class="h5">User Login</label>
                        <h3 class="text-bold">9,000</h3>
                    </div>
                    <div style="height: 250px; width: 250px;" class="text-light bg-primary gap-3 p-5 rounded d-flex flex-column align-items-center">
                        <i class="fa-brands fa-itunes-note" style="font-size:80px"></i>
                        <label class="h5">Available song</label>
                        <h3 class="text-bold">1,000,000</h3>
                    </div>
                    <div style="height: 250px; width: 250px;" class="text-light bg-primary gap-3 p-5 rounded d-flex flex-column align-items-center">
                        <i class="fa-solid fa-users" style="font-size:80px"></i>
                        <label class="h5">User Account</label>
                        <h3 class="text-bold">999,902,123</h3>
                    </div>
                </div>
                <h2 class="mt-5 fw-bold col-11 text-start">Top search</h2>
                <div class="col-11 mt-3 gap-3 d-flex flex-column align-items-center justify-content-start overflow-y-auto" style="max-height: 30vh">
                    <div class="bg-primary text-light col-12 rounded d-flex gap-3 ps-3 align-items-center" style="height: 7vh">
                        <i class="fa-solid fa-crown" style="font-size: 25px"></i>
                        <label style="font-size: 17px">Sampai Menutup Mata - Mahahili</label>
                    </div>
                </div>
                <h2 class="mt-5 fw-bold col-11 text-start">View report</h2>
                <div class="col-11 bg-light my-3">
                    <div class="col-12 align-items-center justify-content-center d-flex p-5">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('myChart').getContext('2d');

        const myChart = new Chart(ctx, {
            type: 'bar', // You can change this to 'line', 'pie', etc.
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
    </script>
    <script src="{{ asset('dist/assets/extensions/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/ui-chartjs.js') }}"></script>

</x-layout>