<?php

namespace App\Http\Controllers;

use App\Models\MspwithoutWeight;
use App\Models\MspwithWeight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class ReportController extends Controller
{
    public function reports(){
        $flag='true';
        return view('reports.reports',compact('flag'));
    }

    public function generateReport(Request $request){

        $data=self::position();
      
        $position=$data->where('member_id',$request->member_id);

    
        $position=$position->keys()->first()+1;
      
        $memberwith=MspwithWeight::where('member_id',$request->member_id)->first();
       if($memberwith){
        $memberwithout=MspwithoutWeight::where('member_id',$request->member_id)->first();
        $highest=MspwithWeight::all();
    
        $maxm=MspwithWeight::select('msp')->max('msp');
        $max=MspwithWeight::select( 'member_name','msp')->where('msp',$maxm)->first();
        //$max=MspwithWeight::select( 'member_name','msp')->where('msp','10')->first();
       
        return view('reports.reports',compact('memberwith','memberwithout','position','max','highest'));
       }else{
        Session::flash('error',"Invalid Member Id");
        return redirect()->back();
       }
        
    }

    public function reportsWithweight(){
       
        $data=self::position();
        $result = "";
        foreach ($data as $key => $val) {
            $result .= "['".$val->member_name."(".$val->member_id.")',".$val->msp."],";
        }
        //dd($result);
        return view('reports.withweight',compact('data','result'));
    }
    public function reportsWithoutweight(){
        $data=MspwithoutWeight::all();
        $result = "";
        foreach ($data as $key => $val) {
            $result .= "['".$val->member_name."(".$val->member_id.")',".$val->member_reference+$val->member_clubfund+$val->member_referral_clubfund+$val->member_attend_formationmeeting+$val->member_attend_clubprogram+$val->member_responsibility_gap+$val->member_attend_communityprogram+$val->member_consume +$val->member_responsibility +$val->member_time_donation."],";
        }
        return view('reports.withoutweight',compact('data','result'));
    }

    public function position(){
        $datas=MspwithWeight::where('status','1')->get();
      
        $data1 = $datas->sortByDesc("msp");
        $datas2=MspwithWeight::where('status','0')->get();
        $data2 = $datas2->sortByDesc("msp");
        $data=$data1->merge($data2);
        return $data;
    }

    public function membermsp(){
        $memberwith=MspwithWeight::where('member_id',Auth::guard('member')->user()->member_id)->first();
        $memberwithout=MspwithoutWeight::where('member_id',Auth::guard('member')->user()->member_id)->first();
        return view ('reports.member_msp')->with(compact('memberwithout','memberwith'));
    }

    public function membermspadmin(){
        $memberwith=MspwithWeight::where('member_id',Auth::guard('admin')->user()->member_id)->first();
        $memberwithout=MspwithoutWeight::where('member_id',Auth::guard('admin')->user()->member_id)->first();
        return view ('reports.member_msp')->with(compact('memberwithout','memberwith'));
    }
}
