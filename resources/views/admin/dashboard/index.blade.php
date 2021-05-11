@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->

    <div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Ringkasan Peramalan</h6>
            <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
            <canvas id="forecastChart"></canvas>
            </div>
        </div>
        </div>
    </div>

    </div>
          {{-- @push('scripts')
          <script>
            let canvasForecast = $('#forecastChart');
            let forecasts = <?php echo $forecasts['forecast'] ?>;
            let labels = <?php echo $forecasts['menu'] ?>;

            
            let barChart = new Chart(canvasForecast, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            // lineTension: 0,
                            label: 'Peramalan',
                            borderColor: "#2da15f",
                            backgroundColor: "#2da15f",
                            pointHoverBorderColor: "#2da15f",
                            pointBorderWidth: 10,
                            pointHoverRadius: 10,
                            pointHoverBorderWidth: 1,
                            pointRadius: 3,
                            fill: false,
                            borderWidth: 4,
                            data: forecasts
                        },
                    ]
                },
                options: {
                  responsive:true,
                  maintainAspectRatio: false,
                  // Can't just just `stacked: true` like the docs say
                  scales: {
                  yAxes: [{
                      // stacked: true,
                  }]
                  },
                  animation: {
                      duration: 750,
                  },
                }
            });

          </script>
          @endpush --}}
@endsection