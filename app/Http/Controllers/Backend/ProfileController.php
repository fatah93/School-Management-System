<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ViewProfile(){

        $user = User::find(Auth::user()->id);
        return view('backend.profile.view_profile',compact('user')); 
    }

    public function EditProfile(){
        
        $editData = User::find(Auth::user()->id);
        return view('backend.profile.edit',compact('editData'));
    }

    public function UpdateProfile(Request $request){
        $user = User::find(Auth::user()->id);

        $user->name   = $request->name;
        $user->email  = $request->email;
        $user->mobile = $request->mobile;
        $user->adress = $request->adress;
        $user->gender = $request->gender;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/admin_images'),$user->image);
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'),$fileName);
            $user->image = $fileName;
        }//end condition

        $user->save();

        $notification = array(
            'message' => 'Your profile updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.view')->with($notification);
    }

    public function ChangePassword(){
     return view('backend.profile.change_password');   
    }

    public function UpdatePassword(Request $request){
        $userData = User::find(Auth::user()->id);
        $validateData = $request->validate([
            'current_password' => 'string|required',
            'password' => 'string|required|confirmed|min:8'
        ],[
            'current_password.required' => 'Please enter Current password',
            'password.required'         => 'Please enter New password',
            'password.confirmed'        => 'The password does not matched',
            'password.min'              => 'The password must exceed 8 charcters', 
        ]);


        if(isset( $request->current_password) && Hash::check($request->current_password,Auth::user()->password)){
            $userData->password = Hash::make($request->password);
            $userData->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            $notifiation = array(
                'alert-type' => 'error',
                'message' => 'the current password is not correct' 
            );
            return redirect()->back()->with($notifiation);

        }
    }

}
