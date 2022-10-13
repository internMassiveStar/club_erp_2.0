
@extends('layouts.master') 
@section('main-content')
@section('title') {{'Member Professional Info.'}} @endsection
  <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @if(Auth::guard('employee')->check())
                <form class="mt-5 mb-5 login-input" method="post" action="{{ route('member-professionalInfo-table-employee') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h6><b>Pin</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="prefessional info" name="pin" id="pin" value='' required>
                        </div>
                        
                        <input type="hidden" value="member-professional-info-table" name="page_name">
                
                                                                
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Profession</th>
                                <th>Designation</th>
                                <th>Office Name</th>
                                <th>Office Address</th>
                                <th>Action</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            @foreach ($data as $item )
                                
                  
                        <td>{{ $item->member_id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->member_profession }}</td>
                        <td>{{ $item->member_designation }}</td>
                        <td>{{ $item->office_name }}</td>
                        <td>{{ $item->office_address }}</td>
                        
                        <td>
                            <a class="btn btn-danger btn-sm"
                             href="{{ route('update-profession',$item->id) }}">update</a>
                          
                        </td>
                       
                    </tr>
                    
                    @endforeach 
                        </tbody>
                        
                    </table>
                </div>
            @isset($editData)
                
           
                <h4 class="text-center">Member Profession Information</h4>
                <div class="basic-form">
                    <form class="mt-5 mb-5 login-input" method="post" action="{{ route('profession-update',$editData->id) }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h6><b>Member ID</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder=" Member ID" name="member_id" value="{{ $editData->member_id }}">
                            </div>
                          
                            <div class="form-group col-md-6">
                                <h6><b>Member Profession</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control input-default"  name="member_profession"  value="{{ $editData->member_profession }}"  >
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Designation</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Designation" name="member_designation" value="{{ $editData->member_designation }}">
                            </div>    
                          
                            <div class="form-group col-md-6">
                                <h6><b>Member Office Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Office Name" name="office_name" value="{{ $editData->office_name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Office Address</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Office Address" name="office_address" value="{{ $editData->office_address }}">
                            </div>
                            {{-- <div class="card-body">
                                <h4 class="text-center">Member Education Information</h4><br>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Degree-1</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Degree" name="MemberEducationDegree-1" id="MemberEducationDegree-1" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Institute-1</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Institute" name="MemberEducationInstitute-1" id="MemberEducationInstitute-1">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Result-1</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Result" name="MemberEducationResult-1" id="MemberEducationResult-1">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Year-1</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Year" name="MemberEducationYear-1" id="MemberEducationYear-1">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Degree-2</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Degree" name="MemberEducationDegree-2" id="MemberEducationDegree-2" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Institute-2</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Institute" name="MemberEducationInstitute-2" id="MemberEducationInstitute-2">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Result-2</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Result" name="MemberEducationResult-2" id="MemberEducationResult-2">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Year-2</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Year" name="MemberEducationYear-2" id="MemberEducationYear-2">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Degree-3</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Degree" name="MemberEducationDegree-3" id="MemberEducationDegree-3" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Institute-2</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Institute" name="MemberEducationInstitute-3" id="MemberEducationInstitute-3">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Result-3</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Result" name="MemberEducationResult-3" id ="MemberEducationResult-3">
                                    </div>
                                       <div class="form-group col-md-3">
                                        <h6><b>Member Education Year-3</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Year" name="MemberEducationYear-3" id="MemberEducationYear-3">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Degree-4</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Degree" name="MemberEducationDegree-4" id="MemberEducationDegree-4" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Institute-4</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Institute" name="MemberEducationInstitute-4" id="MemberEducationInstitute-4">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Result-4</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Result" name="MemberEducationResult-4" id="MemberEducationResult-4">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Year-4</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Year" name="MemberEducationYear-4" id="MemberEducationYear-4">
                                    </div>

                                      <div class="form-group col-md-3">
                                        <h6><b>Member Education Degree-5</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Degree" name="MemberEducationDegree-5" id="MemberEducationDegree-5" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Institute-5</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Institute" name="MemberEducationInstitute-5" id="MemberEducationInstitute-5">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Result-5</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Result" name="MemberEducationResult-5" id ="MemberEducationResult-5">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <h6><b>Member Education Year-5</b></h6>
                                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Year"  name="MemberEducationYear-5" id="MemberEducationYear-5">
                                    </div>
                                </div>
                            </div> --}}
                         </div>
                    </div>
                        <button type="submit" class="btn mb-1 btn-warning" name="MemberPfUpdate">
                            Update</button>
                        <!--<button type="submit" class="btn mb-1 btn-danger" name="MemberPfDelete">-->
                        <!--    Delete</button>-->
                    </form>
                </div>
            </div>
            @endisset
        </div>
    </div>
</div>
@endif
@endsection