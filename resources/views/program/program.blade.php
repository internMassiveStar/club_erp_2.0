@extends('layouts.master')

@section('title')
    Member Attend Club Program
@endsection

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
           


          
  
            <h2 class="text-center">Club Program Attend</h2>
            <div class="basic-form">
                <form class="mt-5 mb-5 login-input" method="post" action="{{ @$editData ? route('update-program-attend',$editData->id): route('club-program-attend') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h6><b>Program Type</b></h6>
                            
                                <select style="border: .01px solid #969393;" class="form-control"  name="program_type">
                                    <option value="{{ @$editData->program_type }}">{{ @$editData ? $editData->program_type : "Please select" }}</option>
                                    <option value="Club Program">Club Program</option>
                                    <option value="Community program">Cumminity Program</option>
                                    <option value="Formation Meetin">Formation Meeting</option>

                                </select>
                          
                        </div> 
                        <div class="form-group col-md-6">
                            <h6><b>Program Name</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"  name="program_name"  value='{{ @$editData->program_name }}' required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6><b>Program Date</b></h6>
                            <input style="border: .01px solid #969393;" type="date" class="form-control"  name="program_date"  value='{{ @$editData->program_date }}' required>
                        </div>
                        <div class="form-group col-md-6">
                            <h6><b>Remarks</b></h6>
                            <textarea style="border: .01px solid #969393;" class="form-control"  name="remarks" rows="2" >{{ @$editData->remarks }}</textarea>
                        </div>
                        @if(isset($editData))
                        <div class="form-group col-md-6">
                            <h6><b>Attend Member</b></h6>
                            <input style="border: .01px solid #969393;" type="text" class="form-control"   value='{{ $editData->attend_member_id }}' readonly>
                        </div>
                        @else
                        <table class="table table-striped table-inverse table-responsive" style="border: 1px solid black">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Attend Member</th>
                                    <th><a class="btn mb-1 btn-success" style="margin-top: 30%" onclick="create_tr('table_id_special_rcs')" ><i class="fa fa-plus"></i></a></th>
                                </tr>
                                </thead>
                                <tbody id="table_id_special_rcs">
                                    <tr>
                                        <td>   
                                            <select style="border: .01px solid #969393;" class="form-control"  name="attend_member_id[]">
                                                
                                                @foreach ($members as $member )
                                                       
                                                  
                                                <option value="{{ $member->member_id }}">{{ $member->member_id  }}-{{ $member->name }}</option>
                                            
                                                @endforeach
                                               </select></td>                                        
                                        <td><a class="btn mb-1 btn-danger" style="margin-top: 10%; color:white" onclick="remove_tr(this)" ><i class="fa fa-close"></i></a></td>
                                        
                                    </tr>
                                </tbody>
                        </table>
                       @endif
                
                                                                
                    </div>    
                   <button type="submit" class="btn mb-1 btn-success" name="AdoptEntry"> {{ @$editData ? 'Update' : 'Insert' }}</button>
                </form>
            </div>
         
        </div>
    </div>



@isset($data)


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   

              
                    <button onclick="printDiv('printMe')" class="btn-btn primary">Print</button>
                    <div id='printMe'>
                  
                     
                    <a class="text-center"><h4>AD Operation Table</h4></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="adopttable">
                            <thead>
                                <tr>
                                    <th>Attend Member</th>
                                    <th>Program Type</th>
                                    <th>Program Name</th>
                                    <th>Program Date</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($data as $item)
                                    <tr>
                                        
                                        <td>{{ $item->attend_member_id }}</td>
                                        <td>{{ $item->program_type }}</td>
                                        <td>{{ $item->program_name }}</td>
                                        <td>{{ $item->program_date }}</td>
                                        <td>{{ $item->remarks }}</td>
                                        <td>
                                        <a class="btn btn-danger btn-sm"
                                     href="{{ route('program-attend-update',$item->id) }}">update</a></td>
                                        
                                       
                                       
                                    </tr>
                                @endforeach  
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Attend Member</th>
                                    <th>Program Type</th>
                                    <th>Program Name</th>
                                    <th>Program Date</th>
                                    <th>Remarks</th>
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




@endisset
     
@endsection

<script>
    var clicks = 0;

    function create_tr(table_id){
        //console.log(table_body);
        let table_body = document.getElementById(table_id);
        first_tr = table_body.firstElementChild
        tr_clone = first_tr.cloneNode(true);

        table_body.append(tr_clone);

        clean_first_tr(table_body.firstElementChild);
        //console.log(tr_clone);

    }
    function clean_first_tr(firstTr){
        let children = firstTr.children;
        
        children = Array.isArray(children) ? children : Object.values(children);
        //console.log(children);
        children.forEach(element => {
            if(element !== firstTr.lastElementChild){
                element.firstElementChild.value = '';
            }
        });
    }

    function remove_tr(This){
        
        //console.log(This.closest('tr'));
        if(This.closest('tbody').childElementCount == 1){
            alert("You Don't have Permission to Delete This.")
        }else{
        This.closest('tr').remove();
        }
    }
</script>