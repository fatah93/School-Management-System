<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function ViewStudentClass(){
        $data['allData'] = StudentClass::all();
        return view('backend.student_class.View_student_class',$data);
    }

    public function StoreStudentClass(Request $request){
    
        $dataValidation = $request->validate([
            'name' => 'required|min:5|unique:student_classes',
        ],[
            'name.required' => 'you must enter the name',
            'name.min'      => 'min charachters is 5',
            'name.unique'   => 'name already exist, change it',
        ]);

        $data = StudentClass::insert([
                'name' => $request->name,
                'created_at' => Carbon::now()]
            );
        if($data){
            $notificatio = array(
                'message' => 'Student class name inserted successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('stuent.class.view')->with($notificatio);
        }else{
            $notificatio = array(
                'message' => 'You have error, tray again',
                'alert-type' => 'error'
            );
            return redirect()->route('stuent.class.view')->with($notificatio);
        }

    }

    public function UpdateStudentClass(Request $request,$id){
        $dataValidation = $request->validate([
            'name' => 'required|min:5|unique:student_classes',
        ]);

        $dataClass = StudentClass::find($id);
        $dataClass->name = $request->name;
        $dataClass->updated_at = Carbon::now();
        $dataClass->save();

        $notification = array(
            'alert-type' => 'success',
            'message' =>'Then Class name changed successfully'
        );

        return redirect()->route('stuent.class.view')->with($notification);
    }

    public function DeleteStudentClass($id){

        $delete = StudentClass::find($id)->delete();
        if($delete){
            $notification = array(
                'alert-type' => 'success',
                'message'    => 'The class name deleted successfully'
            );
            return redirect()->route('stuent.class.view')->with($notification);
        }else{
            $notification = array(
                'alert-type' => 'error',
                'message'    => 'We cant\'t delete student class'
            );
            return redirect()->route('stuent.class.view')->with($notification);
        }

    }
    
}   
