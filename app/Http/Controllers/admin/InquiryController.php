<?php

namespace App\Http\Controllers\admin;

// use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\model\Inquiry;

class InquiryController extends Controller{
   
    public function index(request $request){


       $id = $request->id;
       $status = $request->status;
          if($id!='' & $status !=''){
              
              $iq = Inquiry::findOrFail($id);
              $iq->status = $status;
              $iq->save();
              
          }

        $query = Inquiry::where('status', 'Pending')->latest();

        if( !empty( $request->user_name ) ) {
            $query->where('user_name', 'LIKE', '%'.$request->user_name.'%');
        }


        $lists1 = $query->paginate(10);
        //
        

        

        $data = compact( 'lists1' ); // Variable to array convert
        return view('backend.inc.inquiry.pending', $data);
    }
    public function confirmed(request $request){


       $id = $request->id;
       $status = $request->status;
          if($id!='' & $status !=''){
              
              $iq = Inquiry::findOrFail($id);
              $iq->status = $status;
              $iq->save();
              
          }

        $query = Inquiry::where('status', 'Confirmed')->latest();

        if( !empty( $request->user_name ) ) {
            $query->where('user_name', 'LIKE', '%'.$request->user_name.'%');
        }


        $lists1 = $query->paginate(10);
        //
        

        

        $data = compact( 'lists1' ); // Variable to array convert
        return view('backend.inc.inquiry.confirmed', $data);
    }
    public function inprogress(request $request){


       $id = $request->id;
       $status = $request->status;
          if($id!='' & $status !=''){
              
              $iq = Inquiry::findOrFail($id);
              $iq->status = $status;
              $iq->save();
              
          }

        $query = Inquiry::where('status', 'In-progress')->latest();

        if( !empty( $request->user_name ) ) {
            $query->where('user_name', 'LIKE', '%'.$request->user_name.'%');
        }


        $lists1 = $query->paginate(10);
        //
        

        

        $data = compact( 'lists1' ); // Variable to array convert
        return view('backend.inc.inquiry.in-progress', $data);
    }
    public function remove(  $id ){
        $remove = Inquiry::where('id',$id)->delete();
        return redirect( url('admin-control/inquiry') )->with('success', 'Success! A record has been deleted.');   
    }

    public function removeMultiple(Request $request)
    {
        $check = $request->check; // input type="checkbox" name="check[]"
        Inquiry::whereIn("id", $check)->delete(); // DELETE FROM news WHERE news_id IN (3,5,4)

        return redirect()->back()->with('success', 'Item(s) removed.');
    }
    public function change_status(Request $request, Inquiry $id)
    {
        $id->update([ $request->field => $request->status ]);
        

        return redirect()->back()->with('success', "{$request->field} status has been changed.");
    }
}