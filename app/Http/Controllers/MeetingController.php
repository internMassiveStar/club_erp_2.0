<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MeetingController extends Controller
{
    public function program(){
        $data=Meeting::all();
        return view('msp.program',compact('data'));
    }
    public function meetingEntry(Request $request){
        $meeting=new Meeting();
        $meeting->total_meeting=$request->total_meeting;
        $meeting->meeting_type=$request->meeting_type;
        $meeting->insert_by=Session::get('id');
        $meeting->save();
        Session::flash('success',"Meeting/Program Save");

        return redirect()->back();
    }
    public function meetingShow($id){
        $editData=Meeting::findOrfail($id);
        return view('msp.program',compact('editData'));
    }
    public function meetingUpdate(Request $request,$id){
        $meeting=Meeting::findOrfail($id);
        $meeting->total_meeting=$request->total_meeting;
        $meeting->meeting_type=$request->meeting_type;
        $meeting->update();
        Session::flash('success',"Meeting/Program Update");

        return redirect('/program');
    }
}
