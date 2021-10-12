<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ViewUser(){
        // $allData = User::all();
        $data['allData'] = User::all();
        return view('backend.user.view_user',$data);
    }

    public function AddUser(){
        return view('backend.user.add_user');
    }

    public function StoreUser(Request $request){

        $validateData = $request->validate([
            'name'     => 'required|min:4|unique:users',
            'email'    => 'required|unique:users',
            'usertype' => 'required',
            'password' => 'required|min:5'
        ],[
            'name.required'  => 'please entre the name',
            'name.min'       => 'the name muste contain more than 4 characters',
            'name.unique'    => 'you can\'t add it with this name,change it',

            'email.required' => 'please enter the email',
            'name.unique'    => 'you can\'t add it with this email,change it',
            
            'usertype.required'      => 'please select the user role',
             
            'password.required' => 'please enter the password',
            'password.min'      => 'the password must contain more than 5 characters',
        ]);

        $data = User::insert([
            'name'      => $request->name,
            'email'     => $request->email,
            'usertype'  => $request->usertype,
            'password'  => bcrypt($request->password),
            'created_at'=> Carbon::now() 
        ]);

        if($data){
            $notification = array(
                'alert-type' => 'success',
                'message' => 'the user inserted succesfully'
            );            
        }else{
            $notification = array(
                'alert-type' => 'error',
                'message' => 'the user inserted succesfully'
            );   
        }
        return redirect()->route('view.user')->with($notification);
    }

    public function UpdateUser(Request $request,$id){


        // $validateData = $request->validate([
        //     'name'     => 'required|min:4|unique:users',
        //     'email'    => 'required|unique:users',
        //     'usertype' => 'required',
        // ],[
        //     'name.required'  => 'please entre the name',
        //     'name.min'       => 'the name muste contain more than 4 characters',
        //     'name.unique'    => 'you can\'t add it with this name,change it',

        //     'email.required' => 'please enter the email',
        //     'name.unique'    => 'you can\'t add it with this email,change it',
            
        //     'usertype.required'      => 'please select the user role',
             
        // ]);

        $data = User::find($id);
        $data->name = $request->name;
        $data->email= $request->email;
        $data->usertype = $request->usertype;
        $data->updated_at = Carbon::now();
        $data->save();

        // User::find($id)->update([
        //     'name'      => $request->name,
        //     'email'     => $request->email,
        //     'usertype'  => $request->usertype,
        //     'updated_at'=> Carbon::now()
        // ]);
        $notification = array(
            'alert-type' => 'success',
            'message' => 'User updated succesfully'
        );
        return redirect()->route('view.user')->with($notification);   
    }

    public function DeleteUser($id){
        User::find($id)->delete();

        $notification = array(
            'alert-type' => 'success',
            'message' => 'User removed succesfully'
        );

        return redirect()->route('view.user')->with($notification);
    }
}
