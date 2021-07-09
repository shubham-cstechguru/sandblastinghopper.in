<?php

namespace App\Http\Controllers\admin;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Hash;
use App\Model\User;




class ChangepasswordController extends Controller {
    public function index() {
        // Select Query to get news data
        

        // $data = compact( 'lists' ); // Variable to array convert
        // return view('backend.inc.survey.index', $data);


        
     // Variable to array convert
        return view('backend.inc.change-password');
    }
    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|same:new_password',
            'confirm_password' => 'required|string|min:6|same:new_password'

        ]);
        // dd($validatedData);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
}
