@extends('layouts.master')
@section('title')
    Rcs Active and Deactive member    
@endsection 
@section('main-content')
    <div class="row">

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a class="text-center">
                        <h4> RCS Active Members List</h4>
                    </a>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="dishonoredCheque">
                            <thead>
                                <tr>
                                    <th>Member Id</th>
                                    <th>Member Name</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>AD Amount</th>
                                    <th>MSP</th>
                                    <th>RCS</th>
                                    <th>Remarks</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member_rcs as $item)
                                <tr>
                                    <td>{{ $item->member_id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->type  }}</td>
                                    <td>{{ $item->ad }}</td>
                                    <td>{{ $item->msp }}</td>
                                    <td>{{ $item->rcs }}</td>
                                    <td>{{ $item->remarks }}</td>
                                    <td><a class="btn btn-outline-danger rounded-pill" href="{{ route('noRcs_deactive',$item->id) }}">Deactive</a></td>
                                    
                                    
                                </tr>
                                    
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Member Id</th>
                                    <th>Member Name</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>AD Amount</th>
                                    <th>MSP</th>
                                    <th>RCS</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a class="text-center">
                        <h4> RCS DeActive Members List </h4>
                    </a>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="againstdishonoredCheque">
                            <thead>
                                <tr>
                                    <th>Member Id</th>
                                    <th>Member Name</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>AD Amount</th>
                                    <th>MSP</th>
                                    <th>RCS</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($member_norcs as $item)
                                <tr>
                                    <td>{{ $item->member_id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->type  }}</td>
                                    <td>{{ $item->ad }}</td>
                                    <td>{{ $item->msp }}</td>
                                    <td>{{ $item->rcs }}</td>
                                    <td>{{ $item->remarks }}</td>
                                    <td><a class="btn btn-outline-success rounded-pill" href="{{ route('noRcs_active',$item->id) }}">Active</a></td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Member Id</th>
                                    <th>Member Name</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>AD Amount</th>
                                    <th>MSP</th>
                                    <th>RCS</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>               
    </div>
@endsection