<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function ViewStudentShift()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.student_shift.student_shift_view', $data);
    }

    public function StoreStudentShift(Request $request)
    {
        if (StudentShift::where('name', $request->name)->exists()) {
            $notification1 = array('message' => 'student shift already exist', 'alert-type' => 'error');
            return redirect()->route('stuent.shift.view')->with($notification1);
        } else {
            $validateData = $request->validate(['name' => 'required|unique:student_shifts']);
            StudentShift::insert(['name' => $request->name, 'created_at' => Carbon::now()]);
            $notification = array('message' => 'student shift inserted successfully', 'alert-type' => 'success');
            return redirect()->route('stuent.shift.view')->with($notification);
        }
    }

    public function UpdateStudentShift(Request $request, $id)
    {       
        if (StudentShift::where('name', $request->name)->exists()) {
            $notification = array('message' => 'student shift already exist', 'alert-type' => 'error');
            return redirect()->route('stuent.shift.view')->with($notification);
        } else {
            $validateData = $request->validate(['name' => 'required|unique:student_shifts']);
            StudentShift::find($id)->update(['name' => $request->name, 'updated_at' => Carbon::now()]);
            $notification = array('message' => 'student shift updated  successfully', 'alert-type' => 'success');
            return redirect()->route('stuent.shift.view')->with($notification);
        }
    }

    public function DeleteStudentShift($id)
    {
        StudentShift::find($id)->delete();
        $notification = array('message' => 'student shift deleted successfully', 'alert-type' => 'success');
        return redirect()->route('stuent.shift.view')->with($notification);
    }
}
