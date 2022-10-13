<?php

namespace App\Http\Controllers;

use App\Models\Employee;

use App\Models\Member;
use App\Models\Membereducation;
use App\Models\Memberpersonal;
use App\Models\Memberprofession;
use App\Models\Rcsmaster;
use App\Models\Pin;

use App\Models\AdRcstotal;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;


class MemberController extends Controller
{


    public function loginMember(Request $request){
        if($request->login_type=='Member'){
            

            $password=Member::select('password','role')->where('email',$request->email)->first();
          
            if (Hash::check($request->password,$password->password) && $password->role==0) {
                Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'));
                Session::put('id',Auth::guard('member')->user()->member_id);
                return redirect('/dashboard');     
            }else if(Hash::check($request->password,$password->password) && $password->role==1){
                Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'));
                Session::put('id',Auth::guard('admin')->user()->member_id);
                return redirect('/dashboard');    
            }else{
                return redirect('/');

            }
          
            
         }
         else if($request->login_type=='employee'){
            $password=Employee::select('password')->where('email',$request->email)->first();
            if (Hash::check($request->password,$password->password)) {
                Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'));
                Session::put('id',Auth::guard('employee')->user()->employee_id);
                return redirect('/dashboard');  
            }else{
            return redirect('/');

            }
           
         }
       
         else{
            return redirect('/');
         }
        }
       
    public function memberEntry(){

    
        return view('member.memberEntry');
    
       
      }
       
    
  public function memberEntryEmp(){
    return view('member.pin');
  }
    public function memberTable(){
        $data=Member::get();
       
        return view('member.memberTable',compact('data'));
    }
    public function memberUpdate($id){
        $data=Member::get();
        $editData=Member::findOrfail($id);
        return view('member.memberTable',compact('editData','data'));

    }
    public function updateMember(Request $request,$id){
        $member=Member::findOrfail($id);
        // if(!$member->member_id ==$request->member_id){
        //     $profession=DB::table('memberprofessions')->select('member_id')->where('member_id',$member->member_id)->first();
        //     $personal=DB::table('memberpersonals')->select('member_id')->where('member_id',$member->member_id)->first();
        //     $education=DB::table('membereducations')->select('member_id')->where('member_id',$member->member_id)->first();
        //     $profession->member_id=$request->member_id;
        //     $personal->member_id=$request->member_id;
        //     $education->member_id=$request->member_id;
        // }

        //attachment photo  
        $a_photo=$request->file('a_photo');
        if($a_photo){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($a_photo->getClientOriginalExtension());
            $img_name = $name_gen . "." . $img_ext;
            $up_location = 'a_photo/';
            $a_photo_up = $up_location . $img_name;
            $a_photo->move($up_location, $img_name);
            $path = public_path('/' . $member->a_photo);
            if (File::exists($path)) {
                @unlink($path);
            }
        }
        //attachment from

        $a_form=$request->file('a_form'); 
        if($a_form){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($a_form->getClientOriginalExtension());
        $img_name = $name_gen . "." . $img_ext;
        $up_location = 'a_form/';
        $a_form_up = $up_location . $img_name;
        $a_form->move($up_location, $img_name);
        $path = public_path('/' . $member->a_form);
        if (File::exists($path)) {
            @unlink($path);
        }
        }

        //attachment nid

        $a_nid=$request->file('a_nid');
        if($a_nid){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($a_nid->getClientOriginalExtension());
        $img_name = $name_gen . "." . $img_ext;
        $up_location = 'a_nid/';
        $a_nid_up = $up_location . $img_name;
        $a_nid->move($up_location, $img_name);
        $path = public_path('/' . $member->a_nid);
        if (File::exists($path)) {
            @unlink($path);
        }
        }

        //attachment noc

        $a_noc=$request->file('a_noc');
        if($a_noc){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($a_noc->getClientOriginalExtension());
        $img_name = $name_gen . "." . $img_ext;
        $up_location = 'a_noc/';
        $a_noc_up = $up_location . $img_name;
        $a_noc->move($up_location, $img_name);
        $path = public_path('/' . $member->a_noc);
        if (File::exists($path)) {
            @unlink($path);
        }
        }
        //attachment certificate 1
        $a_certificate_1=$request->file('a_certificate_1');
        if($a_certificate_1){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($a_certificate_1->getClientOriginalExtension());
        $img_name = $name_gen . "." . $img_ext;
        $up_location = 'a_certificate_1/';
        $a_certificate_1_up = $up_location . $img_name;
        $a_certificate_1->move($up_location, $img_name);
        $path = public_path('/' . $member->a_certificate_1);
        if (File::exists($path)) {
            @unlink($path);
        }
        }
        //attachment certificate 2
        $a_certificate_2=$request->file('a_certificate_2');
        if($a_certificate_2){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($a_certificate_2->getClientOriginalExtension());
        $img_name = $name_gen . "." . $img_ext;
        $up_location = 'a_certificate_2/';
        $a_certificate_2_up = $up_location . $img_name;
        $a_certificate_2->move($up_location, $img_name);
        $path = public_path('/' . $member->a_certificate_2);
        if (File::exists($path)) {
            @unlink($path);
        }
        }
        //attachment certificate 3
        $a_certificate_3=$request->file('a_certificate_3');
        if($a_certificate_3){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($a_certificate_3->getClientOriginalExtension());
        $img_name = $name_gen . "." . $img_ext;
        $up_location = 'a_certificate_3/';
        $a_certificate_3_up = $up_location . $img_name;
        $a_certificate_3->move($up_location, $img_name);
        $path = public_path('/' . $member->a_certificate_3);
        if (File::exists($path)) {
            @unlink($path);
        }
        }
        
        
        $member->member_id=$request->member_id;
        $member->name=$request->name;
        $member->email=$request->email;
     
        $member->mobile=$request->mobile;
        $member->alt_mobile=$request->alt_mobile;
        $member->address=$request->address;
        $member->area=$request->area;
        $member->category=$request->category;
        $member->type=$request->type;
        $member->nid=$request->nid;
        $member->joining_date=$request->joining_date;
        if($member->ad == $request->ad){
            $member->ad=$request->ad;
        }
        else{
            $member->ad=$request->ad;
            $total_adrcs = AdRcstotal::findorFail($request->member_id);
            $total_adrcs->total_ad = $request->ad;
            $total_adrcs->total_paidad = $total_adrcs->cash_ad+$total_adrcs->cheque_ad;
            $total_adrcs->total_duead = $request->ad-$total_adrcs->total_paidad;
            $total_adrcs->update();
        }
        
        $member->msp=$request->msp;
        $member->rcs=$request->rcs;
        $member->reference_id=$request->reference_id;
        $member->update_by=Session::get('id');
        if($a_photo){
            $member->a_photo=$a_photo_up;
        }
        if($a_form){
            $member->a_form=$a_form_up;
        }
        if($a_nid){
            $member->a_nid=$a_nid_up;
        }
        if($a_noc){
            $member->a_noc=$a_noc_up;
        }
        if($a_certificate_1){
            $member->a_certifacte_1=$a_certificate_1_up;
        }
        if($a_certificate_2){
            $member->a_certifacte_2=$a_certificate_2_up;
        }
        if($a_certificate_3){
            $member->a_certifacte_3=$a_certificate_3_up;
        }
        $member->update();
        return redirect()->back();
    }


