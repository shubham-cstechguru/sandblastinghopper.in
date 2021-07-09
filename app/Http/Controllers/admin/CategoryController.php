<?php

namespace App\Http\Controllers\admin;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Category;
class CategoryController extends Controller{
   
    public function index(request $request){
        //
        $query = Category::withCount('')->latest();

        if( !empty( $request->category ) ) {
            $query->where('category', 'LIKE', '%'.$request->category.'%');
        }
        $lists1 = $query->paginate(20);

        $data = compact( 'lists1' ); // Variable to array convert
        return view('backend.inc.category.index', $data);
    }   
    public function add()
    {
        $m_category = Category::where('parent', null)->get();
        $parentArr = [null => 'ROOT'];
            if (!$m_category->isEmpty()) {
            foreach ($m_category as $mcat) {
            $parentArr[$mcat->id] = $mcat->category;
            }
        }
        $data = compact('parentArr');
        return view('backend.inc.category.add', $data);
    }

    
    public function addData(Request $request)
    {
        //
        $rules = [
            'category'        => 'required'           
        ];
        $request->validate( $rules );
        $obj = new Category;
        $obj->category          = $request->category;       
        $obj->slug_category     = $request->slug_category == '' ? Str::slug($request->category) : Str::lower($request->slug_category); 
        $obj->parent            = $request->parent;   
        $obj->seo_title         = $request->seo_title;
        $obj->keywords          = $request->keywords;
        $obj->seo_description   = $request->seo_description;
        
        if($request->hasFile('image'))  { 
            
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName('image');
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(400, 400);
            $image_resize->save(public_path('imgs/category/' .$filename));
            $obj->image   = $image->getClientOriginalName();
            $banner_resize = Image::make($image->getRealPath());
            $banner_resize->resize(1000,500);
            $banner_resize->save(public_path('imgs/category/original/' .$filename));
        }
        
        $obj->save();
        
        return redirect( url('admin-control/category/') )->with('success', 'Success! New record has been added.');
    }

   
    public function edit(Request $request,$id)
    {
        //
        $edit = Category::findOrFail( $id );
        $request->replace($edit->toArray());
        $request->flash();

        $categories = Category::get();
        $parentArr = [
            ''  => 'Select Category'
        ];

        foreach($categories as $c) {
            $parentArr[ $c->id ] = $c->category;
        }
        $data = compact('parentArr','edit');
        return view('backend.inc.category.edit', $data);
    }

    
    public function editData(Request $request, $id)
    {
        //
        $rules = [
            'category'        => 'required'
            
        ];
        
        $request->validate( $rules );
        $obj = Category::findOrFail( $id );
        $obj->category          = $request->category;       
        $obj->slug_category     = $request->slug_category == '' ? Str::slug($request->category) : Str::lower($request->slug_category); 
        $obj->parent            = $request->parent; 
        $obj->seo_title         = $request->seo_title;
        $obj->keywords          = $request->keywords;
        $obj->seo_description   = $request->seo_description;
       
        
        if($request->hasFile('image'))  { 
            
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName('image');
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(400, 400);
            $image_resize->save(public_path('imgs/category/' .$filename));
            $obj->image   = $image->getClientOriginalName();
            $banner_resize = Image::make($image->getRealPath());
            $banner_resize->resize(1000,500);
            $banner_resize->save(public_path('imgs/category/original/' .$filename));
        }
        
        $obj->save();

        return redirect( url('admin-control/category') )->with('success', 'Success! A record has been updated.');
    }
     public function remove(  $id ){
        $remove = Category::where('id',$id)->delete();
        return redirect( url('admin-control/category') )->with('success', 'Success! A record has been deleted.');   
    }

    public function removeMultiple(Request $request)
    {
        $check = $request->check; // input type="checkbox" name="check[]"
        Category::whereIn("id", $check)->delete(); // DELETE FROM news WHERE news_id IN (3,5,4)

        return redirect()->back()->with('success', 'Item(s) removed.');
    }

   
}
