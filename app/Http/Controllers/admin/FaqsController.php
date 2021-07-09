<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Category;
use App\model\Faq;
class FaqsController extends Controller{
   
    public function index(request $request){
        //
        $query = Faq::latest();

        if( !empty( $request->question ) ) {
            $query->where('question', 'LIKE', '%'.$request->question.'%');
        }
        $lists1 = $query->paginate(20);

        $data = compact( 'lists1' ); // Variable to array convert
        return view('backend.inc.faqs.index', $data);
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
        return view('backend.inc.faqs.add', $data);
    }

    
    public function addData(Request $request)
    {
        //
        $rules = [
            'question'        => 'required',
            'answer'        => 'required'
            
            
        ];
        $request->validate( $rules );
       
        $obj = new Faq;
        $obj->question        = $request->question;
        $obj->answer          = $request->answer;
        $obj->parent          = $request->parent;
        $obj->seo_title       = $request->seo_title;
        $obj->keywords        = $request->keywords;
        $obj->seo_description = $request->seo_description;
        
        // $obj->image  = $request->$file->getClientOriginalName();
        
        $obj->save();

        return redirect( url('admin-control/faqs/') )->with('success', 'Success! New record has been added.');
    }

   
    public function edit(Request $request,$id)
    {
        //
        $edit = Faq::findOrFail( $id )->toArray();
        $request->replace($edit);
        $request->flash();

         $categories = Category::get();
        $parentArr = [
            ''  => 'Select Category'
        ];

        foreach($categories as $c) {
            $parentArr[ $c->id ] = $c->category;
        }
        $data = compact('parentArr');

        return view('backend.inc.faqs.edit',$data);
    }

    
    public function editData(Request $request, $id)
    {
        //
        $rules = [
            'question'        => 'required',
            'answer'        => 'required'
            
        ];
        $request->validate( $rules );
        $obj = Faq::findOrFail( $id );
        $obj->question        = $request->question;
        $obj->answer          = $request->answer;
        $obj->seo_title       = $request->seo_title;
        $obj->keywords        = $request->keywords;
        $obj->seo_description = $request->seo_description;
        
        // $obj->image  = $request->$file->getClientOriginalName();
        $obj->save();

        return redirect( url('admin-control/faqs') )->with('success', 'Success! A record has been updated.');
    }
     public function remove(  $id ){
        $remove = Faq::where('id',$id)->delete();
        return redirect( url('admin-control/faqs') )->with('success', 'Success! A record has been deleted.');   
    }

    public function removeMultiple(Request $request)
    {
        $check = $request->check; // input type="checkbox" name="check[]"
        Faq::whereIn("id", $check)->delete(); // DELETE FROM news WHERE news_id IN (3,5,4)

        return redirect()->back()->with('success', 'Item(s) removed.');
    }

   
}
