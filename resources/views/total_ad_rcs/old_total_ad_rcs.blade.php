@extends('layouts.master') 
@section('main-content')

@section('title') {{'Employee '}} @endsection
<div class="col-lg-12">
    <h6></h6>
    <div class="card">
        <div class="card-body">

 @if(Auth::guard('employee')->check())
 @isset($flag)
 <form class="mt-5 mb-5 login-input" method="post" action="{{ route('old-total-ad&rcs-employee') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <h6><b>Pin</b></h6>
            <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="old total ad and rcs" name="pin" id="pin" value='' required>
        </div>
        
        <input type="hidden" value="old-total-ad&rcs" name="page_name">

                                                
    </div>    
   <button type="submit" class="btn mb-1 btn-success" name="AdoptEntry"> Submit Pin</button>
</form>
@endisset
@endif
@if(Auth::guard('admin')->check() || @isset($pin))
            
            <h2 class="text-center text-blue">Old Ad And Rcs Total Entry</h2>
            
            <div class="basic-form">
                <form class="mt-5 mb-5 login-input" method="post" action="{{ @$editData ? route('old-ad&rcs-update-employee',$editData->id) : route('old-ad&rcs-insert') }}" enctype="multipart/form-data">

                    @csrf
                    <div class="form-row">
                    
                        <div class="form-group col-md-6">
                            <h6><b>Member Id</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"
                                placeholder=" Member Id" name="member_id" value="{{ @$editData->member_id }}"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6><b>Total Ad</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"
                                placeholder="Total Ad" name="old_total_ad" value="{{ @$editData->old_total_ad }}"
                                required>
                        </div>

                        <div class="form-group col-md-6">
                            <h6><b>Cash Ad</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"
                                placeholder="  Cash Ad" name="old_cash_ad" value="{{ @$editData->old_cash_ad }}"
                                required>
                        </div>
                        
                        <div class="form-group col-md-6">
                                <h6><b>Cheque Ad</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control"
                                placeholder="Cheque Ad" name="old_cheque_ad" value="{{ @$editData->old_cheque_ad }}">
                        </div>                                    
                        <div class="form-group col-md-6">
                            <h6><b>Paid Ad</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"
                            placeholder="Paid Ad" name="old_total_paidad" value="{{ @$editData->old_total_paidad }}">
                    </div>  
                    <div class="form-group col-md-6">
                        <h6><b>Due Ad</b></h6>
                        <input style="border: .01px solid #969393;" type="text" class="form-control"
                        placeholder="Due Ad" name="old_total_duead" value="{{ @$editData->old_total_duead }}">
                </div>  
      
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h6><b>Total Rcs</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"
                            placeholder="Total Rcs" name="old_total_rcs" value="{{ @$editData->old_total_rcs }}">
                    </div>  
                    <div class="form-group col-md-6">
                        <h6><b>Cash Rcs</b></h6>
                        <input style="border: .01px solid #969393;" type="text" class="form-control"
                        placeholder="Cash Rcs" name="old_cash_rcs" value="{{ @$editData->old_cash_rcs }}">
                </div>  
                <div class="form-group col-md-6">
                    <h6><b>Cheque Rcs</b></h6>
                    <input style="border: .01px solid #969393;" type="text" class="form-control"
                    placeholder="Cheque Rcs" name="old_cheque_rcs" value="{{ @$editData->old_cheque_rcs }}">
            </div>  
            <div class="form-group col-md-6">
                <h6><b>Paid Rcs</b></h6>
                <input style="border: .01px solid #969393;" type="text" class="form-control"
                placeholder="Paid Rcs" name="old_total_paidrcs" value="{{ @$editData->old_total_paidrcs }}">
        </div>  


        <div class="form-group col-md-6">
            <h6><b>Due Rcs</b></h6>
            <input style="border: .01px solid #969393;" type="text" class="form-control"
            placeholder="Paid Rcs" name="old_total_duercs" value="{{ @$editData->old_total_duercs }}">
    </div> 
                        
                     
                        
                    </div>
                   
                    <button type="submit" class="btn mb-1 btn-success" name="EmployeeEntry"> {{ @$editData ? 'Update' : 'Insert' }}</button>

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
                <th>Member Id</th>
                <th>Old total Ad</th>
                <th>Old Cash Ad</th>
                <th>Old Cheque Ad</th>
                <th>Old Paidad</th>
                <th>Old Duead</th>
                <th>Old total Rcs</th>
                <th>Old Cash Rcs</th>
                <th>Old Cheque Rcs</th>
                <th>Old Paidrcs</th>
                <th>Old Duercs</th>
               
            </tr>
        </thead>
        <tbody> 
       
                
            <td>{{ $last->member_id }}</td>
            <td>{{ $last->old_total_ad }}</td>
            <td>{{ $last->old_cash_ad }}</td>
            <td>{{ $last->old_cheque_ad }}</td>
            <td>{{ $last->old_total_paidad }}</td>
            <td>{{ $last->old_total_duead }}</td>

            <td>{{ $last->old_total_rcs }}</td>
            <td>{{ $last->old_cash_rcs }}</td>
            <td>{{ $last->old_cheque_rcs }}</td>

            <td>{{ $last->old_total_paidrcs }}</td>
            <td>{{ $last->old_total_duercs }}</td>

                    {{-- <td>
                        <a class="btn btn-danger btn-sm"
                         href="{{ route('employee-update',$item->id) }}">update</a>
                      
                    </td> --}}
                </tr>
           
        </tbody>
       
    </table>
