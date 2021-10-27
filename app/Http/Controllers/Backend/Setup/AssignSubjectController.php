<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject()
    {
        $data['allData']= AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.assign_subject.view', $data);
    }

    public function AddAssignSubject()
    {
        $data['allData']  = AssignSubject::all();
        $data['subjects'] = SchoolSubject::all();
        $data['classes']  = StudentClass::all();
        return view('backend.assign_subject.add_assign_subject', $data);
    }


    public function StoreAssignSubject(Request $request)
    {
        $countSubject = count($request->subject_id);
        if ($countSubject != NULL) {
            $validateClass = $request->validate([
                'class_id' => 'required'
            ], [
                'class_id.required' => 'you must select class',
                'subject_id'      => 'required',
                'full_mark'       => 'required',
                'pass_mark'       => 'required',
                'subjective_mark' => 'required'
            ]);
            for ($i = 0; $i < $countSubject; $i++) {
                $assignSubject = new AssignSubject();
                $assignSubject->class_id = $request->class_id;
                $assignSubject->subject_id = $request->subject_id[$i];
                $assignSubject->full_mark = $request->full_mark[$i];
                $assignSubject->pass_mark = $request->pass_mark[$i];
                $assignSubject->subjective_mark = $request->subjective_mark[$i];
                $assignSubject->created_at = Carbon::now();
                $assignSubject->save();
            }
            $notification = array('message' => 'Assign Subject Inserted successfully ', 'alert-type' => 'success');
            return redirect()->route('assign.subject.view')->with($notification);
        }
    }

    public function EditteAssignSubject($id)
    {
        $data['editData'] = AssignSubject::where('class_id',$id)->orderBy('subject_id','asc')->get();
        $data['subjects'] = SchoolSubject::all();
        $data['classes']  = StudentClass::all();
        return view('backend.assign_subject.edit',$data);
    }

    public function UpdateAssignSubject(Request $request, $id)
    {
        if ($request->subject_id == NULL) {
            $notification = array(
                'message' => 'You must select the subject name',
                'alert-type' => 'error'
            );
            return redirect()->route('assign.subject.edit',$id)->with($notification);
        }else{
            $coutntSubject = count($request->subject_id);
            AssignSubject::where('class_id',$id)->delete();
            for($i=0;$i<$coutntSubject;$i++){
                $assignSubject = new AssignSubject();
                $assignSubject->class_id = $request->class_id;
                $assignSubject->subject_id = $request->subject_id[$i];
                $assignSubject->full_mark = $request->full_mark[$i];
                $assignSubject->pass_mark = $request->pass_mark[$i];
                $assignSubject->subjective_mark = $request->subjective_mark[$i];
                $assignSubject->updated_at = Carbon::now();
                $assignSubject->save();
            }
            $notification = array('message' => 'Assign Subject Updated successfully ', 'alert-type' => 'success');
           return redirect()->route('assign.subject.view')->with($notification);
        }
    }

    public function DetailsAssignSubject($id)
    {
        $data['detailsData'] = AssignSubject::where('class_id',$id)->orderBy('subject_id','asc')->get();    
        return view('backend.assign_subject.details',$data);
    }
}
