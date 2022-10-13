<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class PinController extends Controller
{
    public function pinView(){
        $data=DB::table('employees')->select('employee_id','name')->get();
        $pinData=Pin::orderBy('id','DESC')->get();

      
        return view('pin.pinset',compact('data','pinData'));
    }
    public function generatePin(Request $request){
        $pin_no=random_int(10000, 99999);
        $pin= new Pin();
        $pin->employee_id=$request->employee_id;
        $pin->page_name=$request->page_name;
        $pin->pin=$pin_no;
        $pin->save();
        return redirect()->back();


    }
    public function removePin($id){
        $pin=Pin::findOrfail($id);
       
        $task= new Task();
        $task->employee_id=$pin->employee_id;
        $task->pin=$pin->pin;
        $task->page_name=$pin->page_name;
        $task->save();

        $pin->delete();
        return redirect()->back();

    }


    public function task(){
        $data=DB::table('tasks')
                  ->join('employees','employees.employee_id','tasks.employee_id')
                  ->select('employees.name','tasks.*')
                  ->orderBy('tasks.id','DESC')
                  ->get();
                
        return view('pin.task',compact('data'));
    }
}
