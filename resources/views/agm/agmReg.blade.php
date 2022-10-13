@extends('layouts.master')
@section('title') {{'Agm Registration'}} @endsection
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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card">
        <div class="card-body">
     
                
         
         
      
     
            <h2 class="text-center">Agm Registration</h2>
            <div class="basic-form">
                <form class="mt-5 mb-5 login-input" method="post" action="{{route('save-agm')}}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <h6><b>Member Id</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="policy name" name="member_id" id="member_id" value='{{ Auth::guard('member')->user()->member_id }}' readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <h6><b>Member Name</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="amount" name="name" id="member_id" value='{{ Auth::guard('member')->user()->name }}' readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <h6><b>Member Mobile</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="mobile" >
                    </div> 
                    </div>   
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <h6><b>Payment method</b></h6>
                            <select style="border: .01px solid #969393;" class="form-control"  name="payment_method" >
                                 
                                <option value="bkash">Bkash</option>
                              
                                
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <h6><b>Transaction id</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="transaction">
                        </div>
                       
                    </div> 
                    <button type="submit" class="btn mb-1 btn-success"> {{ @$editData ? 'Updata' :'Save'}}</button>
                    <!--<button type="submit" class="btn mb-1 btn-danger" name="ADDelete"> Delete</button>-->
                </form>
            </div>
          
        </div>
                        
                                                                
                  
           
        </div>
    </div>

@isset($last)
    


<div class="table-responsive">
    <table class="table table-striped table-bordered zero-configuration" id="adopttable">
        <thead>
            <tr>
                <th>MemberID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Transaction id</th>
              
       
          
            </tr>
        </thead>
        <tbody> 
       
                <tr>
                  
                    <td>{{ $last->member_id }}</td>
                    <td>{{ $last->member_name }}</td>
                    <td>{{ $last->member_mobile }}</td>
                   
                    <td>{{ $last->transaction_id }}</td>
                   
               
                    
                </tr>
      
        </tbody>
        <tfoot>
            <tr>
                <th>MemberID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Transaction id</th>
               
            </tr>
        </tfoot>
    </table>
</div>
    

    
@endisset



@endsection