<?php

namespace App\Http\Controllers;
use App\Model\Service;


use Illuminate\Routing\Controller as BaseController;

class ServiceController extends BaseController {
    public function single(Service $service) {


    	$list = Service::findOrFail($id);

    	

        $data = compact( 'list' ); // Variable to array convert
        return view('frontend.inc.singlepage', $data);
    	  	
    	
    	
    }
}
