<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRollController extends Controller
{
    public function RollGenerateView()
    {
        $data['years'] = StudentYear::all();
        $data['classes']= StudentClass::all();
        return view('student_management.student_roll.view',$data);
    }

    public function RollGenerateGetStude(Request $request)
    {
        $allData = AssignStudent::with(['student'])
                ->where('year_id',$request->year_id)
                ->where('class_id',$request->class_id)
                ->get(); 
        return response()->json($allData);
    }

    public function RollGenerateStore(Request $request)
    {
        if($request->student_id != NULL)
        {
            for($i=0;$i<count($request->student_id);$i++)
            {
                AssignStudent::where('year_id',$request->year_id)
                            ->where('class_id',$request->class_id)
                            ->where('student_id',$request->student_id[$i])
                            ->update(['roll'=>$request->roll[$i]]);
            } // end for loop 
            $not = array(
                'message' => 'Student roll Generated succesfully',
                'alert-type' => 'success'
            );
            return redirect()->route('role.generate.view')->with($not);
        }else{
            $not = array(
                'message' => 'Sorry there are not student',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($not);
        } // end Else if
    }
}
