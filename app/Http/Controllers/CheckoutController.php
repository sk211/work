<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\country;
use App\shipping;
use App\city;
use App\cart;
use App\order;
use App\billing_detail;
use App\product;
use Carbon\Carbon;
 use Auth;

class CheckoutController extends Controller
{
	    public function __construct()
    {
     

        $this->middleware('auth');
        // $this->middleware('Admin');
         $this->middleware('SellerChecker');
    }

   function checkoutValue(Request $request)
   {
    // return $request->all();
       $request->validate([
         'grandTotal'=>'required'

       ]);

   	$grandTotal =  $request->grandTotal;
   	return view('fronts.shiping', compact('grandTotal'));
   }
   function cityView(Request $request)
   {
   	$countryId = $request->country_id;
   	$allCity =  city::where('country_id', $countryId)->get();
   	$stringToSend = "<option>--City Name--</option>";
   	foreach ($allCity as $value) {
   		  // $value->name;
   		 $stringToSend .= "<option value='".$value->id."'>".$value->name."</option>";
   		  // $stringtosend  .="<option value='". $city->id ."'>". $city->name ."</option>";
   	}
   	echo  $stringToSend;

   }

  public function orderSave(Request $request)
   {

   	 $numberST = mt_rand(100, 301);
     $invoice = 'IN-'.$numberST.'001';
 		
	
 $shipping_id = shipping::insertGetId([
   			'user_id' => Auth::user()->id,
  			'address' => $request->address,
  			'country_id' => $request->country_id,
			'city_id' => $request->city_id,
			'phone' => $request->number,
			'region' => $request->region,
			'zipCode' => $request->zipCode,
			'payment' => $request->payment,
      'invoice' => $invoice
   	]);

   	 $order = order::insertGetId([
   		 'shipping_id' =>  $shipping_id,
   		 'user_id' =>  Auth::user()->id,
         'invoice' => $invoice,
         'grandTotal' =>  $request->grandTotalSave,
         'shiping' =>  $request->shipingSave,
         'payment' =>  $request->payment,
         'month' =>  $request->month,
         'year' =>  $request->year,
         'date' =>  $request->date,
         'created_at' => Carbon::now()
   	]);
      $ip_address=$_SERVER['REMOTE_ADDR'];
      $cartProduct = cart::where('customerIP', $ip_address)->get();

   foreach ($cartProduct as $cart_item) {
     billing_detail::insert([
       'sale_id'=>$shipping_id,
       'product_id'=>$cart_item->product_id,
       'product_unite_price'=>product::find($cart_item->product_id)->price,
       'product_quantity'=>$cart_item->quantity,
       'invoice'=> $invoice,
       'date'=> $request->date,
       'month'=>  $request->month,
       'promote'=> $cart_item->promote,
       'sellerName'=> product::find($cart_item->product_id)->sellerName,
       'sellerId'=> product::find($cart_item->product_id)->sellerId,

       'created_at'=>Carbon::now(),
     ]);
    product::find($cart_item->product_id)->decrement('quantity',$cart_item->quantity);
     $cart_item->delete();

   }
     
     if ($request->payment == 1) {
       return redirect()->to('/customer-dashboard');
     }elseif ($request->payment == 2) {
         return view('fronts.payment', compact('invoice'));
     }



   	// return "hoice";

   }

   function savePayment(Request $request)
   {

     $request->all();
    $trxID = $request->trxID;
    $invoice = $request->invoice;
    // return  order::where('invoice', $invoice)->first();
     order::where('invoice', $invoice)->update([
      'trxID' => $trxID
     ]);
      return redirect()->to('/customer-dashboard');
   }


   function trackingPoduct(Request $request, $id)
   {
    $trackingProduct = $request->trackingProduct;
     order::where('id', $id)->update([
      'trackingProduct' => $trackingProduct
     ]);

     return back();
   }
  public function payment(){
        return view('fronts.payment');
    }

}
