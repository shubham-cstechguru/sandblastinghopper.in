<?php

namespace App\Http\Controllers\admin;

use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Service;
use App\Model\Category;

class ServiceController extends Controller{
   
    public function index(request $request){

        $query = Service::latest();

        if( !empty( $request->service_title ) ) {
            $query->where('service_title', 'LIKE', '%'.$request->service_title.'%');
        }


        $lists1 = $query->paginate(20);        

        $data = compact( 'lists1' ); // Variable to array convert
        return view('backend.inc.service.index', $data);
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
        return view('backend.inc.service.add',$data);
    }

    
    public function addData(Request $request)
    {
        //
        $rules = [
            'service_title'             => 'required',
            // 'service_slug'              => 'required',
            // 'service_short_description' => 'required',
            // 'image'                     => 'required',
            'image_hover'               => 'required'
            // 'service_description'       => 'required'

                ];
            // $file = $request->file('image','image_hover');
        

        // image1
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName('image');

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('imgs/service/' .$filename));

            
        // Hover_image
            $image2       = $request->file('image_hover');
            $filename    = $image2->getClientOriginalName("");

            $banner_resize = Image::make($image2->getRealPath());              
            $banner_resize->resize(150,60);
            $banner_resize->save(public_path('imgs/service/' .$filename));

        // Banner_image
            $image3       = $request->file('banner_image');
            $filename    = $image3->getClientOriginalName("");

            $banner_resize = Image::make($image3->getRealPath());              
            $banner_resize->resize(1000,500);
            $banner_resize->save(public_path('imgs/service/' .$filename));
            
            
            
        
        $request->validate( $rules );
        // $file = $request->file('image');
        // $destinationPath = 'public/imgs/shop/';
        // $file->move($destinationPath,$file->getClientOriginalName());

        
           

        

        $obj = new Service;
        $obj->service_title              = $request->service_title;
        $obj->service_slug  = $request->service_slug == '' ? Str::slug($request->service_title) : Str::lower($request->service_slug);
        $obj->service_short_description  = $request->service_short_description;
        $obj->service_description        = $request->service_description;
        $obj->image                      = $image->getClientOriginalName();
        $obj->image_hover                = $image2->getClientOriginalName();
        $obj->banner_image               = $image3->getClientOriginalName();
        $obj->parent                     = $request->parent;
        $obj->seo_title                  = $request->seo_title;
        $obj->keywords                   = $request->keywords;
        $obj->seo_description            = $request->seo_description;
        
        
        // $obj->image  = $request->$file->getClientOriginalName();
        
        $obj->save();

        return redirect( url('admin-control/service/') )->with('success', 'Success! New record has been added.');
    }

   
    public function edit(Request $request,$id)
    {
        //
        $edit = Service::findOrFail( $id );
        $request->replace($edit->toArray());
        $request->flash();
        $categories = Category::get();
        $parentArr = [
            ''  => 'Select Category'
        ];

        foreach($categories as $c) {
            $parentArr[ $c->id ] = $c->category;
        }
        


        $lists1 = Service::latest()->paginate(20);
        //
        

        

        $data = compact( 'lists1','edit','parentArr' );

        return view('backend.inc.service.edit',$data);
    }

    
    public function editData(Request $request, $id)
    {
        //
        $rules = [
            'service_title'             => 'required',
            // 'service_slug'              => 'required',
            'service_short_description' => 'required',
            'service_description'       => 'required'
            // 'image'                     => 'required'
            
        ];
        $request->validate( $rules );
        

        $obj = Service::findOrFail( $id );
        $obj->service_title              = $request->service_title;
        $obj->service_slug               = $request->service_slug;
        $obj->service_short_description  = $request->service_short_description;
        $obj->service_description        = $request->service_description;
        $obj->parent                     = $request->parent;
        $obj->seo_title                  = $request->seo_title;
        $obj->keywords                   = $request->keywords;
        $obj->seo_description            = $request->seo_description;
        $obj->service_slug               = $request->service_slug == '' ? Str::slug($request->service_title) : Str::lower($request->service_slug); 
        
        if($request->hasFile('image'))  
        { 
            $image        = $request->file('image');
            $filename     = $image->getClientOriginalName('image');
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('imgs/service/' .$filename));
            $obj->image   = $image->getClientOriginalName();
        }
            
        if($request->hasFile('image_hover'))  
        { 
            $image2            = $request->file('image_hover');
            $filename          = $image2->getClientOriginalName('');
            $banner_resize     = Image::make($image2->getRealPath());              
            $banner_resize->resize(300,300);
            $banner_resize->save(public_path('imgs/service/' .$filename));
            $obj->banner_image = $image2->getClientOriginalName();
        }
        
        if($request->hasFile('banner_image'))  { 
            $image3             = $request->file('banner_image');
            $filename           = $image3->getClientOriginalName('');
            $banner_resize      = Image::make($image3->getRealPath());              
            $banner_resize->resize(1000,500);
            $banner_resize->save(public_path('imgs/service/' .$filename));
            $obj->banner_image  = $image3->getClientOriginalName();
        }
        
        // $obj->image  = $request->$file->getClientOriginalName();
        $obj->save();

        return redirect( url('admin-control/service') )->with('success', 'Success! A record has been updated.');
    }
     public function remove(  $id ){
        $remove = Service::where('id',$id)->delete();
        return redirect( url('admin-control/service') )->with('success', 'Success! A record has been deleted.');   
    }

    public function removeMultiple(Request $request)
    {
        $check = $request->check; // input type="checkbox" name="check[]"
        Service::whereIn("id", $check)->delete(); // DELETE FROM news WHERE news_id IN (3,5,4)

        return redirect()->back()->with('success', 'Item(s) removed.');
    }

   
}
