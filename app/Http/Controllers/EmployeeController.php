<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\AdRcstotal;
use App\Models\Pin;



use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class EmployeeController extends Controller
{
    public function employeeRegister(){
    
    
            $data=Employee::get();
            $flag='true';

        
         return view('employee.employeeRegister',compact('data','flag'));
    }

    public function registerEmployee(Request $request){
        $validateData = $request->validate([
            'employee_name' => 'required',

            'employee_nid' => 'required',


        ]);
       
        $data=DB::table('employees')->select( DB::raw("COUNT(id) as count"))
        ->whereYear('created_at', date('Y'))
        ->first();
        $employee_id=date('y').'00'. $data->count+001;

        $certificate = $request->file('certificate');
  
        if ($certificate) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($certificate->getClientOriginalExtension());
            $img_name = $name_gen . "." . $img_ext;
            $up_location = 'emp_certificate/';
            $last_img = $up_location . $img_name;
            $certificate->move($up_location, $img_name);


        }

        $employee=new Employee();
        $employee->employee_id= $employee_id;
        $employee->name=$request->employee_name;
        $employee->email=$request->email;
        $employee->password=Hash::make($request->password);
        $employee->mobile=$request->employee_mobile;
        $employee->address=$request->employee_address;
        $employee->nid=$request->employee_nid;
        $employee->joining_date=$request->joinining_date;
        $employee->resigning_date=$request->resign_date;
        $employee->last_degree=$request->degree;
        $employee->last_institute=$request->institute;
        $employee->last_result=$request->result;
        if($certificate){
            $employee->certificate=$last_img; 
        }
        $employee->last_year=$request->year;
        $employee->insert_by=Session::get('id');
        $employee->save();

        if(Auth::guard('employee')->check()){

         

            $last = DB::table('employees')->latest()->first();

            return view('employee.employeeRegister',compact('last'));

        }

        return redirect('/employee-register');

    }

    public function employeeUpdate($id){
   
        $editData=Employee::findOrfail($id);
        return view('employee.employeeRegister',compact('editData'));
    }

    public function updateEmployee(Request $request,$id){

        $employee=Employee::findOrfail($id);
        $certificate = $request->file('certificate');
  
        if ($certificate) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($certificate->getClientOriginalExtension());
            $img_name = $name_gen . "." . $img_ext;
            $up_location = 'emp_certificate/';
            $last_img = $up_location . $img_name;
            $certificate->move($up_location, $img_name);
            $path = public_path('/' . $employee->certificate);
            if (File::exists($path)) {
                @unlink($path);
            }


        }

    
        $employee->name=$request->employee_name;
        $employee->email=$request->email;
       
        $employee->mobile=$request->employee_mobile;
        $employee->address=$request->employee_address;
        $employee->nid=$request->employee_nid;
        $employee->joining_date=$request->joinining_date;
        $employee->resigning_date=$request->resign_date;
        $employee->last_degree=$request->degree;
        $employee->last_institute=$request->institute;
        $employee->last_result=$request->result;
        if($certificate){
            $employee->certificate=$last_img; 
        }
        $employee->last_year=$request->year;
        $employee->update_by=Session::get('id');
        $employee->update();
        return redirect(route('rcs-operation'));

    }

    public function employeeDetail($id){
        return Employee::findOrFail($id);
    }

    public function employeeentryEmployee(Request $request){
        $pin=Pin::where('pin',$request->pin)->first();
       if($pin){
        if($pin->employee_id == Session::get('id') && $pin->page_name ==$request->page_name){
            
            return view('employee.employeeRegister',compact('pin'));
        }else{
            return redirect()->back();
        }
       }else{
        return redirect()->back();
       }
    
    }
    public function employeetableEmployee(Request $request){
        $pinTable=Pin::where('pin',$request->pin)->first();
       if($pinTable){
        if($pinTable->employee_id == Session::get('id') && $pinTable->page_name ==$request->page_name){
            $data=Employee::get();
            return view('employee.employeeRegister',compact('pinTable','data'));
        }else{
            return redirect()->back();
        }
       }else{
        return redirect()->back();
       }
    
    }
}