    public function professionalInfo(){
        $data=DB::table('memberprofessions')
                 ->leftjoin('members','members.member_id','memberprofessions.member_id')
                 ->select('members.name','memberprofessions.*')
                 ->get();
       
        return view('member.professionalInfo',compact('data'));
    }
    public function professionalInfoEntry(Request $request){

        $member_id = Session::get("insert_member_id");
        if($member_id){
            $member_profession=new Memberprofession();
            $member_profession->member_id=  $member_id;
            $member_profession->member_profession=$request->member_profession;
            $member_profession->member_designation=$request->member_designation;
            $member_profession->office_name=$request->office_name;
            $member_profession->office_address=$request->office_address;
            $member_profession->insert_by=Session::get('id');
            $member_profession->save();
            Session::flash('success',"Member Professional Info Insert Done");
        }
        else{
            Session::flash('error',"Member Professional Info Insert Error");
        }
        
        return back();
        
    }
    public function updateprofessionalInfo($id){
        $data=DB::table('memberprofessions')
                 ->leftjoin('members','members.member_id','memberprofessions.member_id')
                 ->select('members.name','memberprofessions.*')
                 ->get();
        $editData=Memberprofession::findOrfail($id);

        return view('member.professionalInfo',compact('data','editData'));
    }
    public function professionalInfoUpdate(Request $request,$id){
        $member_profession=Memberprofession::findOrfail($id);
        $member_profession->member_id=$request->member_id;
        $member_profession->member_profession=$request->member_profession;
        $member_profession->member_designation=$request->member_designation;
        $member_profession->office_name=$request->office_name;
        $member_profession->office_address=$request->office_address;
        $member_profession->update_by=Session::get('id');
        $member_profession->update();
        return redirect()->back();
    }
    public function personalInfo(){
        $data=DB::table('memberpersonals')
        ->leftjoin('members','members.member_id','memberpersonals.member_id')
        ->leftjoin('memberprofessions','memberprofessions.member_id','memberpersonals.member_id')
        ->select('members.name','memberprofessions.member_profession','memberpersonals.*')
        ->get();
      
        return view('member.personalInfo',compact('data'));
    }

