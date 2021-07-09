<?php

namespace App\Http\Controllers\admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

// use Hash;
use Auth;

class UserController extends Controller {
    public function login() {
        // echo Hash::make( 'admin123' ); die;
    
        return view('backend.inc.login');
    }

    public function logout() {
        Auth::logout();

        return redirect( url('admin-control') )->with('success', 'You\'ve logged out');
    }

    public function auth( Request $request ) {


        $remember = ($request->has('remember')) ? true : false;


        $rules = [
            'user_login'    => 'required',
            'password'  => 'required|min:6|max:20'
        ];
        $request->validate( $rules );

        $userData = [
            'user_login'    => $request->user_login,
            'password'  => $request->password
        ];
        



        if( Auth::attempt( $userData, $remember ) ) {
            return redirect( url('admin-control/dashboard') );
        } else {
            return redirect( url('admin-control') )->with('danger', 'Credentials is not matched.');
        }
    }
    
}
