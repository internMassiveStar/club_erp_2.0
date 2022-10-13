@extends('layouts.master')
@section('title') {{'RCS Details '}} @endsection

@section('main-content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="text-center"><h4>Cash RCS Details</h4></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="Mytable">
                            <thead>
                                <tr>
                            
                             
                                    <th>ReceivingDate</th>
                                    <th>ReceivingTime</th>
                                    <th>ReceivingAmount</th>
                                    <th>Receipt By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($data as $item )
                                    <td>{{ $item->receiving_date }}</td>
                                    <td>{{ \Carbon\Carbon::parse( $item->receiving_date)->diffForHumans() }}</td>
                                    <td>{{ $item->receiving_amount }}</td>
                                    <td>{{ $item->insert_by }}</td>
                                        
                                  
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                   
                                    <th>Total RCS Cash</th>
                                    <th>{{ $data->sum('receiving_amount') }}</th>
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="text-center"><h4>Cheque RCS Details</h4></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="Mtable">
                            <thead>
                            <tr>
                                    <th>Cheque No</th>
                                    <th>Cheque Type</th>
                                    <th>Bank Name</th>
                                    <th>Cheque Amount</th>
                                    <th>Cheque ReceivingDate</th>
                                    <th>Cheque Date</th>
                                    <th>Honored Date</th>
                                    <th>Dishonored Date</th>
                                    <th>Receipt By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($cheques_data as $item )
                                    <td>{{ $item->cheque_no }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->bank_name }}</td>
                                    <td>{{ $item->receiving_amount }}</td>
                                    <td>{{ $item->receiving_date }}</td>
                                  
                                    <td>{{ $item->cheque_date }}</td>
                                    <td>{{ $item->honored_date }}</td>
                                    <td>{{ $item->dishonored_date }}</td>
                                    <td>{{ $item->cheque_inby }}</td>
                                  
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    
                                    <th>Total RCS Cheque</th>
                                    <th>{{ $cheques_data->sum('receiving_amount') }}</th>
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection