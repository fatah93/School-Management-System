<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DesignationCntroller extends Controller
{
    public function ViewDesignation()
    {
        $data['allData'] = Designation::all();
        return view('backend.designation.view',$data);
    }

    public function StoreDesignation(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:4|unique:designations'
        ],[
            'name.required'=>'You must enter name',
            'name.min'     =>'name must be more than 4 charachters',
            'name.unique'  => 'this name already exist,please chang it'
        ]);

        if(Designation::where('name',$request->name)->exists()){
            $notification = array(
                'message' => 'ERROR : Designation already exist',
                'alert-type' => 'error'
            );
            return redirect()->route('designation.view')->with($notification);    
        }else{
            Designation::insert(['name' => $request->name,'created_at' =>Carbon::now()]);
            $notification = array(
                'message' => 'SUCCESS : Designation inserted successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('designation.view')->with($notification);
        }

    }

    public function UpdateDesignation(Request $request,$id)
    {
        $data = Designation::find($id);
        if($request->name == $data->name)
        {
            $notification = array(
                'message' => 'WARNING : You cant change designation name with it even',
                'alert-type' => 'warning'
            );
            return redirect()->route('designation.view')->with($notification);
        }elseif(Designation::where('name',$request->name)->exists())
        {
            $notification = array('message' => 'ERROR : Designation name already exist ','alert-type' => 'error');
            return redirect()->route('designation.view')->with($notification);
        }else
        {
            Designation::find($id)->update(['name'=>$request->name,'updated_at'=>Carbon::now()]);
            $notification = array('message' => 'SUCCESS : Designation updated successfully','alert-type' => 'success');
            return redirect()->route('designation.view')->with($notification);
        }
    }

    public function DeleteDesignation($id)
    {
        Designation::find($id)->delete();
        $notification = array('message' => 'SUCCESS : designation deleted successfully','alert-type' => 'success');
        return redirect()->route('designation.view')->with($notification);
    }
}
