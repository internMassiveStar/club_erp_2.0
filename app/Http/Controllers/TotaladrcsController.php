<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\AdRcstotal;
use App\Models\Oldadrcstotal;
use App\Models\Rcsmaster;
use App\Models\Pin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TotaladrcsController extends Controller
{
    public bool $press_active = true;
    

    public function totalAdRcsView(){
        $data = DB::table('ad_rcstotals')
                    ->select('ad_rcstotals.*','members.name')
                    ->leftJoin('members','ad_rcstotals.member_id','members.member_id')
                    ->get();
        $flag='true';
    
        return view('total_ad_rcs.total_ad_rcs',compact('data','flag'));
    }
    public function oldtotalAdRcsView(){
        $flag='true';
        $data=Oldadrcstotal::all();
        return view('total_ad_rcs.old_total_ad_rcs',compact('flag','data'));
    }
    public function oldtotalAdRcsUpdateView($id){
        $editData=Oldadrcstotal::findOrfail($id);
        return view('total_ad_rcs.old_total_ad_rcs',compact('editData'));
    }
    public function oldtotalAdRcsUpdate(Request $request,$id){
        $old=Oldadrcstotal::findOrfail($id);
        $old->member_id=$request->member_id;
        $old->old_total_ad=$request->old_total_ad;
        $old->old_cash_ad=$request->old_cash_ad;
        $old->old_cheque_ad=$request->old_cheque_ad;
        $old->old_total_paidad=$request->old_total_paidad;
        $old->old_total_duead=$request->old_total_duead;
        $old->old_total_rcs=$request->old_total_rcs;
        $old->old_cash_rcs=$request->old_cash_rcs;
        $old->old_cheque_rcs=$request->old_cheque_rcs;
        $old->old_total_paidrcs=$request->old_total_paidrcs;
        $old->old_total_duercs=$request->old_total_duercs;
        $old->update();
        return redirect('/old-total-ad&rcs');
    }
    public function monthlyProcedure(){
        
        return view('rcs.monthlyProcedure');
    }
    public function monthlyProcedureCalculation(){
        // if we want to remove some member for the monthly procedure running.

        // public function index()

        // {

        //     $users = User::select("*")

        //                     ->whereNotIn('id', [4, 5, 6])

        //                     ->get();

        

        //     dd($users);                    

        // }

        // public function index()

        // {

        //     $myString = '1,2,3';

        //     $myArray = explode(',', $myString);

            

        //     $users = User::select("*")

        //                     ->whereNotIn('id', $myArray)

        //                     ->get();

        

        //     dd($users);                    

        // }
        // $press = !$press_active;
        // if(date('d')=='1' && $press == false){
        //     $press_active = false;
        //     calculation();
        //     return view('rcs.monthlyProcedure');
        // }
        // elseif (date('d')=='2' && $press == false) {
        //     $press_active = false;
        //     calculation();
        // }
            

        
    }
    public function calculation(){


            $month = date('M');
            $date = date('Y-m-d');
            $member = DB::table('members')
                            ->select('members.*')
                            ->where('norcs','=','0')
                            ->get();
            foreach ($member as $key => $value) {
                $rcs_master = new Rcsmaster();
                $rcs_master->member_id = $value->member_id;
                $rcs_master->rcs_date = $date;
                $rcs_master->rcs_month = $month;
                $rcs_master->rcs_tobepaid = $value->rcs;
                $rcs_master->save();
            }
            
            $rcs_masterinfo = DB::table('rcsmasters')
                                    ->select('member_id',DB::raw('count(rcs_tobepaid) as total_rcs'))
                                    ->groupby('member_id')
                                    ->get();
            foreach ($rcs_masterinfo as $key => $value) {
                $total_adrcs = AdRcstotal::findorFail($value->member_id);
                $total_adrcs->total_rcs = $value->total_rcs;
                $total_adrcs->total_paidrcs = $total_adrcs->cash_rcs+$total_adrcs->cheque_rcs;
                $total_adrcs->total_duercs = $value->total_rcs-$total_adrcs->total_paidrcs;
                $total_adrcs->update();
            }
    }
    public function noRcs(){
        $member_rcs = DB::table('members')
                            ->select('members.*')
                            ->where('norcs','=','0')
                            ->get();
        $member_norcs = DB::table('members')
                            ->select('members.*')
                            ->where('norcs','=','1')
                            ->get();
        $data = compact('member_rcs','member_norcs');
        return view('rcs.norcs')->with($data);
    }
    public function noRcs_deactive($id)
    {
        $db = Member::findorFail($id);
        $db->norcs = 1;
        $db->update();
        return redirect()->back();
    }
    public function noRcs_active($id)
    {
        $db = Member::findorFail($id);
        $db->norcs = 0;
        $db->update();
        return redirect()->back();
    }
    public function totalAdRcsViewold(Request $request){
        $pin=Pin::where('pin',$request->pin)->first();
       if($pin){
        if($pin->old_id == Session::get('id') && $pin->page_name ==$request->page_name){
            $data = DB::table('ad_rcstotals')
            ->select('ad_rcstotals.*','members.name')
            ->leftJoin('members','ad_rcstotals.member_id','members.member_id')
            ->get();
            return view('total_ad_rcs.total_ad_rcs' ,compact('pin','data'));
        }else{
            return redirect()->back();
        }
       }else{
        return redirect()->back();
       }
    
    }
    public function oldtotalAdRcsViewEmployee(Request $request){
        $pin=Pin::where('pin',$request->pin)->first();
       if($pin){
        if($pin->employee_id == Session::get('id') && $pin->page_name ==$request->page_name){
           
            
            return view('total_ad_rcs.old_total_ad_rcs' ,compact('pin'));
        }else{
            return redirect()->back();
        }
       }else{
        return redirect()->back();
       }
    
    }
    public function oldtotalAdRcsTableEmployee(Request $request){
        $pinTable=Pin::where('pin',$request->pin)->first();
       if($pinTable){
        if($pinTable->employee_id == Session::get('id') && $pinTable->page_name ==$request->page_name){
           $data=Oldadrcstotal::all();
            return view('total_ad_rcs.old_total_ad_rcs' ,compact('data','pinTable'));

        }else{
            return redirect()->back();
        }
       }else{
        return redirect()->back();
       }
    
    }
    
   
    public function oldtotalAdRcsInsert(Request $request){
        $validateData = $request->validate([
            'old_total_ad' => 'required',
            'old_total_rcs' => 'required' 
        ]);
       
       

        $old=new Oldadrcstotal();
       
        $old->member_id=$request->member_id;
        $old->old_total_ad=$request->old_total_ad;
        $old->old_cash_ad=$request->old_cash_ad;
        $old->old_cheque_ad=$request->old_cheque_ad;
        $old->old_total_paidad=$request->old_total_paidad;
        $old->old_total_duead=$request->old_total_duead;
        $old->old_total_rcs=$request->old_total_rcs;
        $old->old_cash_rcs=$request->old_cash_rcs;
        $old->old_cheque_rcs=$request->old_cheque_rcs;
        $old->old_total_paidrcs=$request->old_total_paidrcs;
        $old->old_total_duercs=$request->old_total_duercs;
        $old->insert_by=Session::get('id');
        $old->save();

        if(Auth::guard('employee')->check()){

         

            $last = DB::table('oldadrcstotals')->latest()->first();

            return view('total_ad_rcs.old_total_ad_rcs',compact('last'));

        }

        return redirect('/old-total-ad&rcs');
    }
 
    public function dashboardData(){
        if(Auth::guard('admin')->check()){
            $data=DB::table('ad_rcstotals')
            ->select('total_ad','total_paidad','total_duead','total_rcs','total_paidrcs','total_duercs')
            ->get();
            return view('dashboard',compact('data'));
         
        }else if(Auth::guard('member')->check()){
            $data=DB::table('ad_rcstotals')
            ->select('total_ad','total_paidad','total_duead','total_rcs','total_paidrcs','total_duercs')
             ->where('member_id',Session::get('id'))
            ->get();
            return view('dashboard',compact('data'));

        }else{
            return view('dashboard');
        }
    }

}
