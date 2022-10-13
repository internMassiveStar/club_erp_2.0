@extends('layouts.master')
@section('title') {{'RCS Operation'}} @endsection
@section('main-content')


<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center">Pin Set</h2>
            <div class="basic-form">
                <form class="mt-5 mb-5 login-input" method="post" action="{{ route('generate-pin') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h6><b>Emplyee  ID</b></h6>
                            <select style="border: .01px solid #969393;" class="form-control"  name="employee_id" >
                                @foreach ($data as $item )
                                <option value="{{ $item->employee_id }}">{{ $item->name }}</option>
                                @endforeach 
                               
                               
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <h6><b>Page Name</b></h6>
                            <select style="border: .01px solid #969393;" class="form-control"  name="page_name" >
                                 
                                <option value="ad-operation">Ad Operation</option>
                                <option value="ad-operation-table">Ad Operation Table</option>
                                <option value="rcs-operation">Rcs Operation</option>
                                <option value="rcs-operation-table">Rcs Operation Table</option>
                                <option value="cheque-mangement">Cheque Management</option>
                                <option value="cheque-mangement-table">Cheque Management Table</option>
                                <option value="all-cheque">All Cheque</option>
                                <option value="today-cheque">Today Cheque</option>
                                <option value="tomorrow-cheque">Tomorrow Cheque</option>
                                <option value="searchBydate-cheque">Search by date</option>
                                <option value="searchAdRcs-cheque">Search Ad/Rcs</option>
                                <option value="total-ad-rcs">Total Ad And Rcs</option>
                                <option value="old-total-ad&rcs">Old Total Ad And Rcs</option>
                                <option value=" old-total-ad&rcs-table ">OLd Total Ad And Rcs Table</option>

                                <option value="member-entry">Member Entry</option>
                                <option value="employee-entry">Employee Entry</option>
                                <option value="employee-table">Employee Table</option>
                                <option value="member-table">Member Table</option> 
                                <option value="member-personal-info-table">Member Personal Info Table</option>
                                <option value="member-education-info-table">Member Education Info Table</option>
                                <option value="member-professional-info-table">Member Professional Info Table</option>

                                
                            </select>
                        </div>
    
                       
                        
                    <button type="submit" class="btn mb-1 btn-success">Generate Pin</button>
                    <!--<button type="submit" class="btn mb-1 btn-danger" name="ADDelete"> Delete</button>-->
                </form>
            </div>
        </div>
    </div>
</div>

    


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="text-center"><h4>Pin Table</h4></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="Mytable">
                            <thead>
                                <tr>
                                    <th>Employee Id</th>
                                    <th>Page Name</th>
                                    
                                    <th>Pin</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                            @foreach ($pinData as $data )
                                
                           <td>{{ $data->employee_id }}
                            <td>{{ $data->page_name }}
                            <td>{{ $data->pin }}
                           
                     
                            <td>
                                <a class="btn btn-danger btn-sm"
                                 href="{{ route('remove-pin',$data->id) }}">Remove_pin</a>
                              
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



@endsection