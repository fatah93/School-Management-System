<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function ViewSchoolSubject()
    {
        $data['allData'] = SchoolSubject::all();
        return view('backend.school_subject.view',$data);
    }

    public function StoreSchoolSubject(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:4|unique:school_subjects'
        ],[
            'name.required'=>'You must enter name',
            'name.min'     =>'name must be more than 4 charachters',
            'name.unique'  => 'this name already exist,please chang it'
        ]);

        if(SchoolSubject::where('name',$request->name)->exists()){
            $notification = array(
                'message' => 'School Subject already exist',
                'alert-type' => 'error'
            );
            return redirect()->route('school.subject.view')->with($notification);    
        }else{
            SchoolSubject::insert(['name' => $request->name,'created_at' =>Carbon::now()]);
            $notification = array(
                'message' => 'School Subject inserted successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('school.subject.view')->with($notification);
        }

    }

    public function UpdateSchoolSubject(Request $request,$id)
    {   
        $data = SchoolSubject::find($id);
        if($request->name == $data->name)
        {
            $notification = array(
                'message' => 'You cant change School Subject name with it even',
                'alert-type' => 'warning'
            );
            return redirect()->route('school.subject.view')->with($notification);
        }elseif(SchoolSubject::where('name',$request->name)->exists())
        {
            $notification = array('message' => 'ERROR : School Subject name already exist ','alert-type' => 'error');
            return redirect()->route('school.subject.view')->with($notification);
        }else
        {
            SchoolSubject::find($id)->update(['name'=>$request->name,'updated_at'=>Carbon::now()]);
            $notification = array('message' => 'School Subject  name updated successfully','alert-type' => 'success');
            return redirect()->route('school.subject.view')->with($notification);
        }
    }

    public function DeleteSchoolSubject($id)
    {
        SchoolSubject::find($id)->delete();
        $notification = array('message' => 'School Subject deleted successfully','alert-type' => 'success');
        return redirect()->route('school.subject.view')->with($notification);
    }
}
