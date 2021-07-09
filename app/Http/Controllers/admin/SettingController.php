<?php

namespace App\Http\Controllers\admin;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Setting;




class SettingController extends Controller {
    public function index(request $request) {

        $lists = Setting::latest()->paginate();
        

        $data = compact( 'lists' ); // Variable to array convert
        return view('backend.inc.setting.index', $data);
    }


   
    public function edit( Request $request, $id ) {

        $edit = Setting::findOrFail( $id );
        $request->replace($edit->toArray());
        $request->flash();

        return view('backend.inc.setting.edit', compact('edit'));

    }
    public function editData( Request $request, $id ) {
        $rules = [
            'sitename'        => 'required',
            
        ];
        $request->validate( $rules );
        

        $obj = Setting::findOrFail( $id );
        $obj->sitename  = $request->sitename; 
        $obj->tag_line  = $request->tag_line;
        $obj->mobile_no = $request->mobile_no;
        $obj->whatsapp  = $request->whatsapp;
        $obj->email     = $request->email;
        $obj->address   = $request->address;
        $obj->facebook  = $request->facebook;
        $obj->instagram = $request->instagram;
        $obj->youtube   = $request->youtube;

        if($request->hasFile('logo'))  { 
            
            $image        = $request->file('logo');
            $filename     = $image->getClientOriginalName('logo');
            $image_resize = Image::make($image->getRealPath());
            $image_resize->save(public_path('imgs/' .$filename));
            $obj->logo   = $image->getClientOriginalName();
            
        }
        if($request->hasFile('fav_icon'))  { 
            
            $image        = $request->file('fav_icon');
            $filename     = $image->getClientOriginalName('fav_icon');
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(20,20);
            $image_resize->save(public_path('imgs/' .$filename));
            $obj->fav_icon   = $image->getClientOriginalName();
            
        }

        $obj->save();

        return redirect()->back()->with('success', 'Success! A record has been updated.');
    }
    

// SELECT * FROM `news` WHERE `news_id` = 1 or `news_id` = 2
    // News::where('news_id', 1)->orWhere('news_id', 2)->get();
}


   
    
    
   
   

