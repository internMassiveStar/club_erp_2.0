<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PolicyController extends Controller
{
    public function policyView(){
        $data=Policy::all();
        return view('msp.policy',compact('data'));

    }
    public function policyEntry(Request $request){
        $policy=new Policy();
        $policy->policy_name=$request->policy_name;
        $policy->highest_ad=$request->highest_ad;
        $policy->issue_date=$request->issue_date;
        $policy->save();
        Session::flash('success',"Policy Save");
        return redirect('/policy');
    }
    public function policyShow($id){
        $editData=Policy::findOrfail($id);
        return view('msp.policy',compact('editData'));
    }
    public function policyUpdate(Request $request,$id){
        $policy=Policy::findOrfail($id);
        $policy->policy_name=$request->policy_name;
        $policy->highest_ad=$request->highest_ad;
        $policy->issue_date=$request->issue_date;
        $policy->update();
        Session::flash('success',"Policy Update");
        return redirect('/policy');
    }
    
}
