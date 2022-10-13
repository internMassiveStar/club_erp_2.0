
@extends('layouts.master') 
@section('main-content')
@section('title') {{'Member Education Info.'}} @endsection
  <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    @if(Auth::guard('employee')->check())
                  <form class="mt-5 mb-5 login-input" method="post" action="{{ route('member-educationInfo-table-employee') }}">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <h6><b>Pin</b></h6>
                              <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="education info" name="pin" id="pin" value='' required>
                          </div>
                          
                          <input type="hidden" value="member-education-info-table" name="page_name">
                  
                                                                  
                      </div>    
                     <button type="submit" class="btn mb-1 btn-success" name="AdoptEntry"> Submit Pin</button>
                  </form>
                  @endif
    
                  @if(Auth::guard('admin')->check() || @isset($pin))
                <a class="text-center">
                    <h4> </h4>
                    <h4>Professional Information Table</h4>
                </a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration" id="Mptable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Member Id</th>
                                <th>Degree</th>
                                <th>Institute</th>
                                <th>Result </th>
                                <th>Passing Year</th>
                                <th>Action</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                        @foreach ($data as $item ) 
                                
                         <td>{{ $item->name }}</td>
                         <td>{{ $item->member_id }}</td>
                        <td>{{ $item->degree }}</td>
                        <td>{{ $item->institute }}</td>
                        <td>{{ $item->result }}</td>
                        <td>{{ $item->year }}</td>
                     
                        
                        <td>
                            <a class="btn btn-danger btn-sm"
                             href="{{ route('update-education',$item->id) }}">update</a>
                          
                        </td>
                       
                    </tr>
                    
                    @endforeach  
                        </tbody>
                        
                    </table>
                </div>

@isset($editData)
    

                <h4 class="text-center">Member Profession Information</h4>
                <div class="basic-form">
                    <form class="mt-5 mb-5 login-input" method="post" action="{{ route('education-update',$editData->id) }}">
                        @csrf
                        <div class="row" id="addrow">
                            <div class="form-group col-md-2">
                                <h6><b>Member Education Degree</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" value="{{ $editData->degree }}" name="degree" >
                            </div>
                            <div class="form-group col-md-2">
                                <h6><b>Member Education Institute</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" value="{{ $editData->institute }}" name="institute">
                            </div>
                            <div class="form-group col-md-2">
                                <h6><b>Member Education Result</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" value="{{ $editData->result }}"  name="result">
                            </div>
                            <div class="form-group col-md-2">
                                <h6><b>Member Education Year</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" value="{{ $editData->year }}" name="year">
                            </div>
                           
                        </div>
                    </div>
                        <button type="submit" class="btn mb-1 btn-warning" name="MemberPfUpdate">
                            Update</button>
                        <!--<button type="submit" class="btn mb-1 btn-danger" name="MemberPfDelete">-->
                        <!--    Delete</button>-->
                    </form>
                </div>
            </div>
         
        </div>
    </div>
</div>
@endisset
@endif
@endsection