@extends('layouts.master')
@section('title') {{'Donation '}} @endsection
@section('main-content')
@php
    $success = Session::get('success');
    $error = Session::get('error');

@endphp
@if ($success)
    <div class="alert alert-success">{{ $success }}</div>
@elseif ($error)
    <div class="alert alert-danger">{{ $error }}</div>
@endif

    <div class="card">
        <div class="card-body">
     
                
         
            @if(Auth::guard('employee')->check())
            @isset($flag)

            <form class="mt-5 mb-5 login-input" method="post" action="{{ route('rcs-operation-employee') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <h6><b>Pin</b></h6>
                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="Rcs Entry" name="pin" id="pin" value='' required>
                    </div>
                    
                    <input type="hidden" value="rcs-operation" name="page_name">
            
                                                            
                </div>    
               <button type="submit" class="btn mb-1 btn-success" name="AdoptEntry"> Submit Pin</button>
            </form>
            @endisset
            @endif
      
            @if(Auth::guard('admin')->check() || @isset($pin))
            <h2 class="text-center">Donation</h2>
            <div class="basic-form">
                <form class="mt-5 mb-5 login-input" method="post" action="{{ @$editData ? route('donation-update',$editData->id) : route('donation-entry') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h6><b>Donation Name</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="donation_name"  value='{{ @$editData->donation_name }}' required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6><b>Issue Date</b></h6>
                            <input style="border: .01px solid #969393;" type="date" class="form-control"  name="issue_date" value='{{ @$editData->issue_date }}' required>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <h6 class=""><b>Remarks </b><span class="text-danger">*</span>

                            <textarea style="border: .01px solid #969393;" class="form-control"  name="remarks"  rows="2" cols="100" >{{ @$editData->remarks }}</textarea>
                        </div>
                    </div> 
                    <div class="form-group row">
                        </h6>
                       
                    </div>   
                    <button type="submit" class="btn mb-1 btn-success"> {{ @$editData ? 'Updata' :'Save'}}</button>
                    <!--<button type="submit" class="btn mb-1 btn-danger" name="ADDelete"> Delete</button>-->
                </form>
            </div>
          
            
        </div>
                        
                                                                
                  
           
        </div>
    </div>

@endif
@isset($last)

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
                    <td>{{ $last->insert_by }}</td>
               
                    
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
    
@endisset
@isset($data)
    


    <div class="row">
        <div class="col-12">
            @if(Auth::guard('employee')->check())
            @isset($flag)

            <form class="mt-5 mb-5 login-input" method="post" action="{{ route('rcs-operation-table') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <h6><b>Pin</b></h6>
                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="Rcs Table" name="pin" id="pin" value='' required>
                    </div>
                    
                    <input type="hidden" value="rcs-operation-table" name="page_name">
            
                                                            
                </div>    
               <button type="submit" class="btn mb-1 btn-success" name="AdoptEntry"> Submit Pin</button>
            </form>
            @endisset
            @endif
            @if(Auth::guard('admin')->check() || @isset($pinTable))
            <div class="card">
                <div class="card-body">
                    <a class="text-center"><h4>Donation Table</h4></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="Mytable">
                            <thead>
                                <tr>
                                   
                                    <th>Donation  Name</th> 
                                    <th>Issue Date</th>
                                    <th>Remarks</th>
                                    <th>Insert By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                @foreach ($data as $item)
                                    
                                <td>{{ $item->donation_name }}</td>
                                <td>{{ $item->issue_date }}</td>
                                <td>{{ $item->remarks }}</td>
                                <td>{{ $item->insert_by }}</td>
                               
                                <td>
                                    <a class="btn btn-danger btn-sm"
                                     href="{{ route('donation-show',$item->id) }}">update</a>
                                  
                                </td>
                              
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