    public function personalInfoEntry(Request $request){

        $member_id = Session::get("insert_member_id");
        if($member_id){
            $member_personal=new Memberpersonal();
            $member_personal->member_id=$member_id;
            $member_personal->sopouse_name=$request->sopouse_name;
            $member_personal->father_name=$request->father_name;
            $member_personal->mother_name=$request->mother_name;
            $member_personal->children_name_1=$request->children_name_1;
            $member_personal->children_name_2=$request->children_name_2;
            $member_personal->children_name_3=$request->children_name_3;
            $member_personal->date_birth=$request->date_birth;
            $member_personal->home_district=$request->home_district;
            $member_personal->insert_by=Session::get('id');
            $member_personal->save();
            Session::flash('success',"Member Personal Info Insert Done");
        }
        else{
            Session::flash('error',"Member Personal Info Insert Error");
        }
        
        return redirect('/member-entry');

        
    }

    public function updatepersonalInfo($id){
        $data=DB::table('memberpersonals')
        ->leftjoin('members','members.member_id','memberpersonals.member_id')
        ->leftjoin('memberprofessions','memberprofessions.member_id','memberpersonals.member_id')
        ->select('members.name','memberprofessions.member_profession','memberpersonals.*')
        ->get();
        $editData=Memberpersonal::findOrfail($id);
        return view('member.personalInfo',compact('data','editData'));
    }

    public function personalInfoUpdate(Request $request,$id){

        $member_personal=Memberpersonal::findOrfail($id);
        $member_personal->member_id=$request->member_id;
        $member_personal->sopouse_name=$request->sopouse_name;
        $member_personal->father_name=$request->father_name;
        $member_personal->mother_name=$request->mother_name;
        $member_personal->children_name_1=$request->children_name_1;
        $member_personal->children_name_2=$request->children_name_2;
        $member_personal->children_name_3=$request->children_name_3;
        $member_personal->date_birth=$request->date_birth;
        $member_personal->home_district=$request->home_district;
        $member_personal->update_by=Session::get('id');
        $member_personal->update();
        return redirect()->back();
    }


    public function educationInfo(){
        $data=DB::table('membereducations')
                  ->leftJoin('members','members.member_id','membereducations.member_id')
                  ->select('members.name','membereducations.*')
             
                 ->get();
           
        return view('member.educationInfo',compact('data'));
    }

    public function educationInfoEntry(Request $request){

        $member_id = Session::get("insert_member_id");
         if($member_id && $request->degree != null){
            $degree = $request->degree;
            $institute = $request->institute;
            $result = $request->result;
            $year = $request->year;
            // dd($request->all());
            // dd(count($degree));
       
            for( $i=0; $i < count($degree); $i++){
            
                $member_education=new Membereducation();
                $member_education->member_id= $member_id;
                
                $member_education->degree =$degree[$i];
                $member_education->institute=$institute[$i];
            
                
                $member_education->result=$result[$i];
                $member_education->year=$year[$i];
                $member_education->insert_by=Session::get('id');
        
                $member_education->save();

            }
            Session::flash('success',"Member Education Info Insert Done");
        }
        else{
            Session::flash('error',"Member Education Info Insert Error");
        }
        
        return redirect('/member-entry');

        
    }

    public function updateEducation($id){
        $editData=Membereducation::findOrfail($id);
     
        $data=DB::table('membereducations')
                  ->leftJoin('members','members.member_id','membereducations.member_id')
                  ->select('members.name','membereducations.*')
             
                 ->get();
           
        return view('member.educationInfo',compact('data','editData'));
    }

    public function educationUpdate(Request $request,$id){
        $member_education=Membereducation::findOrfail($id);

        $member_education->degree =$request->degree;
            $member_education->institute=$request->institute;
        
            
            $member_education->result=$request->result;
            $member_education->year=$request->year;
            $member_education->update_by=Session::get('id');
    
            $member_education->update();
            return redirect()->back();

    }

    public function changePassword(){
        return view('member.changePassword');
    }
    