</div>
    
@endisset

@isset($data)
    



    <div class="row">
        <div class="col-12">
            @if(Auth::guard('employee')->check())
            @isset($flag)
            <form class="mt-5 mb-5 login-input" method="post" action="{{ route('old-total-ad&rcs-employee-table') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <h6><b>Pin</b></h6>
                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="old total ad and rcs table" name="pin" id="pin" value='' required>
                    </div>
                    
                    <input type="hidden" value="old-total-ad&rcs-table" name="page_name">
            
                                                            
                </div>    
               <button type="submit" class="btn mb-1 btn-success" name="AdoptEntry"> Submit Pin</button>
            </form> 
       
            @endisset
            @endif


            @if(Auth::guard('admin')->check() || @isset($pinTable))
            <div class="card">
                <div class="card-body">
                
            

                    <a class="text-center"><h4>Employee List</h4></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="adopttable">
                            <thead>
                                <tr>
                <th>Member Id</th>
                <th>Old total Ad</th>
                <th>Old Cash Ad</th>
                <th>Old Cheque Ad</th>
                <th>Old Paidad</th>
                <th>Old Duead</th>
                <th>Old total Rcs</th>
                <th>Old Cash Rcs</th>
                <th>Old Cheque Rcs</th>
                <th>Old Paidrcs</th>
                <th>Old Duercs</th>
                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                 @foreach ($data as $item)
                                    
                                      
                    <td>{{ $item->member_id }}</td>
                    <td>{{ $item->old_total_ad }}</td>
                    <td>{{ $item->old_cash_ad }}</td>
                    <td>{{ $item->old_cheque_ad }}</td>
                    <td>{{ $item->old_total_paidad }}</td>
                    <td>{{ $item->old_total_duead }}</td>

                    <td>{{ $item->old_total_rcs }}</td>
                    <td>{{ $item->old_cash_rcs }}</td>
                    <td>{{ $item->old_cheque_rcs }}</td>

                    <td>{{ $item->old_total_paidrcs }}</td>
                    <td>{{ $item->old_total_duercs }}</td>
                              
                                           
                    <td>
                        <a class="btn btn-danger btn-sm"
                            href="{{ route('old-ad&rcs-update',$item->id) }}">update</a>
                        
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