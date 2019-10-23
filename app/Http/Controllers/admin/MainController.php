<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\coupon;
use App\User;
use App\order;
use App\customer_info;
use App\buyInfo;
use App\billing_detail;
use Carbon\Carbon;
class MainController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('RoleChecker');
        $this->middleware('SellerChecker');
        $this->middleware('Editor');
        
    }
  public function coupon()
    {
    	$allCoupon = coupon::all();
    	 return view ('dashbord.pages.coupon', compact('allCoupon'));
    }

    function couponSave(Request $request)
    {


    	$request->validate([

         'coupon_name'=>'unique:coupons,coupon_name',
         'coupon_discount'=>'numeric|max:99',
         'valid_date'=>'required',

       ],
       [
         'valid_date.required'=>'The valid till must be a date',

       ]
     );


    	$coupon = new coupon();
    	$coupon->coupon_name = $request->coupon_name;
    	$coupon->coupon_discount = $request->coupon_discount;
    	$coupon->valid_date = $request->valid_date;
    	$coupon->save();
    	return back();
    }


    //////customer login systems

    // function customerSave(Request $request)
    // {
    //   $validator = $this->validate($request,[
    //         'name' => 'required',
    //         'email' => 'required|unique:users',
    //         'password' => 'required',
    //         'number' => 'required',
    //         'address' => 'required',
    //         'gender' => 'required'
    //     ]);

    //   $userId =  User::insertGetId([
    //       'name'=>$request->name,
    //       'email'=>$request->email,
    //       'password'=>bcrypt($request->password),
    //       'roll_id' => 3,
    //       'created_at'=>Carbon::now(),
    //     ]);

    //   customer_info::insertGetId([
    //       'user_id'=> $userId,
    //       'number'=>$request->number,
    //       'address'=>$request->address,
    //       'gender'=>$request->gender
    //     ]);


    //     return back();
    // }

    function buyInfo(Request $request)
    {
      return $request->all();
      // $ip_address=$_SERVER['REMOTE_ADDR'];
      // buyInfo::nsertGetId([
      //     'customerIp'=> $ip_address,
      //     'grandTotal'=>$request->number,
      //     'discount'=>$request->address
      //   ]);
      
      
      
    }


    function order()
    {
      $allorder = order::latest()->get();
      return view('dashbord.order', compact('allorder'));
    }

    function orderDown(Request $request)
    {
       $status = $request->status;
        $order_id = $request->order_id;

        $getOrder =  order::where('id', $order_id)->get();

          foreach ($getOrder as $getOr) {
           $invoice =  $getOr->invoice;
            billing_detail::where('invoice', $invoice)->update([
              'status' =>0
            ]);
          }

        order::where('id', $order_id)->update([
          'status'=> $status
        ]);


return back()->with('status', 'Order Not Comform Yet !');
    }  
    function orderUp(Request $request)
    {
       $status = $request->status;
        $order_id = $request->order_id;
        $getOrder =  order::where('id', $order_id)->get();

          foreach ($getOrder as $getOr) {
           $invoice =  $getOr->invoice;
            // return billing_detail::where('invoice', $invoice)->get();
     billing_detail::where('invoice', $invoice)->get(); 

             billing_detail::where('invoice', $invoice)->update([
              'status' => 1
            ]);

          }
        order::where('id', $order_id)->update([
          'status'=> $status
        ]);
        // affiliate::

        return back()->with('status', 'Order Comform !');
    }

}
