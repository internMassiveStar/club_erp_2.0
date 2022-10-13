@extends('layouts.master') 
@section('main-content')

@section('title') {{'Employee '}} @endsection

    <h6></h6>
    <div class="card">
        <div class="card-body">

 @if(Auth::guard('employee')->check())
 @isset($flag)
<form class="mt-5 mb-5 login-input" method="post" action="{{ route('employee-entry-employee') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <h6><b>Pin</b></h6>
            <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="employee entry" name="pin" id="pin" value='' required>
        </div>
        
        <input type="hidden" value="employee-entry" name="page_name">

                                                
    </div>    
   <button type="submit" class="btn mb-1 btn-success" name="AdoptEntry"> Submit Pin</button>
</form>
@endisset
@endif
@if(Auth::guard('admin')->check() || @isset($pin))
            
   <h2 class="text-center text-blue">Employee Information</h2>
            
            <div class="basic-form">
                <form class="mt-5 mb-5 login-input" method="post" action="{{ @$editData ? route('update-employee',$editData->id) : route('register-employee') }}" enctype="multipart/form-data">

                    @csrf
                    <div class="form-row">
                    
                        <div class="form-group col-md-6">
                            <h6><b>Employee Name</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"
                                placeholder=" Employee Name" name="employee_name" value="{{ @$editData->name }}"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6><b>Employee Mobile</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"
                                placeholder="  Employee Mobile" name="employee_mobile" value="{{ @$editData->mobile }}"
                                required>
                        </div>

                        <div class="form-group col-md-6">
                            <h6><b>Employee Address</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"
                                placeholder="  Employee Address" name="employee_address" value="{{ @$editData->address }}"
                                required>
                        </div>
                        
                        <div class="form-group col-md-6">
                                <h6><b>Joining Date</b></h6>
                                <input style="border: .01px solid #969393;" type="{{ @$editData ? 'text' : 'date' }}" class="form-control"
                                    placeholder="  Joining Date" name="joinining_date" value="{{ @$editData->joining_date }}">
                        </div>                                    
                        <div class="form-group col-md-6">
                            <h6><b>Resign Date</b></h6>
                            <input style="border: .01px solid #969393;" type="{{ @$editData ? 'text' : 'date' }}" class="form-control"
                                    placeholder="   Resign Date" name="resign_date" value="{{ @$editData->resiging_date }}">
                        </div>  
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h6><b>Email</b></h6>
                            <input style="border: .01px solid #969393;" type="email" class="form-control"
                                placeholder="  Email" name="email" value="{{ @$editData->email }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6><b>Password</b></h6>
                            <input style="border: .01px solid #969393;" type="password" class="form-control"
                                placeholder="  Password" name="password" id="Password">
                        </div>
                     
                         <div class="form-group col-md-6">
                            <h6><b>Employee NID</b></h6>
                            <input style="border: .01px solid #969393;" type="{{ @$editData ? 'text' : 'number' }}" class="form-control"
                                placeholder="Employee NID" name="employee_nid" value="{{ @$editData->nid }}">
                        </div>
                    </div>
                    <div class="form-row">    
                         <div class="form-group col-md-3">
                           <h6><b>Employee Education Degree</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Employee Education Degree" name="degree" value="{{ @$editData->last_degree }}">
                         </div>
                        <div class="form-group col-md-3">
                            <h6><b>Employee Education Institute</b></h6>
                               <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder=" Employee Education Institute" name="institute" value="{{ @$editData->last_institute }}">
                        </div>
                        <div class="form-group col-md-3">
                            <h6><b>Employee Education Result</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Employee Education Result" name="result" value="{{ @$editData->last_result }}">
                        </div>
                        <div class="form-group col-md-3">
                            <h6><b>Employee Education Year</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Employee Education Year" name="year" value="{{ @$editData->last_year }}">
                        </div>
                        <div class="form-group row">
                                <h6 class="col-lg-4 col-form-label"> Attatchment (Certificate-1)<span class="text-danger"></span>
                                </h6>
                                @if(@isset($editData)) 
                                <img id="output"  style="width: 50px;height:50px;" src=" {{ url('/' . $editData->certificate)  }}" />  
                          
                                @else
                                <img id="output"  style="width: 50px;height:50px;" />
                                @endif
                                <div class="col-lg-6">
                                    <input type="file" name="certificate" class="form-control-file" accept="image/*" onchange="loadFile(event)" >
                                </div>
                        </div>

                    </div>
                    <button type="submit" class="btn mb-1 btn-success" name="EmployeeEntry"> {{ @$editData ? 'Update' : 'Insert' }}</button>

                </form>
            </div>
        </div>
    </div>

@endif


@isset($last)

<div class="table-responsive">
    <table class="table table-striped table-bordered zero-configuration" id="adopttable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Joining  Date</th>
                <th>Degree</th>
                <th>Institute</th>
                <th>Result</th>
                <th>passing Year</th>
                <th>Certificate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
       
                
                    <td>{{ $last->name }}</td>
                    <td>{{ $last->mobile }}</td>
                    <td>{{ $last->email }}</td>
                    <td>{{ $last->joining_date }}</td>
                    <td>{{ $last->last_degree }}</td>
                    <td>{{ $last->last_institute }}</td>
                    <td>{{ $last->last_result }}</td>
                    <td>{{ $last->last_year }}</td>
                    <td> 
           
          
                        <button class="detail" data-toggle="modal" data-target="#myModal" data-id="{{ $last->id }}">  <img style="width: 50px;height:50px;"
                            src="{{ @$last->certificate ? url('/' . $last->certificate) : url('a_photo/no-image.png') }}"
                            alt=""></button>
                       
                    </td>
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
                
     
            
            <form class="mt-5 mb-5 login-input" method="post" action="{{ route('employee-table-employee') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <h6><b>Pin</b></h6>
                        <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="employee table" name="pin" id="pin" value='' required>
                    </div>
                    
                    <input type="hidden" value="employee-table" name="page_name">
            
                                                            
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
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Joining  Date</th>
                                    <th>Degree</th>
                                    <th>Institute</th>
                                    <th>Result</th>
                                    <th>passing Year</th>
                                    <th>Certificate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($data as $item)
                                    
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->mobile }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->joining_date }}</td>
                                        <td>{{ $item->last_degree }}</td>
                                        <td>{{ $item->last_institute }}</td>
                                        <td>{{ $item->last_result }}</td>
                                        <td>{{ $item->last_year }}</td>
                                        <td> 
                               
                              
                                            <button class="detail" data-toggle="modal" data-target="#myModal" data-id="{{ $item->id }}">  <img style="width: 50px;height:50px;"
                                                src="{{ @$item->certificate ? url('/' . $item->certificate) : url('a_photo/no-image.png') }}"
                                                alt=""></button>
                                           
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-sm"
                                             href="{{ route('employee-update',$item->id) }}">update</a>
                                          
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
<div class="modal" tabindex="-1" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img id="certificate"  style="width: 80%;height:70%;" />
           
          <p id="product-desc">
           

          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        </div>
      </div>
    </div>
  </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script>
    $('#myModal').modal('hide');
    $(document).ready(function() {
      $('.detail').click(function() {
        const id = $(this).attr('data-id');
        $.ajax({
          url: 'employee-detail/'+id,
          type: 'GET',
         
          data: {
            "id": id
          },
          success:function(data) {
            console.log(data);
            // $('#product-title').html(data.name);
            // $('#product-desc').html(data.member_id);
            $('#certificate').attr('src', data.certificate);
            //  $('#member_nid').attr('src', data.a_nid);
          }
        })
      
      });
    })


  
</script>
<script>
      var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>