    public function passwordChange(Request $request){
       
        $validateData = $request->validate([
            'newpassword' => 'required'

        ]);

        if(Auth::guard('member')->check()){

        
      
            
                $changepass=Member::select('password','id')->where('email',Auth::guard('member')->user()->email)->first();
                
                if (Hash::check($request->oldpassword,$changepass->password)) {
                    $updatepass=Member::findOrfail($changepass->id);
                    $updatepass->password=Hash::make($request->newpassword);
                    $updatepass->update();
                    return redirect('/dashboard'); 
            }else{
                return redirect()->back()->withErrors(['Invalid Old Password']);

            }
          
    
            

        }  else if(Auth::guard('admin')->check()){
         
            $changepass=Member::select('password','id')->where('email',$request->email)->first();
 
            if (Hash::check($request->oldpassword,$changepass->password)) {
                $updatepass=Member::findOrfail($changepass->id);
                $updatepass->password=Hash::make($request->newpassword);
                $updatepass->update();
                return redirect('/dashboard'); 
        }else{
            return redirect()->back()->withErrors(['Invalid Old Password']);
        }
    

        return redirect()->back()->withErrors(['Invalid email']);
        
    }else{

            $changepass=Employee::select('password','id')->where('email',Auth::guard('employee')->user()->email)->first();
            
            if (Hash::check($request->oldpassword,$changepass->password)) {
                $updatepass=Member::findOrfail($changepass->id);
                $updatepass->password=Hash::make($request->newpassword);
                $updatepass->update();
                return redirect('/dashboard'); 
        }else{

            return redirect()->back()->withErrors(['Invalid Old Password']);

        }
      
        
    }
}
//   public function insertEduction(Request $request){
//     $count_class = count($request->degree);

//     dd($count_class);
//   }
    
    public function memberCompleteEntry(Request $request){

         $member_id=$request->member_id;
        $member_joiningdate = $request->joining_date;
        $member_ad=$request->ad;
        $member_msp=$request->msp;
        $member_rcs=$request->rcs;
        //attachment photo  
                $a_photo=$request->file('a_photo');
                if($a_photo){
                    $name_gen = hexdec(uniqid());
                    $img_ext = strtolower($a_photo->getClientOriginalExtension());
                    $img_name = $name_gen . "." . $img_ext;
                    $up_location = 'a_photo/';
                    $a_photo_up = $up_location . $img_name;
                    $a_photo->move($up_location, $img_name);
                }
        //attachment from

        $a_form=$request->file('a_form');
        if($a_form){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($a_form->getClientOriginalExtension());
            $img_name = $name_gen . "." . $img_ext;
            $up_location = 'a_from/';
            $a_form_up = $up_location . $img_name;
            $a_form->move($up_location, $img_name);
        }

        //attachment nid

        $a_nid=$request->file('a_nid');
        if($a_nid){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($a_nid->getClientOriginalExtension());
            $img_name = $name_gen . "." . $img_ext;
            $up_location = 'a_nid/';
            $a_nid_up = $up_location . $img_name;
            $a_nid->move($up_location, $img_name);
        }

        //attachment noc

        $a_noc=$request->file('a_noc');
        if($a_noc){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($a_noc->getClientOriginalExtension());
            $img_name = $name_gen . "." . $img_ext;
            $up_location = 'a_noc/';
            $a_noc_up = $up_location . $img_name;
            $a_noc->move($up_location, $img_name);
        }
        //attachment certificate 1
        $a_certificate_1=$request->file('a_certificate_1');
        if($a_certificate_1){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($a_certificate_1->getClientOriginalExtension());
            $img_name = $name_gen . "." . $img_ext;
            $up_location = 'a_certificate_1/';
            $a_certificate_1_up = $up_location . $img_name;
            $a_certificate_1->move($up_location, $img_name);
        }
        //attachment certificate 2
        $a_certificate_2=$request->file('a_certificate_2');
        if($a_certificate_1){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($a_certificate_2->getClientOriginalExtension());
            $img_name = $name_gen . "." . $img_ext;
            $up_location = 'a_certificate_2/';
            $a_certificate_2_up = $up_location . $img_name;
            $a_certificate_2->move($up_location, $img_name);
        }
        //attachment certificate 3
        $a_certificate_3=$request->file('a_certificate_3');
        if($a_certificate_3){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($a_certificate_3->getClientOriginalExtension());
            $img_name = $name_gen . "." . $img_ext;
            $up_location = 'a_certificate_3/';
            $a_certificate_3_up = $up_location . $img_name;
            $a_certificate_3->move($up_location, $img_name);
        }
       
        $member= new Member();
        $member->member_id=  $member_id;
        $member->name=$request->name;
        $member->email=$request->email;
        $member->password=Hash::make($request->password);
        $member->mobile=$request->mobile;
        $member->alt_mobile=$request->alt_mobile;
        $member->address=$request->address;
        $member->area=$request->area;
        $member->category=$request->category;
        $member->type=$request->type;
        $member->nid=$request->nid;
        $member->joining_date=$request->joining_date;
        $member->ad=$request->ad;
        $member->msp=$request->msp;
        $member->rcs=$request->rcs;
        $member->reference_id=$request->reference_id;
        $member->insert_by=Session::get('id');
        if($a_photo){
            $member->a_photo=$a_photo_up;
        }
        if($a_form){
            $member->a_form=$a_form_up;
        }
        if($a_nid){
            $member->a_nid=$a_nid_up;
        }
        if($a_noc){
            $member->a_noc=$a_noc_up;
        }
        if($a_certificate_1){
            $member->a_certifacte_1=$a_certificate_1_up;
        }
        if($a_certificate_2){
            $member->a_certifacte_2=$a_certificate_2_up;
        }
        if($a_certificate_3){
            $member->a_certifacte_3=$a_certificate_3_up;
        }
        $member->save();

        


        $rcs_master = new Rcsmaster();
        $rcs_master->member_id = $member_id; 
        $rcs_master->rcs_date = date('Y-m-d'); 
        $rcs_master->rcs_month = date('M'); 
        $rcs_master->rcs_tobepaid = $member_rcs; 
        $rcs_master->save();

        $payment_track = new Adrcstotal();
        $payment_track->member_id = $member_id;
        $payment_track->total_ad = $member_ad;
        $payment_track->total_duead = $member_ad;
        $payment_track->total_rcs = $member_rcs;
        $payment_track->total_duercs = $member_rcs;
        $payment_track->save();

        // need some code when old ad and rcs details need.
        Session::put("insert_member_id",$member_id);
        Session::flash('success',"Member Info Insert Done");


        return redirect('/member-entry');



    }

