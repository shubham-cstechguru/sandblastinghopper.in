<?php

namespace App\Http\Controllers\admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\User;

// use Hash;
use Auth;

class NewpasswordController extends Controller {
    public function index() {
        // echo Hash::make( 'admin123' ); die;
    
        return view('backend.inc.new-password');
    }

    

    
    
}
