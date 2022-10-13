@extends('layouts.master')

@section('title')
    AD Operation
@endsection

@section('main-content')


    <div class="card">
        <div class="card-body">
            @if(Auth::guard('employee')->check())
            @isset($flag)
            <form class="mt-5 mb-5 login-input" method="post" action="{{ route('ad-operation-employee') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <h6><b>Pin</b></h6>
                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="Ad Operation" name="pin" id="pin" value='' required>
                    </div>
                    
                    <input type="hidden" value="ad-operation" name="page_name">
            
                                                            
                </div>    
               <button type="submit" class="btn mb-1 btn-success" name="AdoptEntry"> Submit Pin</button>
            </form>
            @endisset
            @endif


            @if(Auth::guard('admin')->check() || @isset($pin))
  
            <h2 class="text-center">Asset Deposit Operation</h2>
            <div class="basic-form">
                <form class="mt-5 mb-5 login-input" method="post" action="{{ @$editData ? route('ad-operationUpdate',$editData->id): route('ad-operation') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h6><b>Member ID</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder=" Member ID" name="member_id" id="member_id" value='{{ @$editData->member_id }}' required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6><b>Receiving Date</b></h6>
                            <input style="border: .01px solid #969393;" type="date" class="form-control" placeholder=" Receiving Date" name="receiving_date" id="receiving_date" value='{{ @$editData->receiving_date }}' required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6><b>Receiving Amount</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder=" Receiving Amount" name="receiving_amount" id="receiving_amount" value='{{ @$editData->receiving_amount }}'required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6><b>Receiving Tool</b></h6>
                            <div class="col-lg-6">
                                <select style="border: .01px solid #969393;" class="form-control"  name="receiving_tool" id="receiving_tool">
                                    <option value="{{ @$editData->receiving_tool }}">{{ @$editData ? $editData->receiving_tool : "Please select" }}</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheque">Cheque</option>
                                </select>
                            </div>
                        </div>  
                
                                                                
                    </div>    
                   <button type="submit" class="btn mb-1 btn-success" name="AdoptEntry"> {{ @$editData ? 'Update' : 'Insert' }}</button>
                </form>
            </div>
            @endif
        </div>
    </div>

@isset($last)
<button onclick="printDiv('printMe')" class="btn-btn primary">Print</button>
<div id='printMe'>
<div class="table-responsive">
    <table class="table table-striped table-bordered zero-configuration" id="adopttable">
        <thead>
            <tr>
                <th>MemberID</th>
                <th>Member Name</th>
                <th>ReceivingDate</th>
                <th>ReceivingAmount</th>
                <th>ReceivingTool</th>
                <th>Insert by ID</th>
       
          
            </tr>
        </thead>
        <tbody> 
       
                <tr>
                  
                    <td>{{ $last->member_id }}</td>
                    <td>{{ $last->name }}</td>
                    <td>{{ $last->receiving_date }}</td>
                    <td>{{ $last->receiving_amount }}</td>
                    <td>{{ $last->receiving_tool }}</td>
                    <td>{{ $last->insert_emp_id }}</td>
               
                    
                </tr>
      
        </tbody>
        <tfoot>
            <tr>
                <th>MemberID</th>
                <th>Member Name</th>
                <th>ReceivingDate</th>
                <th>ReceivingAmount</th>
                <th>ReceivingTool</th>
                <th>Insert By</th>
               
            </tr>
        </tfoot>
    </table>
</div>
</div>
    
@endisset

@isset($data)


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(Auth::guard('employee')->check())
                    @isset($flag)
                    <form class="mt-5 mb-5 login-input" method="post" action="{{ route('ad-operation-table') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h6><b>Pin</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="Pin" name="pin" id="pin" value='' required>
                            </div>
                            
                            <input type="hidden" value="ad-operation-table" name="page_name">
                    
                                                                    
                        </div>    
                       <button type="submit" class="btn mb-1 btn-success" name="AdoptEntry"> Submit Pin</button>
                    </form>
                    @endisset
                    @endif

                    @if(Auth::guard('admin')->check() || @isset($pinTable))
                    <button onclick="printDiv('printMe')" class="btn-btn primary">Print</button>
                    <div id='printMe'>
                  
                     
                    <a class="text-center"><h4>AD Operation Table</h4></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="adopttable">
                            <thead>
                                <tr>
                                    <th>MemberID</th>
                                    <th>Member Name</th>
                                    <th>ReceivingDate</th>
                                    <th>ReceivingAmount</th>
                                    <th>ReceivingTool</th>
                                    <th>Insert by ID</th>
                                    <th>Update by ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($data as $item)
                                    <tr>
                                        <form action="{{ route('ad-operationEdit',$item->id) }}" method="get">
                                        <td>{{ $item->member_id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->receiving_date }}</td>
                                        <td>{{ $item->receiving_amount }}</td>
                                        <td>{{ $item->receiving_tool }}</td>
                                        <td>{{ $item->insert_emp_id }}</td>
                                        <td>{{ $item->update_emp_id }}</td>
                                        <td><input type="submit" 
                                            class="btn btn-outline-danger rounded-pill"
                                            value="Edit" name="edit"></td>
                                            </form>
                                    </tr>
                                @endforeach  
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>MemberID</th>
                                    <th>Member Name</th>
                                    <th>ReceivingDate</th>
                                    <th>ReceivingAmount</th>
                                    <th>ReceivingTool</th>
                                    <th>Insert EmployeeID</th>
                                    <th>Update by ID</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif

@if(Auth::guard('admin')->check())

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="text-center"><h4>Ad (Cash) Waiting for Admin  Approval</h4></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="Mytable">
                            <thead>
                                <tr>
                                    <th>MemberID</th>
                                    <th>Member Name</th>
                                    
                                    <th>ReceivingAmount</th>
                                    <th>ReceivingDate</th>
                                
                                    <th>Insert By</th>
                                  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                @foreach ($data as $item)
                                @if($item->receiving_tool=='Cash' && $item->status== '0')
                                <td>{{ $item->member_id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->receiving_amount }}</td>
                                <td>{{ $item->receiving_date }}</td>
                              
                                <td>{{ $item->insert_emp_id }}</td>
                              
                                <td>
                                    <a class="btn btn-danger btn-sm"
                                     href="{{ route('ad-confirm',$item->id) }}">Confirm</a>
                                  
                                </td>
                               @endif
                                </tr>
                         @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
@endisset
     
@endsection

