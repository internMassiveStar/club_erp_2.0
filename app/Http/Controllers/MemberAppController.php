<?php

namespace App\Http\Controllers;

use App\Models\Agm;
use App\Models\Member;
use App\Models\Mspclubfund;
use App\Models\MspwithWeight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class MemberAppController extends Controller
{
    public function getMember(Request $request){
        $request->validate([
            'email' => 'required',
            
        ]);
        $credential=Member::select('password','member_id')->where('email',$request->email)->first();
        if($credential){
            if(Hash::check($request->password,$credential->password)) {
                
                return response()->json($credential->member_id);
    
            }

        }

        
        }


        
       
            
public function AdAndRcs($id){
    $data=Mspclubfund::where('member_id',$id)->first();
    return response()->json($data);
}
    

public function getPosition($id){

   $data=app(\App\Http\Controllers\ReportController::class)->position();
   $position=$data->where('member_id',$id);
   $position=$position->keys()->first()+1;
   if($position==1){
    return response()->json('1st');
   }elseif($position==2){
    return response()->json('2nd');
   }elseif($position==3){
    return response()->json('3rd');
   }else{

    return response()->json($position ."th");

   }
  
  

}
public function getMsp($id){
$msp=MspwithWeight::select('msp')->where('member_id',$id)->first();
return response()->json($msp);
}





 public function changePassword(Request $request){
       
        $validateData = $request->validate([
            'newpassword' => 'required'

        ]);

 $changepass=Member::select('password','id')->where('email',$request->email)->first();
                
        if (Hash::check($request->oldpassword,$changepass->password)) {
            $updatepass=Member::findOrfail($changepass->id);
            $updatepass->password=Hash::make($request->newpassword);
            $updatepass->update();
            return response()->json([
             'message'=>'Password Updated'
           ]); 
            }else{
                  return response()->json([
             'message'=>'Worng Old Password'
           ]); 

            }
        
 }
public function agmRegistration(Request $request){
if($request->member_id !=null){
    $agm= new Agm();
    $agm->member_id=$request->member_id;
    $agm->member_name=$request->name;
    $agm->member_mobile=$request->mobile;
    $agm->payment_method=$request->payment_method;
    $agm->transaction_id=$request->transaction;
    

    $agm->save();
    return response()->json([
       'message'=>'AGM Resgistration Reequst Submitted Successfully!!'
   ]);
}

}
}
