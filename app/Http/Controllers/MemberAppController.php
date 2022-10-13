<?php

namespace App\Http\Controllers;

use App\Models\Agm;
use App\Models\Member;
use App\Models\Mspclubfund;
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
                $member = DB::table('mspwith_weights')
                ->join('mspclubfunds','mspclubfunds.member_id','mspwith_weights.member_id')
                ->select('mspclubfunds.ad_paid','mspclubfunds.rcs','mspwith_weights.member_name','mspwith_weights.msp','mspwith_weights.member_id')
                ->where('mspwith_weights.member_id',$credential->member_id)
                ->first();
                return response()->json($member);
    
            }

        }

        
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
