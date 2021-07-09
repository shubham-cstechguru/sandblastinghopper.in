<?php

namespace App\Http\Controllers;

use App\model\About;


use Illuminate\Routing\Controller as BaseController;


class AboutusController extends BaseController {
    public function index() {
    	
        $about = About::findOrFail(1);
        
        $data = compact('about');
    	
    	return view('frontend.pages.about',$data);
    }
}