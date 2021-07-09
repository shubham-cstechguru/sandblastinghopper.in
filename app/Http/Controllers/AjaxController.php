<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\model\Inquiry;

class AjaxController extends BaseController {
    
    public function index(Request $request) {
        
        
        
         $data = new Inquiry();
         $data->user_name = $request->name;
         $data->user_email = $request->email;
         $data->user_country = $request->country;
         $data->user_mobile = $request->mobile_number;
         $data->user_message = $request->message;
         
         if($data->save()){
               return response()->json(['status'=>1]);
         }
         else{
                return response()->json(['status'=>0]);
         }
        
    }
    public function contactInquiry(Request $request) {
        
        
        
         $data = new Inquiry();
         $data->user_name   = $request->name;
         $data->user_mobile = $request->mobile_no;
         $data->user_email = $request->email;
         $data->user_country = $request->country;
         $data->user_message = $request->message;
         
         // dd($data);
         
         
         if($data->save()){
               return response()->json(['status'=>1]);
         }
         else{
                return response()->json(['status'=>0]);
         }


    }
}