<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function ViewStudentYear()
    {
        $data['allData'] = StudentYear::all();
        return view('backend.student_year.student_year_view', $data);
    }

    public function StoreStudentYear(Request $request)
    {
        if (StudentYear::where('name', $request->name)->exists()) {
            $notification1 = array('message' => 'student year already exist', 'alert-type' => 'error');
            return redirect()->route('stuent.year.view')->with($notification1);
        } else {
            $validateData = $request->validate(['name' => 'required|unique:student_years']);
            StudentYear::insert(['name' => $request->name, 'created_at' => Carbon::now()]);
            $notification = array('message' => 'student year inserted successfully', 'alert-type' => 'success');
            return redirect()->route('stuent.year.view')->with($notification);
        }
    }

    public function UpdateStudentYear(Request $request, $id)
    {       
        if (StudentYear::where('name', $request->name)->exists()) {
            $notification = array('message' => 'student year already exist', 'alert-type' => 'error');
            return redirect()->route('stuent.year.view')->with($notification);
        } else {
            $validateData = $request->validate(['name' => 'required|unique:student_years']);
            StudentYear::find($id)->update(['name' => $request->name, 'updated_at' => Carbon::now()]);
            $notification = array('message' => 'student year inserted successfully', 'alert-type' => 'success');
            return redirect()->route('stuent.year.view')->with($notification);
        }
    }

    public function DeleteStudentYear($id)
    {
        StudentYear::find($id)->delete();
        $notification = array('message' => 'student year inserted successfully', 'alert-type' => 'success');
        return redirect()->route('stuent.year.view')->with($notification);
    }
}
