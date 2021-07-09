<?php

namespace App\Http\Controllers\admin;

use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\model\Blog;

use App\Model\Category;

class BlogController extends Controller{
   
    public function index(request $request){

        $query = Blog::latest();

        if( !empty( $request->title ) ) {
            $query->where('title', 'LIKE', '%'.$request->title.'%');
        }


        $lists1 = $query->paginate(20);        

        $data = compact( 'lists1' ); // Variable to array convert
        return view('backend.inc.blog.index', $data);
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
        return view('backend.inc.blog.add',$data);
    }

    
    public function addData(Request $request)
    {
        //
        $rules = [
            'title'             => 'required',            
                ];
           
        $request->validate( $rules );
        $obj = new Blog;
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
            $filename    = $image->getClientOriginalName('image');
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('imgs/blogs/' .$filename));
            $obj->image   = $image->getClientOriginalName();
            $banner_resize = Image::make($image->getRealPath());
            $banner_resize->resize(1000,500);
            $banner_resize->save(public_path('imgs/blogs/original/' .$filename));
        }
        
        $obj->save();

        return redirect( url('admin-control/blog/') )->with('success', 'Success! New record has been added.');
    }

   
    public function edit(Request $request,$id)
    {
        //
        $edit = Blog::findOrFail( $id );
        $request->replace($edit->toArray());
        $request->flash();
        $categories = Category::get();
        $parentArr = [
            ''  => 'Select Category'
        ];

        foreach($categories as $c) {
            $parentArr[ $c->id ] = $c->category;
        }
        


        $lists1 = Blog::latest()->paginate(20);
        //
        

        

        $data = compact( 'lists1','edit','parentArr' );

        return view('backend.inc.blog.edit',$data);
    }

    
    public function editData(Request $request, $id)
    {
        //
        $rules = [
            'title'          => 'required',
            
            
        ];
        $request->validate( $rules );
        

        $obj = Blog::findOrFail( $id );
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
            $filename    = $image->getClientOriginalName('image');
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('imgs/blogs/' .$filename));
            $obj->image   = $image->getClientOriginalName();
            $banner_resize = Image::make($image->getRealPath());
            $banner_resize->resize(1000,500);
            $banner_resize->save(public_path('imgs/blogs/original/' .$filename));
        }
        
        $obj->save();

        return redirect( url('admin-control/blog') )->with('success', 'Success! A record has been updated.');
    }
     public function remove(  $id ){
        $remove = Blog::where('id',$id)->delete();
        return redirect( url('admin-control/blog') )->with('success', 'Success! A record has been deleted.');   
    }

    public function removeMultiple(Request $request)
    {
        $check = $request->check; // input type="checkbox" name="check[]"
        Blog::whereIn("id", $check)->delete(); // DELETE FROM news WHERE news_id IN (3,5,4)

        return redirect()->back()->with('success', 'Item(s) removed.');
    }

   
}
