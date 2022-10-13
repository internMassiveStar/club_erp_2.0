<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DonationController extends Controller
{
    public function donationView(){
        $data=Donation::all();
        return view('msp.donation',compact('data'));
    }
    public function donationEntry(Request $request){
        $donation=new Donation();
        $donation->donation_name=$request->donation_name;
        $donation->issue_date=$request->issue_date;
        $donation->remarks=$request->remarks;
        $donation->insert_by=Session::get('id');
        $donation->save();
        Session::flash('success',"Donation Save");

        return redirect()->back();
    }
    public function donationShow($id){
        $editData=Donation::findOrfail($id);
        return view('msp.donation',compact('editData'));
    }
    public function donationUpdate(Request $request,$id){
        $donation=Donation::findOrfail($id);
        $donation->donation_name=$request->donation_name;
        $donation->issue_date=$request->issue_date;
        $donation->remarks=$request->remarks;
    
        $donation->update();
        Session::flash('success',"Donation Update");

        return redirect('/donation');
    }
    
}
