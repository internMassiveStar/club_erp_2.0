@extends('layouts.master')
@section('title') {{'Member MSP Details'}} @endsection
@section('main-content')
    

 <div aline='center'>
  <div id="msp_chart"></div>
</div>   

{{-- <pre>
  <div>{{ $memberwithout }}</div>  
</pre> --}}


    


@endsection
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{-- <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['MSP Part Name', 'Values'],
          ['member_reference (10)',     {{ $memberwithout['member_reference'] }}],
          ['member_clubfund (10)',     {{ $memberwithout['member_clubfund'] }}],
          ['member_referral_clubfund (10)',     {{ $memberwithout['member_referral_clubfund'] }}],
          ['member_attend_formationmeeting (10)',     {{ $memberwithout['member_attend_formationmeeting'] }}],
          ['member_attend_clubprogram (10)',     {{ $memberwithout['member_attend_clubprogram'] }}],
          ['member_attend_communityprogram (10)',     {{ $memberwithout['member_attend_communityprogram'] }}],
          ['member_responsibility_gap (10)',     {{ $memberwithout['member_responsibility_gap'] }}],
          ['member_responsibility (10)',     {{ $memberwithout['member_responsibility'] }}],
          ['member_consume (10)',     {{ $memberwithout['member_consume'] }}],
          ['member_time_donation (10)',     {{ $memberwithout['member_time_donation'] }}]
        ]);

        var options = {
          title: 'MSP Details With Out Weight (100)',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script> --}}
<script type="text/javascript">
  $(function(){
        let msp_with_weight = [
                                ['member_reference (25%)',{{ $memberwith['member_reference'] }}],
                                ['member_clubfund (15%)',{{ $memberwith['member_clubfund'] }}],
                                ['member_referral_clubfund (16%)',{{ $memberwith['member_referral_clubfund'] }}],
                                ['member_attend_formationmeeting (4%)',{{ $memberwith['member_attend_formationmeeting'] }}],
                                ['member_attend_clubprogram (4%)',{{ $memberwith['member_attend_clubprogram'] }}],
                                ['member_attend_communityprogram (4%)',{{ $memberwith['member_attend_communityprogram'] }}],
                                ['member_responsibility_gap (4%)',{{ $memberwith['member_responsibility_gap'] }}],
                                ['member_responsibility (4%)',{{ $memberwith['member_responsibility'] }}],
                                ['member_consume (4%)',{{ $memberwith['member_consume'] }}],
                                ['member_time_donation (20%)',{{ $memberwith['member_time_donation'] }}]
                              ];
    let msp_without_weight = [
                                ['member_reference (10)',{{ $memberwithout['member_reference'] }}],
                                ['member_clubfund (10)',{{ $memberwithout['member_clubfund'] }}],
                                ['member_referral_clubfund (10)',{{ $memberwithout['member_referral_clubfund'] }}],
                                ['member_attend_formationmeeting (10)',{{ $memberwithout['member_attend_formationmeeting'] }}],
                                ['member_attend_clubprogram (10)',{{ $memberwithout['member_attend_clubprogram'] }}],
                                ['member_attend_communityprogram (10)',{{ $memberwithout['member_attend_communityprogram'] }}],
                                ['member_responsibility_gap (10)',{{ $memberwithout['member_responsibility_gap'] }}],
                                ['member_responsibility (10)',{{ $memberwithout['member_responsibility'] }}],
                                ['member_consume (10)',{{ $memberwithout['member_consume'] }}],
                                ['member_time_donation (10)',{{ $memberwithout['member_time_donation'] }}]

                             ];
    let msp_actual_value =  [

                              ['member_reference (10)',     {{ $memberwithout['member_reference'] }}],
                              ['member_reference (10)',     {{ $memberwithout['member_reference'] }}]
                            ];
    let mspData = [msp_with_weight,msp_without_weight];

    for( let r = 0; r<mspData.length; r++){
     
      let title = ["MSP With Weight","MSP With Out Weight"];
      $("#msp_chart").append("<div id='msp_chart"+r+"'></div>");

      google.charts.load('current',{
        callback: function(){
          var data = new google.visualization.DataTable();
          data.addColumn('string','MSP Category');
          data.addColumn('number','Category value');
          data.addRows(mspData[r]);
          

          var options = {
            title: title[r],
            width: 1100,
            height: 400,
            is3D: true
          };

          let chart_div = document.getElementById("msp_chart"+r);
          let chart = new google.visualization.PieChart(chart_div);

          // google.visualization.events.addListener(chart,'ready',function(){
          //    chart_div.innerHTML = '<img src="'+chart.getImageURI() +'">';
          // });
          chart.draw(data,options);
        },
        packages: ['corechart']
      })

      
    }
  });

</script>