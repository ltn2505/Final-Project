@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Students by status</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    </head>

    <body>

        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Worldwide Sales</h6>
                            <a href="">Show All</a>
                        </div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Salse & Revenue</h6>
                            <a href="">Show All</a>
                        </div>
                        <canvas id="studentsByStatusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>



        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var data = {!! json_encode($data) !!};
            var chart = new Chart(ctx, {
                type: 'pie',
                data: data,
            });

            var data1 = @json($data1);
            var options = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            };

            var ctx1 = document.getElementById('studentsByStatusChart').getContext('2d');
            var studentsByStatusChart = new Chart(ctx1, {
                type: 'bar',
                data: data1,
                options: options
            });
        </script>
    </body>

    </html>
@endsection
