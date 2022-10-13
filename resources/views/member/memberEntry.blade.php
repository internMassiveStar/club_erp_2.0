@extends('layouts.master') 
@section('main-content')
@section('title') {{'Member Entry'}} @endsection

<div style="padding-top: 5%; font-size: 20px; color: #7571f9">

@php
    $success = Session::get('success');
    $error = Session::get('error');

@endphp
@if ($success)
    <div class="alert alert-success">{{ $success }}</div>
@elseif ($error)
    <div class="alert alert-danger">{{ $error }}</div>
@endif

 @if(session()->has('memberEntry') || Auth::guard('admin')->check()) 
 <details>
    <summary>
        Member Information
    </summary>
    <div class="col-lg-12">

        <div class="card">

            <div class="card-body">
                <h2 class="text-center">Member Information</h2>

                <div class="form-validation">
                    <form class="form-valide" action="{{ route('member-complete-entry') }}" method="post" enctype="multipart/form-data"> 
                            @csrf
                    
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Member ID </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control"  placeholder="Member ID" name="member_id" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label" for="val-username"><b>Member Name </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" id="val-username" name="name" placeholder="Member Name..">
                            </div>
                        </div>

                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label" for="val-email"><b>Email </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" id="val-email" name="email" placeholder="Email Address..">
                            </div>
                        </div>

                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label" for="val-password"><b>Password</b> <span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="password" class="form-control" id="val-password" name="password" placeholder="Choose a safe one..">
                            </div>
                        </div>

                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label" for="val-confirm-password"><b>Confirm Password </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="..and confirm it!">
                            </div>
                        </div>

                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Mobile Number </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" name="mobile" placeholder="017-999-0000" >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Mobile Number Alternative
                            </b></h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control"  placeholder="Member Number Alternative" name="alt_mobile">
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Member Address </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control"  placeholder="Member Address" name="address" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Area</b> <span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="Area" name="area" >
                            </div>
                        </div>
                            
                        
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label" ><b>Member Catagory </b><span class="text-danger"></span>
                            </h6>
                            <div class="col-lg-6">
                                <select style="border: .01px solid #969393;" class="form-control"  name="category">
                                    <option value="">Please select</option>
                                    <option value="Sponser_Member">Sponser Member</option>
                                    <option value="Honorary Member">Honorary Member</option>
                                    <option value="Platinum_Member">Platinum Member</option>
                                     <option value="Platinum_Member(inc)">Platinum Member(inc)</option>
                                    <option value="Gold_Member">Gold Member</option>
                                    <option value="Gold_Member(inc)">Gold Member(inc)</option>
                                    <option value="Silver_Member">Silver Member</option>
                                    <option value="Silver_Member(inc)">Silver Member (inc)</option>
                                    <option value="Bronze_Member">Bronze Member</option>
                                    <option value="Bronze_Member (inc)">Bronze Member (inc)</option>
                                    <option value="Corporate_Member">Corporate Member</option>
                                    <option value="Senior_Member">Senior Member</option>
                                    <option value="Junior_Member">Junior Member</option>
                                    <option value="Intern_Associate">Intern Associate</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label" ><b>Member Type </b><span class="text-danger"></span>
                            </h6>
                            <div class="col-lg-6">
                                <select style="border: .01px solid #969393;" class="form-control"  name="type">
                                    <option value="">Please select</option>
                                    <option value="Genarel">Genarel Member</option>
                                    <option value="Associate">Associate Member</option>
                                    <option value="Student">Student</option>
                                    <option value="NUll">Null</option>
                                    <option value="NUll">Null</option>
                                    <option value="NUll">Null</option>
                                    <option value="NUll">Null</option>
                                    <option value="NUll">Null</option>
                                    <option value="Intern">Intern </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label" for="val-digits"><b>NID </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" id="val-digits" name="nid" placeholder="NID">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Joining Date </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="date" class="form-control"  placeholder="Joining Date" name="joining_date" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b> Asset Deposit </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" id="val-currency" name="ad" placeholder="Asset Deposit (AD)" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"> <b>Membership Status Point</b>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" id="val-website" name="msp" placeholder="Membership Status Point (MSP)" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Monthly Running Cost Share </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" name="rcs" placeholder="Monthly Running Cost Share (RCS)" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Reference Member ID </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" name="reference_id" placeholder="Reference Member ID" >
                            </div>
                        </div>

                    
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Remarks </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <textarea style="border: .01px solid #969393;" class="form-control"  name="Remarks" rows="5" placeholder="Enter Member AD,RCS Etc Details.." ></textarea>
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"> Attatchment (Photo)<span class="text-danger"></span>
                            </h6>
                            <img id="output"  style="width: 50px;height:50px;"/>
                            <div class="col-lg-6">
                                
                                <input type="file" name="a_photo" class="form-control-file" accept="image/*" onchange="loadFile(event)" >
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"> Attatchment (Hard copy Form)<span class="text-danger"></span>
                            </h6>
                            <img id="output1" style="width: 50px;height:50px;"/>
                            <div class="col-lg-6">
                                
                                <input type="file" name="a_form" class="form-control-file"  accept="image/*" onchange="loadFile1(event)" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"> Attatchment (NID)<span class="text-danger"></span>
                            </h6>
                            <img id="output2" style="width: 50px;height:50px;"/>
                            <div class="col-lg-6">
                                <input type="file" name="a_nid" class="form-control-file" accept="image/*" onchange="loadFile2(event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"> Attatchment (NOC)<span class="text-danger"></span>
                            </h6>
                            <img id="output3" style="width: 50px;height:50px;"/>
                            <div class="col-lg-6">
                                <input type="file" name="a_noc" class="form-control-file" accept="image/*" onchange="loadFile3(event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"> Attatchment (Certificate-1)<span class="text-danger"></span>
                            </h6>
                            <img id="output4" style="width: 50px;height:50px;"/>
                            <div class="col-lg-6">
                                <input type="file" name="a_certificate_1" class="form-control-file" accept="image/*" onchange="loadFile4(event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"> Attatchment (Certificate-2)<span class="text-danger"></span>
                            </h6>
                            <img id="output5" style="width: 50px;height:50px;"/>
                            <div class="col-lg-6">
                                <input type="file" name="a_certificate_2"class="form-control-file" accept="image/*" onchange="loadFile5(event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"> Attatchment (Certificate-3)<span class="text-danger"></span>
                            </h6>
                            <img id="output6" style="width: 50px;height:50px;"/>
                            <div class="col-lg-6">
                                <input type="file" name="a_certificate_3" class="form-control-file" accept="image/*" onchange="loadFile6(event)" >
                            </div>
                        </div>
                        <button type="submit" class="btn mb-1 btn-success" name="Member" id ="Member"  >Insert</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </details>

  <details>
    <summary>
        Member Profession Information
    </summary>
    <div class="col-lg-12">
        <h6></h6>
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Member Profession Information</h2>
                <div class="basic-form">
                    <form class="form-valide" action="{{ route('professional-info-entry') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h6><b>Member Profession</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control input-default" placeholder=" Member Profession" name="member_profession" >
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Designation</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Designation" name="member_designation">
                            </div>    
                            
                            <div class="form-group col-md-6">
                                <h6><b>Member Office Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Office Name" name="office_name">
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Office Address</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Office Address" name="office_address">
                            </div>
                            
                            
                        </div>
                        <button type="submit" class="btn mb-1 btn-success" name="MemberProfession" id ="MemberProfession"  >Profession Insert</button>    
                    </form>
                  
                </div>
            </div>
        </div>
    </div>
 </details>
 <details>
    <summary>
        Member Education Information
    </summary>
    <div class="col-lg-12">
        <h6></h6>
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Member Education Information</h2>
                <div class="basic-form">

                    <form class="form-valide" action="{{ route('education-info-entry') }}" method="post" enctype="multipart/form-data">
                        @csrf
                          <table class="table table-striped table-inverse table-responsive" style="border: 1px solid black">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Member Education Degree</th>
                                    <th>Member Education Institute</th>
                                    <th>Member Education Result</th>
                                    <th>Member Education Year</th>
                                    <th><a class="btn mb-1 btn-success" style="margin-top: 30%" onclick="create_tr('table_id')" ><i class="fa fa-plus"></i></a></th>
                                </tr>
                                </thead>
                                <tbody id="table_id">
                                    <tr>
                                        <td><input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Degree" name="degree[]" ></td>
                                        <td><input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Institute" name="institute[]"></td>
                                        <td><input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Result" name="result[]"></td>
                                        <td><input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Education Year" name="year[]"></td>
                                        <td><a class="btn mb-1 btn-danger" style="margin-top: 10%; color:white" onclick="remove_tr(this)" ><i class="fa fa-close"></i></a></td>
                                        
                                    </tr>
                                </tbody>
                        </table>
                        <button type="submit" class="btn mb-1 btn-success" name="MemberEducation" id ="MemberEducation"  >Education Insert</button> 
                    </form>  
                        
                </div>

                                
            </div>
                            
        </div>
    </div>
       
             
    
 </details>
  
 <details>
    <summary>
        Member Personal Information
    </summary>
    <div class="col-lg-12">
        <h6></h6>
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Member Personal Information</h2>
                <div class="basic-form">
                    <form class="mt-5 mb-5 login-input" method="post" action="{{ route('personal-info-entry') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h6><b>Member Spouse Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Spouse Name" name="sopouse_name">
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Father Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Father Name" name="father_name">
                            </div>    
                            
                            <div class="form-group col-md-6">
                                <h6><b>Member Mother Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Mother Name" name="mother_name">
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Children Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Children Name 1" name="children_name_1">
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Children Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Children Name 2" name="children_name_2">
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Children Name</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Children Name 3" name="children_name_3">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <h6><b>Member Date Of Birth</b></h6>
                                <input style="border: .01px solid #969393;" type="date" class="form-control" placeholder="  Member Date Of Birth" name="date_birth">
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Member Home District</b></h6>
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="  Member Home District" name="home_district">
                            </div>
                            
                        </div>    
                        <button type="submit" class="btn mb-1 btn-success" name="MemberPersonal" id ="MemberPersonal"  >Personal Insert</button>
                     
                            
                          
                    </form>
                </div>
            </div>
        </div>
    </div>
 </details>
