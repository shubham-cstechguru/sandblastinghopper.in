<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;

use App\Model\Service;
use App\Model\Technology;
use App\Model\Inquiry;
use App\Model\Faq;

class ServicesController extends BaseController {
    public function index() {
    	  	
    	$lists1 = Service::latest()->paginate(100);

        $data = compact( 'lists1' );
    	return view('frontend.inc.services', $data);
    }

    public function single_service(Service $list) {
        
        $faq   = Faq::where('parent','=', $list->parent)->get()->toArray();
        
    	$data1 = Service::where('id','!=', $list->id)->paginate(5)->toArray();
 // dd($data1);
        $data = compact( 'list','data1' , 'faq'); // Variable to array convert
        return view('frontend.inc.singlepage', $data);
    	  	
    	
    	
    }
 
    
    public function addData(Request $request)
    {
        //
        $rules = [
            'mobile_no'             => 'required',
            'message'             => 'required'
            

                ];
         
        $request->validate( $rules );

        $obj = Inquiry::findOrFail( $id );
        $obj->mobile_no              = $request->mobile_no;
        $obj->message               = $request->message;
        
        
        $obj->save();

        return redirect( url('admin-control/inquiry') )->with('success', 'Success! New record has been added.');
    }

}