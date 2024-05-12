@extends('layouts.user_type.auth')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> --}}

<form action="" method="get">
  @csrf
<div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <input type="number" id="datepicker" placeholder="Tahun: {{ date('Y') }}" value="{{ $tahun ?? date('Y') }}" name="tahun" class="date-own form-control">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <button class="btn btn-success">Filter</button>
      </div>
    </div>
  </div>
</form>
  <div class="row mt-4">
    <div class="col-lg-6 mb-lg-0 mb-4">
      <div class="card" style="background: green">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-lg-12">
              <div class="d-flex flex-column h-100">
                <h2 class="font-weight-bolder" style="color: white">SALDO MASUK</h2>
                <h2 class="font-weight-bolder" style="color: white">@currency($kas_masuk)</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-6 mb-lg-0 mb-4">
      <div class="card" style="background: red">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-lg-12">
              <div class="d-flex flex-column h-100">
                <h2 class="font-weight-bolder" style="color: white">PENGELUARAN</h2>
                <h2 class="font-weight-bolder" style="color: white">@currency($kas_masuk)</h2>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div id="container"></div>
        </div>
      </div>
    </div>
  
  </div>


@endsection
@push('dashboard')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



  <script>
 
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Statistik Kas Masuk dan Keluar',
        align: 'left'
    },
    subtitle: {
        text: 'Periode: {{ $tahun }}',
        align: 'left'
    },
    xAxis: {
        categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        crosshair: true,
        accessibility: {
            description: 'Months'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Saldo'
        }
    },
    tooltip: {
        valueSuffix: ' Rp.',
        pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:,.0f}</b><br/>'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:,.0f} Rp.',
                style: {
                    color: '#333'
                }
            }
        }
    },
    series: [
        {
            name: 'Kas Masuk',
            data: @json($charts_kas_masuk),
            color: 'green' // Warna hijau
        },
        {
            name: 'Kas Keluar',
            data: @json($charts_kas_keluar),
            color: '#FF0000' // Warna merah
        }
    ]
});

$("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
  </script>
@endpush

