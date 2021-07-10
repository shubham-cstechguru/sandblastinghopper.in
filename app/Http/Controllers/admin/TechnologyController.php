<?php

namespace App\Http\Controllers\admin;

use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\model\Technology;

use App\model\Category;
use App\model\City;
use App\model\Country;

class TechnologyController extends Controller{
   
    public function index(request $request){

        $query = Technology::latest();

        if( !empty( $request->title ) ) {
            $query->where('title', 'LIKE', '%'.$request->title.'%');
        }


        $lists1 = $query->paginate(10);     
        
        $cities = City::get();
        $countries = Country::get();

        $data = compact( 'lists1', 'cities', 'countries' ); // Variable to array convert
        return view('backend.inc.technology.index', $data);
    }
    

    

   
    public function add()
    {
        //

        $categories = Category::get();
        $parentArr = [
            ''  => 'Select Category'
        ];

        foreach($categories as $c) {
            $parentArr[ $c->id ] = $c->category;
        }
        $data = compact('parentArr');
        return view('backend.inc.technology.add',$data);
    }

    
    public function addData(Request $request)
    {
        //
        $rules = [
            'title'             => 'required'
            // 'image'             => 'required'
            
                ];
               
           
        $request->validate( $rules );
        $obj = new Technology;
        $obj->title             = $request->title;
        $obj->slug              = $request->slug == '' ? Str::slug($request->title) : Str::lower($request->slug);
        $obj->excerpt           = $request->excerpt;
        $obj->table             = $request->table;
        $obj->description       = $request->description;
        $obj->parent            = $request->parent;
        $obj->seo_title         = $request->seo_title;
        $obj->keywords          = $request->keywords;
        $obj->seo_description   = $request->seo_description;
        
        if($request->hasFile('image'))  {
            $image       = $request->file('image');
            $filename    = time().'.'.$image->extension();
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(251, 251);
            $image_resize->save(public_path('imgs/product/' .$filename));
          
            $banner_resize = Image::make($image->getRealPath());
            $banner_resize->resize(251,251);
            $banner_resize->save(public_path('imgs/product/original' .$filename));
            $obj->image    = $filename;
        }
        else{
            $obj->image = '';
        }
            
            
           
        
        
        // $obj->image  = $request->$file->getClientOriginalName();
        
        $obj->save();

        return redirect( url('admin-control/product/') )->with('success', 'Success! New record has been added.');
    }

   
    public function edit(Request $request,$id)
    {
        //
        $edit = Technology::findOrFail( $id );
        $request->replace($edit->toArray());
        $request->flash();
        $categories = Category::get();
        $parentArr = [
            ''  => 'Select Category'
        ];

        foreach($categories as $c) {
            $parentArr[ $c->id ] = $c->category;
        }
        


        $lists1 = Technology::latest()->paginate(20);
        //
        

        

        $data = compact( 'lists1','edit','parentArr' );

        return view('backend.inc.technology.edit',$data);
    }

    
    public function editData(Request $request, $id)
    {
        //
        $rules = [
            'title'          => 'required'
            
        ];
        $request->validate( $rules );
        

        $obj = Technology::findOrFail( $id );
        $obj->title           = $request->title;
        $obj->slug            = $request->slug;
        $obj->slug            = $request->slug == '' ? Str::slug($request->title) : Str::lower($request->slug); 
        $obj->excerpt         = $request->excerpt;
        $obj->table           = $request->table;
        $obj->description     = $request->description;
        $obj->parent          = $request->parent;
        $obj->seo_title       = $request->seo_title;
        $obj->keywords        = $request->keywords;
        $obj->seo_description = $request->seo_description;
        
        if($request->hasFile('image'))  { 
            
            $image       = $request->file('image');
            $filename    = time().'.'.$image->extension();
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(251, 251);
            $image_resize->save(public_path('imgs/product/' .$filename));
            $obj->image   = $filename;
            $banner_resize = Image::make($image->getRealPath());
            $banner_resize->resize(251,251);
            $banner_resize->save(public_path('imgs/product/original/' .$filename));
        }
        
        $obj->save();

        return redirect( url('admin-control/product') )->with('success', 'Success! A record has been updated.');
    }
     public function remove(  $id ){
        $remove = Technology::where('id',$id)->delete();
        return redirect( url('admin-control/product') )->with('success', 'Success! A record has been deleted.');   
    }

    public function removeMultiple(Request $request)
    {
        $check = $request->check; // input type="checkbox" name="check[]"
        Technology::whereIn("id", $check)->delete(); // DELETE FROM news WHERE news_id IN (3,5,4)

        return redirect()->back()->with('success', 'Item(s) removed.');
    }

   
}
