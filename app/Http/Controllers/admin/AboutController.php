<?php

namespace App\Http\Controllers\admin;

use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\model\About;

use App\Model\Category;

class AboutController extends Controller{
   
    public function index(request $request){

        $query = About::latest();

        if( !empty( $request->title ) ) {
            $query->where('title', 'LIKE', '%'.$request->title.'%');
        }
        
        $lists1 = $query->paginate(20);        

        $data = compact( 'lists1' ); // Variable to array convert
        return view('backend.inc.about.index', $data);
    }
    public function add()
    {
        
        return view('backend.inc.about.add');
    }

    
    public function addData(Request $request)
    {
        $rules = [
            'title'             => 'required',            
                ];
           
        $request->validate( $rules );
        $obj = new About;
        $obj->title             = $request->title;
        $obj->slug              = $request->slug == '' ? Str::slug($request->title) : Str::lower($request->slug);
        $obj->description       = $request->description;
        $obj->seo_title         = $request->seo_title;
        $obj->keywords          = $request->keywords;
        $obj->seo_description   = $request->seo_description;
        
        
        if($request->hasFile('image'))  { 
            
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName('image');
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(1080, 405);
            $image_resize->save(public_path('imgs/abouts/' .$filename));
            $obj->image   = $image->getClientOriginalName();
            
        }
        
        $obj->save();

        return redirect( url('admin-control/About/') )->with('success', 'Success! New record has been added.');
    }

   
    public function edit(Request $request,$id)
    {
        //
        $edit = About::findOrFail( $id );
        $request->replace($edit->toArray());
        $request->flash();
        $lists1 = About::latest()->paginate(20);
        $data = compact( 'lists1','edit');

        return view('backend.inc.about.edit',$data);
    }

    
    public function editData(Request $request, $id)
    {
        $rules = [
            'title'          => 'required'
        ];
        $request->validate( $rules );
        
        $obj = About::findOrFail( $id );
        $obj->title           = $request->title;
        $obj->slug            = $request->slug;
        $obj->slug            = $request->slug == '' ? Str::slug($request->title) : Str::lower($request->slug);
        $obj->description     = $request->description;
        $obj->seo_title       = $request->seo_title;
        $obj->keywords        = $request->keywords;
        $obj->seo_description = $request->seo_description;
        
        if($request->hasFile('image'))  { 
            
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName('image');
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(1080, 405);
            $image_resize->save(public_path('imgs/abouts/' .$filename));
            $obj->image   = $image->getClientOriginalName();
            
        }
        
        $obj->save();

        return redirect( url('admin-control/about/edit/1') )->with('success', 'Success! A record has been updated.');
    }
     public function remove(  $id ){
        $remove = About::where('id',$id)->delete();
        return redirect( url('admin-control/about') )->with('success', 'Success! A record has been deleted.');   
    }

    public function removeMultiple(Request $request)
    {
        $check = $request->check; // input type="checkbox" name="check[]"
        About::whereIn("id", $check)->delete(); // DELETE FROM news WHERE news_id IN (3,5,4)

        return redirect()->back()->with('success', 'Item(s) removed.');
    }

   
}
