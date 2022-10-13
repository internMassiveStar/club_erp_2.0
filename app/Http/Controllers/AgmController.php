<?php

namespace App\Http\Controllers;

use App\Models\Agm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class AgmController extends Controller
{
   public function agm(){
    $data=Agm::orderBy('id','DESC')->get();
 
    return view('agm.agm',compact('data'));
   }
   
      public function agmView(){
      return view('agm.agmReg');
   }
   public function saveAgm(Request $request){

      
      $validator = Validator::make($request->all(),[
         // 'member_name'=>'required|regex:/^[\pL\s\-]+$/u',
         // 'member_id'=>'required|min:10',
         
         'mobile'=>'required',
         'transaction'=>'required',
         
     ]);

     if($validator->fails()){
         return redirect('/agm-reg')->withErrors($validator)->withInput();
     }
     else{
         $agm= new Agm();
         $agm->member_id=$request->member_id;
         $agm->member_name=$request->name;
         $agm->member_mobile=$request->mobile;
         $agm->payment_method=$request->payment_method;
         $agm->transaction_id=$request->transaction;
         $agm->save();
         $last = DB::table('agms')  
         ->latest()->first();
         return view('agm.agmReg',compact('last'));
   }
   
}
}
