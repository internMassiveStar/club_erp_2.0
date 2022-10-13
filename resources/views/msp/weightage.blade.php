@extends('layouts.master')
@section('title') {{'Company Policy'}} @endsection
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
            <h2 class="text-center">Weightage</h2>
            <div class="basic-form">
                <form class="mt-5 mb-5 login-input" method="post" action="{{ @$editData ? route('weightage-update',$editData->id) : route('weightage-entry') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <h6><b>MSP1 (Network building)</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="msp1" id="member_id" value='{{ @$editData->msp1 }}' required>
                        </div>
                        <div class="form-group col-md-3">
                            <h6><b>MSP2(Club Fund By You)</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="msp2" id="member_id" value='{{ @$editData->msp2 }}' required>
                        </div>
                        <div class="form-group col-md-3">
                            <h6><b>MSP3(Club Fund By Your Refarral)</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="msp3" value='{{ @$editData->msp3 }}' required>
                        </div>
                        <div class="form-group col-md-3">
                            <h6><b>MSP4 (Attend Formation Meeting)</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="msp4" id="member_id" value='{{ @$editData->msp4 }}' required>
                        </div>
                    </div>    
                    <div class="form-row">
                        
                        <div class="form-group col-md-3">
                            <h6><b>MSP5(Attend Club Program)</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="msp5" id="member_id" value='{{ @$editData->msp5 }}' required>
                        </div>
                        <div class="form-group col-md-3">
                            <h6><b>MSP6(Given Responsibity perform)</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="msp6" value='{{ @$editData->msp6 }}' required>
                        </div>
                        <div class="form-group col-md-3">
                            <h6><b>MSP7(Attend Community Program)</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="msp7" id="member_id" value='{{ @$editData->msp7 }}' required>
                        </div>
                        <div class="form-group col-md-3">
                            <h6><b>MSP8(Consume Rate)</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="msp8" id="member_id" value='{{ @$editData->msp8 }}' required>
                        </div>
                    </div>      
                    <div class="form-row">
                    
                        <div class="form-group col-md-4">
                            <h6><b>MSP9(Responsibity Rate)</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="msp9" value='{{ @$editData->msp9 }}' required>
                        </div>
                        <div class="form-group col-md-4">
                            <h6><b>MSP10(Given Time)</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="msp10" value='{{ @$editData->msp10}}' required>
                        </div>
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
                <th>Msp1</th>
                
       
          
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
                   
                    <a class="text-center"><h4>Policy Table</h4></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="Mytable">
                            <thead>
                                <tr>
                                    <th>Msp1</th>
                                    <th>Msp2</th>
                                    <th>Msp3</th>
                                    <th>Msp4</th>
                                    <th>Msp5</th>
                                    <th>Msp6</th>
                                    <th>Msp7</th>
                                    <th>Msp8</th>
                                    <th>Msp9</th>
                                    <th>Msp10</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                @foreach ($data as $item)
                                    
                                <td>{{ $item->msp1 }}%</td>
                                <td>{{ $item->msp2 }}%</td>
                                <td>{{ $item->msp3 }}%</td>
                                <td>{{ $item->msp4 }}%</td>
                                <td>{{ $item->msp5 }}%</td>
                                <td>{{ $item->msp6 }}%</td>
                                <td>{{ $item->msp7 }}%</td>
                                <td>{{ $item->msp8 }}%</td>
                                <td>{{ $item->msp9 }}%</td>
                                <td>{{ $item->msp10 }}%</td>

                                <td>
                                    <a class="btn btn-danger btn-sm"
                                     href="{{ route('weightage-show',$item->id) }}">update</a>
                                  
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