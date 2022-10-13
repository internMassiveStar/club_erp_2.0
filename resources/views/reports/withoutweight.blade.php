@extends('layouts.master')
@section('title') {{'Msp with weight'}} @endsection
@section('main-content')
<div class="toolbar hidden-print">
    <div class="text-right">
        <button onclick="exportTableToExcel('tableID','members-data')" class="btn btn-info"><i class="fa fa-save "></i> Export Table Data To Excel File</button>
        <button id="printInvoice" onclick="printDiv('adopttable')" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
       
    </div>
    <hr>
</div>


<div class="table-responsive" id="adopttable">
    <table class="table table-striped table-bordered zero-configuration" id="tableID" >
        <thead>
            <tr>
                <th>Member id</th>
                <th>Member Name</th>
                <th >Member Reference</th>
                <th >Member Club Fund</th>
                <th >Member Referral club fund</th>
                <th >Formation Meeting</th>
                <th >Club Programm</th> 
                <th >Community Program</th>
                <th >Responsibility</th>
                <th >Responsibility Gap</th>
                <th >Consume</th>
                <th >Time Donation</th>
       
          
            </tr>
        </thead>
        <tbody> 
       
                <tr>
                    @foreach ($data as $item)
                        <td >{{ $item->member_id }}</td>
                        <td >{{ $item->member_name }}</td>
                        <td >{{ $item->member_reference }}</td>
                        <td >{{ $item->member_clubfund }}</td>
                        <td >{{ $item->member_referral_clubfund }}</td>
                        <td >{{ $item->member_attend_formationmeeting }}</td>
                        <td >{{ $item->member_attend_clubprogram }}</td>
                        <td >{{ $item->member_attend_communityprogram }}</td>
                        <td >{{ $item->member_responsibility }}</td>
                        <td >{{ $item->member_responsibility_gap }}</td>
                       
                        <td >{{ $item->member_consume }}</td>
                        
                        <td >{{ $item->member_time_donation }}</td>
                    
                </tr>
      @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Member id</th>
                <th>Member Name</th>
                <th >Member Reference</th>
                <th >Member Club Fund</th>
                <th >Member Referral club fund</th>
                <th >Formation Meeting</th>
                <th >Club Programm</th> 
                <th >Community Program</th>
                <th >Responsibility</th>
                <th >Responsibility Gap</th>
                <th >Consume</th>
                <th >Time Donation</th>
               
            </tr>
        </tfoot>
    </table>
</div>
    

    


    


@endsection