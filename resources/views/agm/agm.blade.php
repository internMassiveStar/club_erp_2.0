@extends('layouts.master')
@section('title') {{'Agm'}} @endsection
@section('main-content')

<div class="toolbar hidden-print">
    <div class="text-right">
        <button onclick="exportTableToExcel('tableID','agm-registration-data')" class="btn btn-info"><i class="fa fa-save "></i> Export Table Data To Excel File</button>
        <button id="printInvoice" onclick="printDiv('adopttable')" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
       
    </div>
    <hr>
</div>
<div class="table-responsive" id="adopttable">
    <table class="table table-striped table-bordered zero-configuration" id="tableID">
        <thead>
            <tr>
                <th>MemberID</th>
                <th>Member Name</th>
                <th>Member Mobile</th>
                <th>Request Date</th>
                <th>Request Time</th>
                <th>Payment Method</th>
                <th>Transaction Id</th>
       
          
            </tr>
        </thead>
        <tbody> 
       
                <tr>
                    @foreach ($data as $item)
                    <td>{{ $item->member_id }}</td>
                    <td>{{ $item->member_name }}</td>
                    <td>{{ $item->member_mobile }}</td>
                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                    <td>{{ $item->created_at->format('g:i A') }}</td>
                    <td>{{ $item->payment_method }}</td>
                    <td>{{ $item->transaction_id }}</td>
                </tr>
      @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>MemberID</th>
                <th>Member Name</th>
                <th>Member Mobile</th>
                <th>Request Date</th>
                <th>Request Time</th>
                <th>Payment Method</th>
                <th>Transaction Id</th>
       
               
            </tr>
        </tfoot>
    </table>
</div>
    

    


    


@endsection