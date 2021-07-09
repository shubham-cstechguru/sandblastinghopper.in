<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;


use App\Model\Technology;
use App\Model\Inquiry;
use App\Model\Faq;

class TechnologyController extends BaseController {
    public function index() {
    	  	
    	$lists1 = Technology::latest()->paginate();

        $data = compact( 'lists1' );
    	return view('frontend.inc.technology', $data);
    }

    public function single(Technology $slug) {



        $faq   = Faq::where('parent','=', $slug->parent)->get()->toArray();
        
    	$data1 = Technology::where('id','!=', $slug->id)->paginate(5)->toArray();
 // dd($data1);
        $data = compact( 'slug','data1' , 'faq'); // Variable to array convert
        return view('frontend.inc.tech_single', $data);  
    }
       

}