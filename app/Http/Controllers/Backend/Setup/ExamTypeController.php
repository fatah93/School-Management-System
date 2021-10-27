<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function ViewExamType()
    {
        $data['allData'] = ExamType::all();
        return view('backend.exam_type.view',$data);
    }

    public function StoreExamType(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:4|unique:exam_types'
        ],[
            'name.required'=>'You must enter name',
            'name.min'     =>'name must be more than 4 charachters',
            'name.unique'  => 'this name already exist,please chang it'
        ]);

        ExamType::insert(['name' => $request->name,'created_at' =>Carbon::now()]);
        $notification = array(
            'message' => 'Exam type inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }

    public function UpdateExamType(Request $request,$id)
    {   
        $data = ExamType::find($id);
        if($request->name == $data->name)
        {
            $notification = array(
                'message' => 'You cant chang Exam name with it even',
                'alert-type' => 'warning'
            );
            return redirect()->route('exam.type.view')->with($notification);
        }elseif(ExamType::where('name',$request->name)->exists())
        {
            $notification = array('message' => 'ERROR : Name already exist ','alert-type' => 'error');
            return redirect()->route('exam.type.view')->with($notification);
        }else
        {
            ExamType::find($id)->update(['name'=>$request->name,'updated_at'=>Carbon::now()]);
            $notification = array('message' => 'EXam name updated successfully','alert-type' => 'success');
            return redirect()->route('exam.type.view')->with($notification);
        }
    }

    public function DeleteExamType($id)
    {
        ExamType::find($id)->delete();
        $notification = array('message' => 'EXam name deleted successfully','alert-type' => 'success');
        return redirect()->route('exam.type.view')->with($notification);
    }
}
