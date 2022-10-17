<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;



class ProgramController extends Controller
{
    public function clubProgram(){ 
        $members=Member::select('member_id','name')->get();
        $data=Program::all();
    
        return view('program.program',compact('members','data'));
    }
    public function clubprogramAttend(Request $request){

        $validator = Validator::make($request->all(),[
            // 'member_name'=>'required|regex:/^[\pL\s\-]+$/u',
            // 'member_id'=>'required|min:10',
            
            'program_type'=>'required',
            'program_name'=>'required',
            'program_date'=>'required|date',
            'attend_member_id'=>'required',
           
        ]);

        if($validator->fails()){
            return redirect('/member-attend-program')->withErrors($validator)->withInput();
        }
        else{
            if($request->attend_member_id !=null){
                $attend_member_id=$request->attend_member_id;
                for( $i=0; $i < count($attend_member_id); $i++){
                    $attend=new Program();
                    $attend->program_type=$request->program_type;
                    $attend->program_name=$request->program_name;
                    $attend->program_date=$request->program_date;
                    $attend->remarks=$request->remarks;
                    $attend->attend_member_id=$attend_member_id[$i];
                    $attend->save();
                    
            }
            Session::flash('success',"Club Program Insert Successfully");
        }
        }
       
    return redirect()->back();
}

public function clubprogramAttendUpdate($id){
    $editData=Program::findOrfail($id);
  

    return view('program.program',compact('editData'));

}
public function updateclubprogramAttend(Request $request,$id){
    $validator = Validator::make($request->all(),[
        // 'member_name'=>'required|regex:/^[\pL\s\-]+$/u',
        // 'member_id'=>'required|min:10',
        
        'program_type'=>'required',
        'program_name'=>'required',
        'program_date'=>'required|date',
       
       
    ]);

    if($validator->fails()){
        return redirect('/member-attend-program')->withErrors($validator)->withInput();
    }
    else{
        $attend=Program::findOrfail($id);
        $attend->program_type=$request->program_type;
        $attend->program_name=$request->program_name;
        $attend->program_date=$request->program_date;
        $attend->remarks=$request->remarks;
        $attend->update();
        Session::flash('success',"Club Program Update Successfully");
    }
 
    return redirect('/member-attend-program');
}

}