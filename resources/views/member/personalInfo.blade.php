
@extends('layouts.master') 
@section('main-content')
@section('title') {{'Member Personal Info.'}} @endsection

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @if(Auth::guard('employee')->check())
              <form class="mt-5 mb-5 login-input" method="post" action="{{ route('member-personalInfo-table-employee') }}">
                  @csrf
                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <h6><b>Pin</b></h6>
                          <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="member-table" name="pin" id="pin" value='' required>
                      </div>
                      
                      <input type="hidden" value="member-personal-info-table" name="page_name">
              
                                                              
                  </div>    
                 <button type="submit" class="btn mb-1 btn-success" name="AdoptEntry"> Submit Pin</button>
              </form>
              @endif

              @if(Auth::guard('admin')->check() || @isset($pin))
                <a class="text-center">
                    <h4> </h4>
                    <h4>Personal Information Table</h4>
                </a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration" id="Mpertable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Profession</th>
                                <th>Sopouse Name</th>
                                <th>Father Name</th>
                                <th>Mother Name</th>
                                <th>Children 1</th>
                                <th>Children 2</th>
                                <th>Children 3</th>
                                <th>Date Of Birth</th>
                                <th>Home District</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($data as $item )
                                    
                      
                            <td>{{ $item->member_id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->member_profession }}</td>
                            <td>{{ $item->sopouse_name }}</td>
                            <td>{{ $item->father_name }}</td>
                            <td>{{ $item->mother_name }}</td>
                            <td>{{ $item->children_name_1 }}</td>
                            <td>{{ $item->children_name_2}}</td>
                            <td>{{ $item->children_name_3 }}</td>
                            <td>{{ $item->date_birth }}</td>
                            <td>{{ $item->home_district }}</td>
                            
                            <td>
                                <a class="btn btn-danger btn-sm"
                                 href="{{ route('update-personal',$item->id) }}">update</a>
                              
                            </td>
                           
                        </tr>
                        @endforeach
                        </tbody>
                        
                    </table>
                </div>
      @isset($editData)
          

               <h4 class="text-center">Personal Information Table</h4>
                <div class="basic-form">
                    <form class="mt-5 mb-5 login-input" method="post" action="{{ route('personal-update',$editData->id) }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h6><b>Member ID</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control"  name="member_id" value="{{ $editData->member_id }}">
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Spouse Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" name="sopouse_name"  value="{{ $editData->sopouse_name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Father Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control"  name="father_name" value="{{ $editData->father_name }}">
                            </div>    
                            
                            <div class="form-group col-md-6">
                                <h6><b>Member Mother Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control"   name="mother_name"  value="{{ $editData->mother_name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Children Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control"  name="children_name_1"  value="{{ $editData->children_name_1 }}">
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Children Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" name="children_name_2" value="{{ $editData->children_name_2 }}">
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Children Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" name="children_name_3"  value="{{ $editData->children_name_3 }}">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <h6><b>Member Date Of Birth</b></h6>
                                <input style="border: .01px solid #969393;" type="date" class="form-control"  name="date_birth" value="{{ $editData->date_birth }}">
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Home District</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control"  name="home_district"  value="{{ $editData->home_district }}">
                            </div>
                        </div>    

                        </div>
                        <button type="submit" class="btn mb-1 btn-warning" name="MemberPUpdate">
                            Update</button>
                        <!--<button type="submit" class="btn mb-1 btn-danger" name="MemberPDelete">-->
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