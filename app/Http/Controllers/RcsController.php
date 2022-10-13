<?php

namespace App\Http\Controllers;

use App\Models\Rcsoperation;
use App\Models\Adrcstotal;
use App\Models\Pin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Session;

class RcsController extends Controller
{
    public function rcsOperationView(){
        $data=DB::table('rcsoperations')
                ->leftjoin('members','rcsoperations.member_id','members.member_id')
                ->select('rcsoperations.*','members.name')
                ->get();
            $flag='true';
        return view('rcs.rcsOperation',compact('data','flag'));
    }
    public function monthlyProcedure(){ 
        return view('rcs.monthlyProcedure');
    }

    public function rcsOperationInsert(Request $request){

        $validateData = $request->validate([
            'member_id' => 'required',

            'receiving_amount' => 'required',


        ]);

        $rcs= new Rcsoperation();
        $rcs->member_id=$request->member_id;
        $rcs->receiving_date=$request->receiving_date;
        $rcs->receiving_amount=$request->receiving_amount;
        $rcs->receiving_tool=$request->receiving_tool;
        $rcs->insert_by= Session::get('id');
        $rcs->save();

        if(Auth::guard('employee')->check()){

         

            $last = DB::table('rcsoperations')
            ->leftjoin('members','rcsoperations.member_id','members.member_id')
            ->select('rcsoperations.*','members.name')
            ->latest()->first();

            return view('rcs.rcsOperation',compact('last'));

        }
      
     
        return redirect()->back();

    }
    public function rcsConfirm($id){
        $rcs=Rcsoperation::findOrfail($id);
        $db = Adrcstotal::where('member_id',$rcs->member_id)->first();
            $db->cash_rcs += $rcs->receiving_amount;
            $db->total_paidrcs += $rcs->receiving_amount;
            $db->total_duercs -= $rcs->receiving_amount;
            $db->update();
        $rcs->status=1;
        $rcs->update();
        return redirect()->back();    
    }
    public function rcsUpdate($id){
        $editData=Rcsoperation::findOrfail($id);
        return view('rcs.rcsOperation',compact('editData'));
    }
    public function updateRcs(Request $request,$id){
        $validateData = $request->validate([
            'member_id' => 'required',

            'receiving_amount' => 'required',


        ]);
        $rcs=Rcsoperation::findOrfail($id);
        $rcs->member_id=$request->member_id;
        $rcs->receiving_date=$request->receiving_date;
        $rcs->receiving_amount=$request->receiving_amount;
        $rcs->receiving_tool=$request->receiving_tool;
        $rcs->update_by= Session::get('id');
       
      
        $rcs->update();

        return redirect(route('rcs-operation'));

    }
   public function memberRcsView(){

    $data=DB::table('rcsoperations')->where('receiving_tool','Cash')->where('member_id',Session::get('id'))->get();
    $cheques_data=DB::table('rcsoperations')
                      ->join('cheques','cheques.member_id','rcsoperations.member_id')
                      ->select('cheques.*','rcsoperations.receiving_tool','rcsoperations.receiving_date')
                      ->where('rcsoperations.receiving_tool','Cheque')
                      ->where('cheques.ad_rcs','RCS')
                      ->where('rcsoperations.member_id',Session::get('id'))
                      ->get();
                   

    return view('personaldetails.rcsdetails',compact('data','cheques_data'));
   }

   public function rcsoperationEmployee(Request $request){
    $pin=Pin::where('pin',$request->pin)->first();
   if($pin){
    if($pin->employee_id == Session::get('id') && $pin->page_name ==$request->page_name){

        return view('rcs.rcsOperation',compact('pin'));
    }else{
        return redirect()->back();
    }
   }else{
    return redirect()->back();
   }

}
public function rcsoperationTable(Request $request){
    $pinTable=Pin::where('pin',$request->pin)->first();
   if($pinTable){
    if($pinTable->employee_id == Session::get('id') && $pinTable->page_name ==$request->page_name){
        $data=DB::table('rcsoperations')
        ->leftjoin('members','rcsoperations.member_id','members.member_id')
        ->select('rcsoperations.*','members.name')
        ->get();
        return view('rcs.rcsOperation',compact('pinTable','data'));
    }else{
        return redirect()->back();
    }
   }else{
    return redirect()->back();
   }

}


}
