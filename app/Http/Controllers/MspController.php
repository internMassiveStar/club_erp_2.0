<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\PaidDonation;
use App\Models\PaidSpecialRcs;
use App\Models\Rcsepecial;
use App\Models\Weightage;
use App\Models\Mspreferredfund;
use App\Models\Msplistvalue;
use App\Models\MspwithoutWeight;
use App\Models\MspwithWeight;
use App\Models\Mspclubfund;
use App\Models\Msptimedonation;
use App\Models\Mspclubfundpoint;





use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MspController extends Controller
{
   
    public function mspForm(Request $request, $type = null, $id = null){
        $donations=Donation::all();
        $rcs_specials=Rcsepecial::all();
        if($request->isMethod('post')){
           
            //if($type=='member' && Session::get('msp_step')==''){
                if($type=='member'){

                
                // $rules = [
                // // 'member_name'=>'required|regex:/^[\pL\s\-]+$/u',
                // 'member_id'=>'required|min:10',
                // // 'member_refered_by'=>'required|max:10',
                // // 'member_joiningdate'=>'required|date',
                // // 'member_reference'=>'required|numeric',
                // // 'member_attend_formationmeeting'=>'required|numeric',
                // // 'member_attend_clubprogram'=>'required|numeric',
                // // 'member_attend_communityprogram'=>'required|numeric',
                // // 'member_responsibility'=>'required|numeric',
                // // 'member_responsibility_gap'=>'required|numeric',
                // // 'member_consume'=>'required|numeric',
                // ];
                // $this->validate($request,$rules);

                $validator = Validator::make($request->all(),[
                   
                    'member_id'=>'required|min:9',
                    
                    'member_joiningdate'=>'required|date',
                    'member_reference'=>'required|numeric',
                    'member_attend_formationmeeting'=>'required|numeric',
                    'member_attend_clubprogram'=>'required|numeric',
                    'member_attend_communityprogram'=>'required|numeric',
                    'member_responsibility'=>'required|numeric',
                    'member_responsibility_gap'=>'required|numeric',
                    'member_consume'=>'required|numeric',
                ]);

                if($validator->fails()){
                    return redirect('/msp-form/member')->withErrors($validator)->withInput();
                }
                else{
           
               $member_id = $request->member_id;
               $member_name = $request->member_name;
               $member_refered_by = $request->member_reference_by;
               $member_joiningdate = $request->member_joiningdate;
               
               Session::put('msp_member_id',$member_id);
               Session::put('msp_member_name',$member_name);
               Session::put('referred_id',$member_refered_by);
               Session::put('msp_member_joiningdate',$member_joiningdate);
               Session::put('msp_step','member');
             

               $msp_listvalue = new Msplistvalue();
               $msp_listvalue->member_id = $member_id;
               $msp_listvalue->member_reference = $request->member_reference;
               $msp_listvalue->member_attend_formationmeeting = $request->member_attend_formationmeeting;
               $msp_listvalue->member_attend_clubprogram = $request->member_attend_clubprogram;
               $msp_listvalue->member_attend_communityprogram = $request->member_attend_communityprogram;
               $msp_listvalue->save();

               $msp_without_weight = new MspwithoutWeight();
               $msp_without_weight->member_id = $member_id;
               $msp_without_weight->member_name = $member_name;
               $msp_without_weight->member_refered_by = $member_refered_by;
               $msp_without_weight->member_responsibility = $request->member_responsibility;
               $msp_without_weight->member_responsibility_gap = $request->member_responsibility_gap;
               $msp_without_weight->member_consume = $request->member_consume;
               $msp_without_weight->save();
              

               $msp_with_weight = new MspwithWeight();
               $msp_with_weight->member_id = $member_id;
               $msp_with_weight->member_name = $member_name;
               $msp_with_weight->member_refered_by = $member_refered_by;
               $msp_with_weight->save();
               Session::flash('success',"Member save");
                }
            }
            elseif ($type=='donation')  {
                $member_id = Session::get('msp_member_id');
              
                if($member_id && $request->donation_name != null){
                    $donation_name = $request->donation_name;
                    $amount = $request->amount;
                    $donation_sum=0;
                    for( $i=0; $i < count($donation_name); $i++){
                    
                        $paid_donation=new PaidDonation();
                        $paid_donation->member_id= $member_id;
                        
                        $paid_donation->donation_name =$donation_name[$i];
                        $paid_donation->amount=$amount[$i];
                        $donation_sum+=$amount[$i];

                        $paid_donation->save();

                    }
                    Session::flash('success',"Doantion save");
                    Session::put('msp_step','donation');
                    Session::put('donation',$donation_sum);
                }
                else{
                    Session::flash('success',"Doantion save faild");
                }
                return redirect()->back();
            }
            elseif (($type=='special_rcs') || (Session::get('msp_step')=='donation')) {

                $member_id = Session::get('msp_member_id');
                if($member_id && $request->rcs_name != null){
                    $rcs_name = $request->rcs_name;
                    $sum_spcl_rcs=0;
                
                    for( $i=0; $i < count($rcs_name); $i++){
                        $amount=Rcsepecial::select('amount')->where('rcs_name',$rcs_name[$i])->first();
                        $paid_special_rcs=new PaidSpecialRcs();
                        $paid_special_rcs->member_id= $member_id;
                        $paid_special_rcs->rcs_name =$rcs_name[$i];
                        $paid_special_rcs->amount=$amount->amount;
                        $sum_spcl_rcs+=$amount->amount;
                        $paid_special_rcs->save();
                    }
                    Session::flash('success',"Specail Rcs Paid");
                    Session::put('msp_step','special_rcs');
                    Session::put('spcial_rcs',$sum_spcl_rcs);
                }
                else{
                    Session::flash('error',"Specail Rcs save faild");
                }
                return redirect()->back()->with('sum_spcl_rcs');
            }
            elseif ($type=='club_fund') {

                $member_id = Session::get('msp_member_id');

                // $rules = [
                //     'member_ad' => 'required|numeric',
                //     'member_name_value' => 'required|numeric',
                //     'member_activities' => 'required|numeric',
                //     'member_rcs' => 'required|numeric',
                //     'member_rcs_point' => 'required|numeric|min:1',
                //     'member_special_rcs' => 'required|numeric',
                //     'member_special_rcs_point' => 'required|numeric|min:1',
                //     'member_donation' => 'required|numeric',
                //     'member_donation_point' => 'required|numeric|min:1',
                //     'member_investment' => 'required|numeric',
                //     'member_investment_point' => 'required|numeric|min:1',
                // ];
                // $this->validate($request,$rules);
                $validator = Validator::make($request->all(),[
                    'member_ad' => 'required|numeric',
                    'member_name_value' => 'required|numeric',
                    'member_activities' => 'required|numeric',
                    'member_rcs' => 'required|numeric',
                   
                    'member_special_rcs' => 'required|numeric',
                   
                    'member_donation' => 'required|numeric',
                    
                    'member_investment' => 'required|numeric',
                   
                ]);
                if($validator->fails()){
                    return redirect('/msp-form/club_fund')->withErrors($validator)->withInput();
                }
                else{
                if(!empty($member_id)){
                    $date = Session::get('msp_member_joiningdate');
                    $set_date = "2022-06-30";
                    $ad_paid = $request->member_ad;
                    $ad_name_value = $request->member_name_value;
                    $ad_activities_value = $request->member_activities;
                    $actual_ad_value = $ad_paid+$ad_name_value+$ad_activities_value;

                    $rcs = $request->member_rcs;
                    $msp_rcs = $request->member_rcs_point;

                    $special_rcs = $request->member_rcs;
                    $msp_special_rcs = $request->member_special_rcs_point;

                    $donation = $request->member_rcs;
                    $msp_donation = $request->member_donation_point;
                    
                    $investment = $request->member_rcs;
                    $msp_investment = $request->member_investment_point;

                    $actual_others_value = $rcs+$special_rcs+$donation+$investment;
                    $msp_others = $msp_rcs+$msp_special_rcs+$msp_donation+$msp_investment;
                    if($msp_others <=5){
                        
                        ($date < $set_date) ? $ad = 200000 : $ad = 500000;

                        if($actual_ad_value >= $ad){
                            $total_ad_value = $ad;
                            $msp_ad = 5;
                        }
                        else{
                            $total_ad_value = $actual_ad_value;
                            $msp_ad = ($total_ad_value/$ad)*5;
                        }

                        $mspclubfundpoints = new Mspclubfundpoint();
                        $mspclubfundpoints->member_id = $member_id;
                        $mspclubfundpoints->msp_ad = $msp_ad;
                        $mspclubfundpoints->msp_rcs = $msp_rcs;
                        $mspclubfundpoints->msp_special_rcs = $msp_special_rcs;
                        $mspclubfundpoints->msp_donation = $msp_donation;
                        $mspclubfundpoints->msp_investment = $msp_investment;
                        $mspclubfundpoints->msp_others = $msp_others;
                        $mspclubfundpoints->save();

                        $mspclubfunds = new Mspclubfund();
                        $mspclubfunds->member_id = $member_id;
                        $mspclubfunds->ad_paid = $ad_paid;
                        $mspclubfunds->ad_name_value = $ad_name_value;
                        $mspclubfunds->ad_activities_value = $ad_activities_value;
                        $mspclubfunds->total_ad_value = $total_ad_value;
                        $mspclubfunds->actual_ad_value = $actual_ad_value;
                        $mspclubfunds->rcs = $rcs;
                        $mspclubfunds->special_rcs = $special_rcs;
                        $mspclubfunds->donation = $donation;
                        $mspclubfunds->investment = $investment;
                        $mspclubfunds->actual_others_value = $actual_others_value;
                        $mspclubfunds->save();

                        MspwithoutWeight::where('member_id',$member_id)->update(['member_clubfund'=>($msp_ad+$msp_others)]);

                        $mspreferredfund = new Mspreferredfund();
                        $mspreferredfund->member_id = $member_id;
                        $mspreferredfund->total_amount = $actual_ad_value+$actual_others_value;
                        $mspreferredfund->referred_id = Session::get('referred_id');
                        $mspreferredfund->save();

                    }
                    else{
                        Session::flash('error',"Tolal point equal or less than 5");
                        return redirect()->back();
                    }
                    
                }
            }

            }
            //elseif ($type=='time_donation' && Session::get('msp_step')=='club_fund') {
            elseif ($type=='time_donation') {

                $member_id = Session::get('msp_member_id');
                
                // $rules = [
                //     'member_given_time'=>'required|numeric',
                //     'member_asume_salary'=>'required|numeric',
                // ];
                // $this->validate($request,$rules);
                $validator = Validator::make($request->all(),[
                    'member_given_time'=>'required|numeric',
                    'member_asume_salary'=>'required|numeric',
                ]);
                if($validator->fails()){
                    return redirect('/msp-form/time_donation')->withErrors($validator)->withInput();
                }else{

                if(!empty($member_id)){
                    $time = $request->member_given_time;
                    $monthly_salary = $request->member_asume_salary;
                    $hourly_salary = $monthly_salary/(8*26);

                    $time_donation_table = new Msptimedonation();
                    $time_donation_table->member_id = $member_id;
                    $time_donation_table->time = $time;
                    $time_donation_table->salary = $monthly_salary;
                    $time_donation_table->save();

                    Msplistvalue::where('member_id',$member_id)->update(['member_time_donation'=>($time*$hourly_salary)]);
                    
  
                    Session::put('msp_member_id','');
                    Session::put('msp_member_name','');
                    Session::put('referred_id','');
                    Session::put('msp_member_joiningdate','');
                    Session::put('msp_step','');
                    // calculation();
                     self::calculation();
                    Session::flash('success',"Build value saved");
                }
                else{
                    Session::flash('error',"Build value save faild");
                }
            }
            }
        }
        
        return view('msp.msp-form',compact('donations','rcs_specials'));
    }
  public function weightage(){
    $data=Weightage::all();
    return view('msp.weightage',compact('data'));
  }

  public function weightageEntry(Request $request){
    if($request->msp1+$request->msp2+$request->msp3+$request->msp4+$request->msp5+$request->msp6+
    $request->msp7+$request->msp8+$request->msp9+$request->msp10 == 100){
        $msp=new Weightage();
        $msp->msp1=$request->msp1;
        $msp->msp2=$request->msp2;
        $msp->msp3=$request->msp3;
        $msp->msp4=$request->msp4;
        $msp->msp5=$request->msp5;
        $msp->msp6=$request->msp6;
        $msp->msp7=$request->msp7;
        $msp->msp8=$request->msp8;
        $msp->msp9=$request->msp9;
        $msp->msp10=$request->msp10;
        $msp->save();
        Session::flash('success',"weightage save");
        

    }else{
        Session::flash('error',"Tolal wieghtage greater or less than 100");
    }
    return redirect()->back();
  }
  public function weightageShow($id){

    $editData=Weightage::findOrfail($id);
    return view('msp.weightage',compact('editData'));
    
  }

  public function weightageUpdate(Request $request,$id){


    if($request->msp1+$request->msp2+$request->msp3+$request->msp4+$request->msp5+$request->msp6+
    $request->msp7+$request->msp8+$request->msp9+$request->msp10 == 100){
        $msp=Weightage::findOrfail($id);
        $msp->msp1=$request->msp1;
        $msp->msp2=$request->msp2;
        $msp->msp3=$request->msp3;
        $msp->msp4=$request->msp4;
        $msp->msp5=$request->msp5;
        $msp->msp6=$request->msp6;
        $msp->msp7=$request->msp7;
        $msp->msp8=$request->msp8;
        $msp->msp9=$request->msp9;
        $msp->msp10=$request->msp10;
        $msp->update();
        self::calculation();
        Session::flash('success',"weightage update");
        return redirect('/weightage');

    }else{
        Session::flash('error',"Tolal wieghtage greater or less than 100");
        return redirect()->back();
    }
    

  }



  public function calculation(){
    
    
    $referred_fund = Mspreferredfund::all();
     
    //$referred_fund_array = Mspreferredfund::all()->toArray();
    $total_referred_fund = $referred_fund->sum('total_amount');
    $count = $referred_fund->count();
    //dd($referred_fund[0]['id']);
    //dd($count);
    foreach ($referred_fund as $key => $value) {
        // member contribution amount
        $contribution = DB::table('mspreferredfunds')->select(DB::raw('sum(total_amount) as amount'))->where('referred_id', $value->member_id)->groupBy('referred_id')->first();
      
        if($contribution != null){
            $contribution_amount= $contribution->amount;
            //dd($contribution_amount);
            $portion = ($value->total_amount/$total_referred_fund)*100;
            Mspreferredfund::where('member_id',$value->member_id)->update(['contribution_amount'=>$contribution_amount,'portion'=>$portion]);
        }
        else{
            $portion = ($value->total_amount/$total_referred_fund)*100;
            Mspreferredfund::where('member_id',$value->member_id)->update(['portion'=>$portion]);
        }
    }
    $referred_fund = Mspreferredfund::all();
    $max_contribution = $referred_fund->max('contribution_amount');
    //dd($max_contribution);
    foreach ($referred_fund as $key => $value) {
        //dd($value->contribution_amount);
        $rcm = ROUND(($value->contribution_amount/$max_contribution)*10);
        Mspreferredfund::where('member_id',$value->member_id)->update(['rcm'=>$rcm]);
        MspwithoutWeight::where('member_id',$value->member_id)->update(['member_referral_clubfund'=>$rcm]);
        
    }

    $msp_list_value = Msplistvalue::all();
   

    $max_reference = $msp_list_value->max('member_reference');
  
    $max_formation_meeting = $msp_list_value->max('member_attend_formationmeeting');
    $max_club_program = $msp_list_value->max('member_attend_clubprogram');
    $max_community_program = $msp_list_value->max('member_attend_communityprogram');
    $max_time_donation = $msp_list_value->max('member_time_donation');

    foreach ($msp_list_value as $key => $value) {

        $reference_point = ROUND(($value->member_reference/$max_reference)*10);
        $formation_point = ROUND(($value->member_attend_formationmeeting/$max_formation_meeting)*10);
        $clubprogram_point = ROUND(($value->member_attend_clubprogram/$max_club_program)*10);
        $community_point = ROUND(($value->member_attend_communityprogram/$max_community_program)*10);
        $time_donation_point = ROUND(($value->member_time_donation/$max_time_donation)*10);

        MspwithoutWeight::where('member_id',$value->member_id)->update(['member_reference'=>$reference_point,'member_attend_formationmeeting'=>$formation_point,'member_attend_clubprogram'=>$clubprogram_point,'member_attend_communityprogram'=>$community_point,'member_time_donation'=>$time_donation_point]);
    }

    $weight = Weightage::first();
    //dd($weight->id);
    $msp_without_weights = MspwithoutWeight::all();
    foreach ($msp_without_weights as $key => $value) {
        $msp1 = $value->member_reference * ($weight->msp1/10);
        $msp2 = $value->member_clubfund * ($weight->msp2/10);
        $msp3 = $value->member_referral_clubfund * ($weight->msp3/10);
        $msp4 = $value->member_attend_formationmeeting * ($weight->msp4/10);
        $msp5 = $value->member_attend_clubprogram * ($weight->msp5/10);
        $msp6 = $value->member_responsibility_gap * ($weight->msp6/10);
        $msp7 = $value->member_attend_communityprogram * ($weight->msp7/10);
        $msp8 = $value->member_consume * ($weight->msp8/10);
        $msp9 = $value->member_responsibility * ($weight->msp9/10);
        $msp10 = $value->member_time_donation * ($weight->msp10/10);
        if($msp1==0 ||$msp2==0 ||$msp3==0 ||$msp4==0 ||$msp5==0 ||$msp6==0 ||$msp7==0 ||$msp8==0 ||$msp9==0 ||$msp10==0){
            $status = 0;
        }
        else {
            $status = 1;
        }

        MspwithWeight::where('member_id',$value->member_id)->update(['member_reference'=>$msp1,'member_clubfund'=>$msp2,'member_referral_clubfund'=>$msp3,'member_attend_formationmeeting'=>$msp4,'member_attend_clubprogram'=>$msp5,'member_responsibility_gap'=>$msp6,'member_attend_communityprogram'=>$msp7,'member_consume'=>$msp8,'member_responsibility'=>$msp9,'member_time_donation'=>$msp10,'msp'=>($msp1+$msp2+$msp3+$msp4+$msp5+$msp6+$msp7+$msp8+$msp9+$msp10),'status'=>$status]);
    }


  }


    // public function paidDonation(Request $request){
    //     $member_id=180100051;
    //     if($member_id && $request->donation_name != null){
    //         $donation_name = $request->donation_name;
    //         $amount = $request->amount;
    //         for( $i=0; $i < count($donation_name); $i++){
            
    //             $paid_donation=new PaidDonation();
    //             $paid_donation->member_id= $member_id;
                
    //             $paid_donation->donation_name =$donation_name[$i];
    //             $paid_donation->amount=$amount[$i];

    //             $paid_donation->save();

    //         }
    //         Session::flash('success',"Doantion save");
    //     }
    //     return redirect()->back();
    // }
    // public function paidspecailRcs(Request $request){
    //     $member_id=180100051;
    //     if($member_id && $request->rcs_name != null){
    //         $rcs_name = $request->rcs_name;
          
    //         for( $i=0; $i < count($rcs_name); $i++){
    //             $amount=Rcsepecial::select('amount')->where('rcs_name',$rcs_name[$i])->first();
    //             $paid_special_rcs=new PaidSpecialRcs();
    //             $paid_special_rcs->member_id= $member_id;
    //             $paid_special_rcs->rcs_name =$rcs_name[$i];
    //             $paid_special_rcs->amount=$amount->amount;
    //             $paid_special_rcs->save();
    //         }
    //         Session::flash('success',"Specail Rcs Paid");
    //     }
    //     return redirect()->back();
    // }
}
