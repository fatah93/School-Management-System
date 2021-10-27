<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function ViewStudentGroup()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.student_group.student_group_view', $data);
    }

    public function StoreStudentGroup(Request $request)
    {
        if (StudentGroup::where('name', $request->name)->exists()) {
            $notification1 = array('message' => 'student group already exist', 'alert-type' => 'error');
            return redirect()->route('stuent.group.view')->with($notification1);
        } else {
            $validateData = $request->validate(['name' => 'required|unique:student_groups']);
            StudentGroup::insert(['name' => $request->name, 'created_at' => Carbon::now()]);
            $notification = array('message' => 'student group inserted successfully', 'alert-type' => 'success');
            return redirect()->route('stuent.group.view')->with($notification);
        }
    }

    public function UpdateStudentGroup(Request $request, $id)
    {       
        if (StudentGroup::where('name', $request->name)->exists()) {
            $notification = array('message' => 'student group already exist', 'alert-type' => 'error');
            return redirect()->route('stuent.group.view')->with($notification);
        } else {
            $validateData = $request->validate(['name' => 'required|unique:student_groups']);
            StudentGroup::find($id)->update(['name' => $request->name, 'updated_at' => Carbon::now()]);
            $notification = array('message' => 'student group updated successfully', 'alert-type' => 'success');
            return redirect()->route('stuent.group.view')->with($notification);
        }
    }

    public function DeleteStudentGroup($id)
    {
        StudentGroup::find($id)->delete();
        $notification = array('message' => 'student group deleted successfully', 'alert-type' => 'success');
        return redirect()->route('stuent.group.view')->with($notification);
    }
}
