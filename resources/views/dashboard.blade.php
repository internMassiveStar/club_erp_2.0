@extends('layouts.master') 
@section('main-content')
@section('title') {{'Dashboard'}} @endsection

<div class="container-fluid" >
@isset($data)
    


<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
            <div class="card-body">
                <h3 class="card-title text-white">Total AD</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">
                        {{ $data->sum('total_ad') }}
                    </h2>
                    <!-- <p class="text-white mb-0">August - October 2021</p> -->
                </div>
                 <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span> 
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-2">
            <div class="card-body">
                <h3 class="card-title text-white">Paid AD</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">
                        {{ $data->sum('total_paidad') }}
                    </h2>
                    <!-- <p class="text-white mb-0">August - October 2021</p> -->
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-3">
            <div class="card-body">
                <h3 class="card-title text-white">Due AD</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">
                        {{ $data->sum('total_duead') }}
                    </h2>
                    <!-- <p class="text-white mb-0">August - October 2021</p> -->
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
            <div class="card-body">
                <h3 class="card-title text-white">Total RCS</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">
                        {{ $data->sum('total_rcs') }}
                    </h2>
                    <!-- <p class="text-white mb-0">August - October 2021</p> -->
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-2">
            <div class="card-body">
                <h3 class="card-title text-white">Paid RCS</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">
                        {{ $data->sum('total_paidrcs') }}
                    </h2>
                    <!-- <p class="text-white mb-0">August - October 2021</p> -->
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-3">
            <div class="card-body">
                <h3 class="card-title text-white">Due RCS</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">
                        {{ $data->sum('total_duercs') }}
                    </h2>
                    <!-- <p class="text-white mb-0">August - October 2021</p> -->
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
            </div>
        </div>
    </div>
   
</div>


<style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartMenu {
        width: 100vw;
        height: 40px;
        background: #1A1A1A;
        color: rgba(255, 26, 104, 1);
      }
      .chartMenu p {
        padding: 10px;
        font-size: 20px;
      }
      .chartCard {
        width: 80vw;
        height: calc(80vh - 40px);
        background: rgba(255, 26, 104, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 95%;
        height: calc(75vh - 40px);
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(255, 26, 104, 1);
        background: rgb(0, 0, 0);
        display: inline-flex;
      }
      .curve{
        position: relative;
        width: 100%;
      }
    </style>
<div class="row">
    {{-- for msp chart --}}
        {{-- <div class="chartMenu">
      <p>WWW.CHARTJS3.COM (Chart JS 3.9.1)</p>
    </div> --}}
    <div class="chartCard">
      <div class="chartBox">
        <div id="curve_chart" class="curve"></div>
        {{-- <pre>
        {{ $max_msp }}
        </pre> --}}

      </div>
    </div>

</div>









@endisset
</div>



@endsection
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>
    // setup 
    const data = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: [18, 12, 6, 9, 12, 3, 9],
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        tension: 0.4,
      }]
    };

    // config 
    const config = {
      type: 'line',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
    </script> --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['MSP Type', 'Personal MSP ('+{{ Round($msp_data['msp'],2) }}+')', 'Highest MSP('+{{ $max_msp['msp'] }}+')'],
          ['member_reference',  {{ $msp_data['member_reference'] }},  {{ $max_msp['member_reference'] }}],
          ['member_clubfund', {{ $msp_data['member_clubfund'] }},     {{ $max_msp['member_clubfund'] }}],
          ['member_referral_clubfund',{{ $msp_data['member_referral_clubfund'] }},{{ $max_msp['member_referral_clubfund'] }}],
          ['attend_formationmeeting', {{ $msp_data['member_attend_formationmeeting'] }},{{ $max_msp['member_attend_formationmeeting'] }}],
          ['attend_clubprogram',{{ $msp_data['member_attend_clubprogram'] }},{{ $max_msp['member_attend_clubprogram'] }}],
          ['attend_communityprogram',{{ $msp_data['member_attend_communityprogram'] }},{{ $max_msp['member_attend_communityprogram'] }}],
          ['responsibility_gap',  {{ $msp_data['member_responsibility_gap'] }},      {{ $max_msp['member_responsibility_gap'] }}],
          ['member_responsibility',  {{ $msp_data['member_responsibility'] }},      {{ $max_msp['member_responsibility'] }}],
          ['member_consume',  {{ $msp_data['member_consume'] }},      {{ $max_msp['member_consume'] }}],
          ['time_donation',  {{ $msp_data['member_time_donation'] }},      {{ $max_msp['member_time_donation'] }}]
        ]);

        var options = {
          title: 'MSP Performance',
          curveType: 'function',
          legend: { position: 'top' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
