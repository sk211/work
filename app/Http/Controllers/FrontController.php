<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\subCategory;
use App\thirdCategory;
use App\banner;
use App\product;
use App\cart;
use App\coupon;
use App\User;
use App\test;
use App\order;
use App\customer_info;
use App\product_image;
use Carbon\Carbon;
use Image;
class FrontController extends Controller
{
    public function index() {

        $promoteCategory = category::where('status', 1)->get();
        $promoteSubCategory = subCategory::where('status', 1)->get();
        $allcategory =category::all();
        $allbanner = banner::all();
        $promotedProduct = product::where('status', 1)->get();
        return view('fronts.index', compact('allcategory', 'allbanner', 'promotedProduct', 'promoteCategory', 'promoteSubCategory'));
    }


    public function about(){
        return view('fronts.about');
    }

    public function shop(){
        $allProduct = product::where('status', 1)->get();
        return view('fronts.shop', compact('allProduct'));
    }

    public function subCategory($id)
    {
          $allProduct = product::where('subCategory_id', $id)->where('status', 1)->get();
       return view('fronts.shop', compact('allProduct'));
    }
    public function subCategoryLast($id)
    {
         $allProduct = product::where('thirdCategory_id', $id)->where('status', 1)->get();
       return view('fronts.shop', compact('allProduct'));
    }

    public function prductView($slug){
         $singleProduct = product::where('slug', $slug)->first();
         $product_id =  $singleProduct->id;
         $producGallery = product_image::where('product_id', $product_id )->pluck('gallery');

      foreach ($producGallery as $key) {
        
         $images = explode('|', $key);
      }




        return view('fronts.single', compact('singleProduct', 'images'));
    }

    
    public function admin(){
        return view('fronts.admin');
    }
    function ami(Request $request)
    {
        return $request->all();
    }

    function cartUpdate(Request $request)
    {
     
      $product_id = $request->product_id; 
      $cart_id = $request->cart_id; 
      $ip_address=$_SERVER['REMOTE_ADDR'];

foreach ($product_id as $key_of_product_id => $value_of_product_id) {
  if ( product::find($value_of_product_id)->quantity >=  $request->quantity[$key_of_product_id]) {
    cart::where('customerIP',$ip_address)->where('product_id',$value_of_product_id)->update([

      'quantity'=> $request->quantity[$key_of_product_id]
    ]);

  }

}
  return back();

}


function categoryViewProduct($id)
{
  // $category_view =  thirdCategory::where('id', $id)->first();
  $allProduct =  product::where('thirdCategory_id', $id)->where('status', 1)->get();

        return view('fronts.shop', compact('allProduct'));

  // return $category_view->products;
}

    
    public function cart($coupon_name = ""){

  if ($coupon_name == "") {
        $ip_address=$_SERVER['REMOTE_ADDR'];
        $cartProduct = cart::where('customerIP', $ip_address)->get();
      // foreach($cartProduct as $value){
      //   return $value;
      // }
        $coupon_discount_amount=0;
        return view('fronts.checkout', compact('cartProduct', 'coupon_discount_amount'));
        }else {
          $couponExist = coupon::where('coupon_name',$coupon_name)->exists();
          if ($couponExist) {
            if (Carbon::now()->format('Y-m-d')<= coupon::where('coupon_name',$coupon_name)->first()->valid_date) {
                $ip_address=$_SERVER['REMOTE_ADDR'];
                $cartProduct = cart::where('customerIP', $ip_address)->get();
                $coupon_discount_amount=coupon::where('coupon_name',$coupon_name)->first()->coupon_discount;
 return view('fronts.checkout', compact('cartProduct', 'coupon_discount_amount'));
            }else {
              return "Sorry This Coupon Not Available At This Moment !";
            }
          }else {
              return "Invalid Coupon Go Back !";
            }
        }

    }


  public  function cartSave(Request $request)
    {
        // return  $request->promote;
// return "I am from Controller";

            $ip_address=$_SERVER['REMOTE_ADDR'];
         
            $productId = $request->product_id;
            $promote = $request->promote;
            
        if (cart::where('customerIP',$ip_address)->where('product_id',$productId)->exists()) {
          cart::where('customerIP',$ip_address)->where('product_id',$productId)->increment('quantity', 1);
          return back();
        }
        else {
          cart::insert([

              'customerIP'=>$ip_address,
              'product_id'=>$productId,
              'promote'=>$promote,
              'created_at'=>Carbon::now()
            ]);
            return back();
        }
    }

    function cartDelete($id)
    {
       $ip_address=$_SERVER['REMOTE_ADDR'];
       cart::where('customerIP',$ip_address)->where('product_id',$id)->delete();
    }
    public function seller(){
        return view('fronts.seller');
    }
  

    public function service(){
        return view('fronts.service');
    }
    public function contact(){
        return view('fronts.contact');
    }
    public function customer_login(){
        return view('fronts.customer_register');
    }

    function customerSaveForm(Request $request)
    {
      $validator = $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'number' => 'required',
            'address' => 'required',
            'gender' => 'required'
        ]);

      $userId =  User::insertGetId([
          'name'=>$request->name,
          'email'=>$request->email,
          'password'=>bcrypt($request->password),
          'roll_id' => 3,
          'created_at'=>Carbon::now(),
        ]);

      customer_info::insertGetId([
          'user_id'=> $userId,
          'number'=>$request->number,
          'address'=>$request->address,
          'gender'=>$request->gender
        ]);


       return redirect()->route('customer-dashboard');
    }

    // public function Complaint(){
    //     return view('fronts.Complaint');
    // }
    public function trackorder(){
        return view('fronts.trackorder');
    }

    function trackValue($invoiceNumber)
    {
      $trackingOrder = order::where('invoice', $invoiceNumber)->first();
      return view('fronts.trackValue', compact('trackingOrder'));
    }

    public function shiping(){
        return view('fronts.shiping');
    }
    public function refriend(){
        return view('fronts.refriend');
    }
    public function order_format(){
        return view('fronts.order_format');
    }
    public function bikas(){
        return view('fronts.bikas');
    }
   

    function cartCount()
    {
     return "df";
    }
    function allcategorynav()
    {
      $allcategory =category::all();
     return view('fronts.allcategorynav', compact('allcategory'));
    }


  function test(){

      $collection = test::all()->pluck('image');
      $allImageSHow = test::all();

      foreach ($collection as $key) {
        
         $images = explode('|', $key);
      }
      return view('testForm', compact('images', 'allImageSHow'));
    }

 



    function testSave(Request $request)
    {
      $insert = $request->all();
      $images=array();

    if($files=$request->file('images')){
        foreach($files as $file){
            // $name=$file->getClientOriginalName();
            $name="product-".uniqid().".".$file->getClientOriginalExtension();
            Image::make($file)->resize(330, 319)->save(base_path('public/upload/ami/'.$name));
            // $file->move('image',$name);
            $images[]=$name;
        }
    }

    test::insert([
        'image'=>  implode("|",$images),
        'name' =>$insert['name'],
        //you can put other insertion here
    ]);


        return back();
    
    }



}


