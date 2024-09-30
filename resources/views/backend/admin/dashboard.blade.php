@extends('backend.layouts.app', ['title' => 'Dashboard'])
@section('content')
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">

    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total User Lembaga</p>
                        <h4 class="my-1">{{$totallembag}}</h4>
                    </div>
                    <div class="widgets-icons rounded-circle text-white ms-auto bg-gradient-burning"><i class="bx bxs-group"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Pelatihan</p>
                        <h4 class="my-1">{{$totalpelatihan}}</h4>
                    </div>
                    <div class="widgets-icons rounded-circle text-white ms-auto bg-gradient-voilet"><i class="bx bxs-group"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Store Visitors</p>
                        <h4 class="my-1">59K</h4>
                    </div>
                    <div class="widgets-icons rounded-circle text-white ms-auto bg-gradient-branding"><i class="bx bxs-binoculars"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Bounce Rate</p>
                        <h4 class="my-1">34.46%</h4>
                    </div>
                    <div class="widgets-icons rounded-circle text-white ms-auto bg-gradient-kyoto"><i class="bx bx-line-chart-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-8 col-xl-8 d-flex">
      <div class="card radius-10 w-100">
        <div class="card-body">
          <div class="d-flex align-items-center mb-3">
            <h5 class="mb-0">Pelatihan</h5>
            <div class="dropdown options ms-auto">
            </div>
          </div>

          <div class="chart-js-container1">
            <canvas id="chart1"></canvas>
          </div>

        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4 col-xl-4 d-flex">
        <div class="card radius-10 overflow-hidden w-100">
          <div class="card-body">
            <div class="d-flex align-items-center mb-3">
              <h5 class="mb-0">Top Kategori</h5>
              <div class="dropdown options ms-auto">
              </div>
            </div>
            <div class="chart-js-container2 mt-4">
              <div class="piechart-legend">
                <h2 class="mb-1">{{$kategoriCount}}</h2>
                <h6 class="mb-0">Total </h6>
               </div>
              <canvas id="chart2"></canvas>
            </div>
          </div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    fetch('/api/data/grafik')
        .then(response => response.json())
        .then(data => {
            var ctx = document.getElementById('chart1').getContext('2d');

            var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke1.addColorStop(0, '#009efd');
            gradientStroke1.addColorStop(1, '#2af598');

            var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke2.addColorStop(0, '#7928ca');
            gradientStroke2.addColorStop(1, '#ff0080');

            var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke3.addColorStop(0, '#ff8359');
            gradientStroke3.addColorStop(1, '#ffdf40');

            // Menyesuaikan datasets dengan gradien
            data.datasets.forEach((dataset, index) => {
                if (index === 0) dataset.backgroundColor = gradientStroke1;
                if (index === 1) dataset.backgroundColor = gradientStroke2;
                if (index === 2) dataset.backgroundColor = gradientStroke3;
            });

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: data.datasets
                },
                options: {
                    maintainAspectRatio: false,
                    barPercentage: 0.7,
                    categoryPercentage: 0.45,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            display: true,
                        }
                    },
                    scales: {
                        x: {
                            stacked: false,
                            beginAtZero: true
                        },
                        y: {
                            stacked: false,
                            beginAtZero: true
                        }
                    }
                }
            });
        });
</script>
<script>
    fetch('/api/data/top-kategori')
        .then(response => response.json())
        .then(data => {
            var ctx = document.getElementById('chart2').getContext('2d');

            var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke1.addColorStop(0, '#005bea');
            gradientStroke1.addColorStop(1, '#00c6fb');

            var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke2.addColorStop(0, '#ff6a00');
            gradientStroke2.addColorStop(1, '#ee0979');

            var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke3.addColorStop(0, '#17ad37');
            gradientStroke3.addColorStop(1, '#98ec2d');

            // Mengatur data untuk chart
            var labels = data.map(item => item.kategori_name);
            var chartData = data.map(item => item.count);

            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: chartData,
                        backgroundColor: [
                            gradientStroke1,
                            gradientStroke2,
                            gradientStroke3,
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: 110,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            });
        });
</script>
@endpush