    //ajax requst for photo
    public function memberDetail($id){
        return Member::findOrFail($id);
    }

    public function memberEntryEmployee(Request $request){
        $pin=Pin::where('pin',$request->pin)->first();
       if($pin){
        if($pin->employee_id == Session::get('id') && $pin->page_name ==$request->page_name){
           
            Session::put('memberEntry','true');
            return view('member.memberEntry');
        }else{
            return redirect()->back();
        }
       }else{
        return redirect()->back();
       }
    
    }

    
    public function membertableEmp(Request $request){
        $pin=Pin::where('pin',$request->pin)->first();
       if($pin){
        if($pin->employee_id == Session::get('id') && $pin->page_name ==$request->page_name){
           
            $data=Member::get();
       
            return view('member.memberTable',compact('data','pin'));
        }else{
            return redirect()->back();
        }
       }else{
        return redirect()->back();
       }
    
    }

    public function memberpersonaltableEmp(Request $request){
        $pin=Pin::where('pin',$request->pin)->first();
       if($pin){
        if($pin->employee_id == Session::get('id') && $pin->page_name ==$request->page_name){
           
            $data=DB::table('memberpersonals')
            ->leftjoin('members','members.member_id','memberpersonals.member_id')
            ->leftjoin('memberprofessions','memberprofessions.member_id','memberpersonals.member_id')
            ->select('members.name','memberprofessions.member_profession','memberpersonals.*')
            ->get();
          
         
       
            return view('member.personalInfo',compact('data','pin'));
        }else{
            return redirect()->back();
        }
       }else{
        return redirect()->back();
       }
    
    }

    public function membereducationtableEmp(Request $request){
        $pin=Pin::where('pin',$request->pin)->first();
        if($pin){
        if($pin->employee_id == Session::get('id') && $pin->page_name ==$request->page_name){
           
            $data=DB::table('membereducations')
            ->leftJoin('members','members.member_id','membereducations.member_id')
            ->select('members.name','membereducations.*')
       
           ->get();
     
           return view('member.educationInfo',compact('data','pin'));
         
       
          
        }else{
            return redirect()->back();
        }
       }else{
        return redirect()->back();
       }
    
    }

    

    public function memberprofessiontableEmp(Request $request){
        $pin=Pin::where('pin',$request->pin)->first();
       if($pin){
        if($pin->employee_id == Session::get('id') && $pin->page_name ==$request->page_name){
           
            $data=DB::table('memberprofessions')
            ->leftjoin('members','members.member_id','memberprofessions.member_id')
            ->select('members.name','memberprofessions.*')
            ->get();
  
             return view('member.professionalInfo',compact('data','pin'));
         
         
       
          
        }else{
            return redirect()->back();
        }
       }else{
        return redirect()->back();
       }
    
    }
    

}
