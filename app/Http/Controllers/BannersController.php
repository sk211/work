<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Banner;
use Carbon\Carbon;
use Image;


class BannersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('RoleChecker');
        $this->middleware('SellerChecker');
    }

public function addBanner()
{
    $allbanner = banner::all();
    return view('dashbord.pages.slider', compact('allbanner'));
}


    public function bannerSave(Request $request){
         $request->validate([
   'image'=>'required',

 ]);
         if ($request->hasFile('image')) {
          $main_photo=$request->image;
          $imagename="banner-".uniqid().".".$main_photo->getClientOriginalExtension();
          
            // $ami =  app_path('store.gochange-tech.com/uploads/products_images/'.$imagename);
            //      dd($ami);
       
          Image::make($main_photo)->resize(1010, 265)->save(base_path('public/upload/banner/'.$imagename));

        }


        $lastinsertedid=Banner::insertGetId([
        'image' => $imagename,
        'title' => $request->title,
        'link' => $request->link,
        'status' => 1,
        'created_at'=>Carbon::now()
        ]);

        return back()->with('status', 'Banner Upload Successfully');
    }

    public function bannerDelete($id)
    { 
   
        $nametodelete=banner::find($id)->image;
        unlink(base_path('public/upload/banner/'.$nametodelete));
        banner::where('id', $id)->delete();
    }

}
