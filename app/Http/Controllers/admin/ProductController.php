<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
use App\subCategory;
use App\thirdCategory;
use App\product;
use App\size;
use App\productAttr;
use App\product_image;
use Carbon\Carbon;
use Image;
class ProductController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('RoleChecker');
         $this->middleware('SellerChecker');
    }
    
    public function index()
    {
    	$allcategory = category::all();
		$allsubCategory = subCategory::all();
		$allthirdCategory = thirdCategory::all();
    	 return view ('dashbord.product.index', compact('allcategory', 'allsubCategory', 'allthirdCategory'));
    }

    public function productIndex()
    {
    	$allproduct = product::where('status', 1)->get();
    	return view('dashbord.product.productIndex', compact('allproduct'));
    }

    public function productAttr($id)
    {
    	$product = product::where('id', $id)->first();
    	$allSize = size::all();
    	$productAttr = productAttr::all();
    	return view('dashbord.product.productAttr', compact('product', 'allSize', 'productAttr'));
    }

    public function productAttrSave(Request $request)
    {
    	 $request->validate([
			   'sizeName'=>'required'
			 ]);

    	 $productAttr = new productAttr();
    	 $productAttr->product_id = $request->product_id;
    	 $productAttr->sizeName = $request->sizeName;
    	 $productAttr->save();
    	 return back()->with('status', 'Product Attr Add Successfully!');

    	 

    }

    public function sizeName(Request $request)
    {

    	 $request->validate([
			   'sizeName'=>'required'
			 ]);

    	$size = new size();
    	$size->sizeName = $request->sizeName;
    	$size->save();

    	return back()->with('status', 'Size Add Successfully!');;

    }

  

    public function productSave(Request $request)
    {
        // dd($request->all());

          function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
            }

    	     $request->validate([
			   'category_id'=>'required',
			   'subCategory_id'=>'required',
			   'thirdCategory_id'=>'required',
			   'product_name'=>'required|unique:products',
			   'details'=>'required',
			   'offer_price'=>'required',
			   'price'=>'required',
			   'quantity'=>'required',
			 ]);
 $slug = make_slug($request->product_name);



 if ($request->hasFile('image')) {
          $main_photo=$request->image;
          $imagename="product-".uniqid().".".$main_photo->getClientOriginalExtension();
          Image::make($main_photo)->resize(330, 319)->save(base_path('public/upload/product/'.$imagename));
        }

    	$lastinsertedid=product::insertGetId([
        'category_id' =>$request->category_id,
        'sub_category_id' =>$request->subCategory_id,
        'thirdCategory_id' => $request->thirdCategory_id,
        'product_name' => $request->product_name,
        'details'=>$request->details,
        'price'=>$request->price,
        'offer_price'=>$request->offer_price,
        'product_code'=>$request->product_code,
        'quantity'=>$request->quantity,
        'slug'=> $slug,
        'image'=>$imagename,
        'status'=> $request->status
        ]);

    $images=array();

    if($files=$request->file('gallery')){
        foreach($files as $file){
            // $name=$file->getClientOriginalName();
            $name="product-".uniqid().".".$file->getClientOriginalExtension();
            Image::make($file)->resize(1000, 1000)->save(base_path('public/upload/ami/'.$name));
            $images[]=$name;
        }
    }



         $productGallery = product_image::insertGetId([
        'product_id' =>$lastinsertedid,
        'gallery' =>implode("|",$images)
        ]);

		

    	return back()->with('status', 'Product  Add Successfully!');
    }


    function productEdit($id)
    {
        $singleProduct = product::where('id', $id)->first();
        $allcategory = category::all();
        $allsubCategory = subCategory::all();
        $allthirdCategory = thirdCategory::all();
        return view('dashbord.product.productEdit', compact('allcategory', 'allsubCategory', 'allthirdCategory', 'singleProduct'));
    }

    function productUpdate(Request $request, $id)
    {
         // $userId = Auth::user()->id;
         //  $seller_info = seller_info::where('user_id', $userId)->first();
           $singleProduct = product::where('id', $id)->first();

         function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
            }
            $slug = make_slug($request->product_name);
              $lastinsertedid= product::where('id', $id)->update([
                    'category_id' =>$request->category_id,
                    'sub_category_id' =>$request->subCategory_id,
                    'thirdCategory_id' => $request->thirdCategory_id,
                    'product_name' => $request->product_name,
                    'details'=>$request->details,
                    'price'=>$request->price,
                    'offer_price'=>$request->offer_price,
                    'product_code'=>$request->product_code,
                    'quantity'=>$request->quantity,
                    'slug'=> $slug,
                    'status'=> 1
                    ]);

 $image = $request->file('image');
 if(isset($image)){
 $exitsname =  $singleProduct->image;
if ($exitsname != 'default.png'){
  // $nametodelete=product::where('id', $id)->image;
unlink(base_path('public/upload/product/'.$exitsname));

}
     $main_photo=$request->image;
       $imagename="product-".uniqid().".".$main_photo->getClientOriginalExtension();
          Image::make($main_photo)->resize(330, 319)->save(base_path('public/upload/product/'.$imagename));

 }else {
    $imagename =  $singleProduct->image;
 }
       
   product::where('id', $id)->update([
   'image'=>$imagename
  ]);
      

        return redirect()->route('productIndex')->with('status', 'Product Update Successfully!');

    }

    public function productDelete($id)
    {
        $nametodelete=product::find($id)->image;
        unlink(base_path('public/upload/product/'.$nametodelete));
        product::where('id', $id)->delete();
    }

    /////approveProduct

    function approveProduct()
    {
        $approveProduct = product::where('status', 0)->get();
        return view('dashbord.product.approve.index', compact('approveProduct'));
    }

    function productapprove(Request $request)
    {
        $status = $request->status;
        $id = $request->product_id;
        product::where('id', $id)->update([
            'status' => $status
        ]);
        return back()->with('status', 'Product  Approve Successfully!');
    }
}
