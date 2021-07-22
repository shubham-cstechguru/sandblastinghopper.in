<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\model\Inquiry;
use App\model\Setting;
use App\model\Technology;

class AjaxController extends BaseController
{

      public function index(Request $request)
      {



            $data = new Inquiry();
            $data->user_name = $request->name;
            $data->user_email = $request->email;
            $data->user_country = $request->country;
            $data->user_mobile = $request->mobile_number;
            $data->user_message = $request->message;

            if ($data->save()) {
                  return response()->json(['status' => 1]);
            } else {
                  return response()->json(['status' => 0]);
            }
      }
      public function contactInquiry(Request $request)
      {


            $setting = Setting::first();

            $data = new Inquiry();
            $data->user_name   = $request->name;
            $data->user_mobile = $request->mobile_no;
            $data->user_email = $request->email;
            $data->user_country = $request->country;
            $data->user_message = $request->message;

            // dd($data);
            $s = $request->country;

            $s1 = "Thank You For Sending Email Regarding {$request->country}";


            if ($data->save()) {
                  Mail::send('frontend.pages.mail', ['req' => $data, 's' => $setting, 'user' => 'true'], function ($message) use ($request, $s1, $setting) {
                        $message->to($request->email);
                        $message->subject($s1);
                        $message->from($setting->email, $setting->title);
                  });

                  Mail::send('frontend.pages.mail', ['req' => $data, 's' => $setting], function ($message) use ($request, $s, $setting) {
                        $message->to($setting->email);
                        $message->subject($s);
                        $message->from($setting->email, $setting->title);
                  });
                  return response()->json(['status' => 1]);
            } else {
                  return response()->json(['status' => 0]);
            }
      }

      public function search(Request $request)
      {
            if (!empty(request('search'))) {
                  if ($request->search != '') {
                        $products = Technology::where('title', 'LIKE', '%' . $request->search . '%')->paginate(5);
                        $li = '';
                        foreach ($products as $product) {
                              $li .= '<li class="list-group-item"><a href="' . route('productindex', $product->slug) . '">' . $product->title . '</a></li>';
                        }
                  } else {
                        $li = '<li>No Suggestion</li>';
                  }
            } else {
                  $li = '<li>No Suggestion</li>';
            }

            return response()->json($li, 200);
      }
}
