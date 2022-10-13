<?php

namespace App\Http\Controllers;

use App\Models\Rcsepecial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class RcsSpecialController extends Controller
{
    public function specialRcs(){
        $data=Rcsepecial::all();
        return view('msp.specialRcs',compact('data'));
    }
    public function specialRcsEntry(Request $request){
        $rcs_special=new Rcsepecial();
        $rcs_special->rcs_name=$request->rcs_name;
        $rcs_special->issue_date=$request->issue_date;
        $rcs_special->amount=$request->amount;
        $rcs_special->remarks=$request->remarks;
        $rcs_special->save();
        Session::flash('success',"Special Rcs Save");
        return redirect()->back();
    }
    public function specialRcsShow($id){
        $editData=Rcsepecial::findOrfail($id);
        return view('msp.specialRcs',compact('editData'));
    }
    public function specialRcsUpdate(Request $request,$id){
        $rcs_special=Rcsepecial::findOrfail($id);
   
        $rcs_special->rcs_name=$request->rcs_name;
        $rcs_special->issue_date=$request->issue_date;
        $rcs_special->amount=$request->amount;
        $rcs_special->remarks=$request->remarks;
        $rcs_special->update();
        Session::flash('success',"Special Rcs Update");

        return redirect('/specialRcs');
    }
}