</div>

@endif
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
    

//   if(clicks==2){
//     var y = document.getElementById("2");
//     if (y.style.display === "none") {
//     y.style.display = "inline";
//   }
 
// }
// if(clicks==3){
//     var z= document.getElementById("3");
//     if (z.style.display === "none") {
//     z.style.display = "inline";
//   }
//   }





  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  var loadFile1 = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output1');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  var loadFile2 = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output2');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  var loadFile3 = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output3');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  var loadFile4 = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output4');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  var loadFile5= function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output5');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  var loadFile6 = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output6');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  
// var clicks = 0;

// function rowAdd(){

//     clicks += 1;
  

//     for(var i = 0; i < clicks; i++){
//    // Change the content
    
 
//     document.getElementsByClassName('myDiv')[i].innerHTML=` <div class="row" id="addrow">
//                                     <div class="form-group col-md-2">
                                     
//                                         <input style="border: .01px solid #969393;" type="text" class="form-control"  name="degree[]" >
//                                     </div>
//                                     <div class="form-group col-md-2">
                                     
//                                         <input style="border: .01px solid #969393;" type="text" class="form-control" name="institute[]" >
//                                     </div>
//                                     <div class="form-group col-md-2">
                                    
//                                         <input style="border: .01px solid #969393;" type="text" class="form-control" name="result[]">
//                                     </div>
//                                     <div class="form-group col-md-2">
                                      
//                                         <input style="border: .01px solid #969393;" type="text" class="form-control" name="year[]" >
//                                     </div>

//                                 </div>`
//                             }
// }



    </script>