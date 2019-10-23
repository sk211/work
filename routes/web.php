<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use App\customer_info;
use App\order;
use App\Categores;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontController@index');

Route::get('/about', 'FrontController@about');
Route::get('/prductView/{slug}', 'FrontController@prductView');
Route::get('/shop', 'FrontController@shop');
Route::get('/sub-category/{id}', 'FrontController@subCategory');
Route::get('/sub-category-last/{id}', 'FrontController@subCategoryLast');
// Route::get('/admin', 'FrontController@admin');
// Route::get('/seller', 'FrontController@seller');
Route::get('/service', 'FrontController@service');
Route::get('/cart', 'FrontController@cart');
Route::get('/cart/{coupon_name}', 'FrontController@cart');
// Route::get('/seller', 'FrontController@seller');

Route::get('/contract', 'FrontController@contact');
Route::post('/cartSave', 'FrontController@cartSave');
Route::post('/cartUpdate', 'FrontController@cartUpdate');
Route::get('/cartDelete/{id}', 'FrontController@cartDelete');
Route::get('/refriend', 'FrontController@refriend');
Route::get('/category-view-product/{id}', 'FrontController@categoryViewProduct');

// Route::post('/ami', 'FrontController@ami');
Route::get('/invoice/{invoice}', 'AddController@invoice');

//CheckoutController
Route::get('/payment', 'CheckoutController@payment')->name('customer-payment');
Route::post('/savePayment', 'CheckoutController@savePayment');

Route::POST('/checkoutValue', 'CheckoutController@checkoutValue');
Route::POST('/cityView', 'CheckoutController@cityView');
Route::POST('/orderSave', 'CheckoutController@orderSave');
Route::POST('/trackingPoduct/{id}', 'CheckoutController@trackingPoduct');

Route::get('/cartCount', 'FrontController@cartCount');
Route::get('/search', 'SearchController@search');
Route::post('/autosearch', 'SearchController@autosearch');

Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $orders = customer_info::where('number','LIKE','%'.$q.'%')->orWhere('address','LIKE','%'.$q.'%')->get();
    if(count($orders) > 0)
        return view('fronts.trackorder')->withDetails($orders)->withQuery ( $q );
    else return view ('fronts.trackorder')->withMessage('No Details found. Try to search again !');
});


// roust for Front pages

Route::get('/customer_login', 'FrontController@customer_login');


///below customer register save
Route::resource('/ucomplaint', 'ComplaintController');
// Route::post('/ucomplaint', 'ComplaintController@store');
Route::get('/trackorder', 'FrontController@trackorder');
Route::get('/tracking-product-value/{invoiceNumber}', 'FrontController@trackValue');

Route::get('/order_format', 'FrontController@order_format');
Route::get('/shiping', 'FrontController@shiping')->middleware('auth');




// Auth::routes();
Auth::routes(['register' => false]);




// Route::group(['middleware'=>['auth', 'Admin']], function(){

Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth');
Route::post('/catDown', 'HomeController@catDown');
Route::post('/catUp', 'HomeController@catUp');
Route::post('/promoteImage', 'HomeController@promoteImage');
Route::get('/addPromo/{id}', 'HomeController@addPromo');
// add categories route


Route::middleware(['auth', 'Admin'])->prefix('admin')->group(function () {
 Route::get('/dashboard', 'HomeController@index')->name('dashboard');
});








// Route::get('/allcates', 'AllCategory@index');
Route::get('/edit-category', 'AllCategory@edit');
Route::get('/profile', 'UserController@index');
Route::get('/addCates', 'UserController@addcate');
  ///category
Route::get('/allcates', 'admin\CategoryController@categoryIndex');
Route::post('/categorySave', 'admin\CategoryController@categorySave');
Route::get('/categoryEdit/{id}', 'admin\CategoryController@categoryEdit');
Route::PUT('/categoryUpdate/{id}', 'admin\CategoryController@categoryUpdate');
Route::get('/categoryDelete/{id}', 'admin\CategoryController@categoryDelete');
Route::get('/subCategory/{id}', 'admin\CategoryController@subCategory');
Route::post('/subCategorySave', 'admin\CategoryController@subCategorySave');
Route::get('/subCategoryEdit/{id}', 'admin\CategoryController@subCategoryEdit');
Route::PUT('/subCategoryUpdate/{id}', 'admin\CategoryController@subCategoryUpdate');
Route::get('/subCategoryDelete/{id}', 'admin\CategoryController@subCategoryDelete');
Route::get('/thirdCategory/{id}', 'admin\CategoryController@thirdCategory');
Route::post('/thirdCategorySave', 'admin\CategoryController@thirdCategorySave');
Route::get('/thirdCategoryEdit/{id}', 'admin\CategoryController@thirdCategoryEdit');
Route::PUT('/thirdCategoryUpdate/{id}', 'admin\CategoryController@thirdCategoryUpdate');
Route::get('/thirdCategoryDelete/{id}', 'admin\CategoryController@thirdCategoryDelete');
////
Route::POST('/categoryTosub', 'admin\CategoryController@categoryTosub');
Route::POST('/subCategoryTothird', 'admin\CategoryController@subCategoryTothird');


////all product 



//logo
// Route::resource('/logo', 'LogoController');

///coupon

Route::get('/coupon', 'admin\MainController@coupon');
Route::post('/couponSave', 'admin\MainController@couponSave');

///customer Register savew
// Route::post('/customerSave', 'admin\MainController@customerSave');
Route::post('/buyInfo', 'admin\MainController@buyInfo');


////seller Information all route

Route::get('/all-seller', 'SellerController@sellerIndex');
Route::get('/seller-info/{userName}', 'SellerController@sellerInfo');
Route::post('/paymentSave', 'SellerController@paymentSave');

// Admin Banner Routes

// Route::match(['get','post'], '/add-banner', 'BannersController@addBanner');
Route::get('/add-banner', 'BannersController@addBanner');
Route::post('/bannerSave', 'BannersController@bannerSave');
Route::get('/bannerDelete/{id}', 'BannersController@bannerDelete');
Route::post ('/comments', 'CommentContoller@index');
Route::resource('/logo', 'LogoController');

/////order

Route::get('/order', 'admin\MainController@order');
Route::post('/orderDown', 'admin\MainController@orderDown');
Route::post('/orderUp', 'admin\MainController@orderUp');


//report
Route::get('/dailySell', 'admin\ReportController@dailySell');
Route::get('/dailySellIndex/{date}', 'admin\ReportController@dailySellIndex');
Route::get('/monthlySell', 'admin\ReportController@monthlySell');
Route::get('/monthlySellIndex/{year}/{month}', 'admin\ReportController@monthlySellIndex');

//customer
Route::get('/all-customer', 'AddController@customerIndex');

//seller

//editor
Route::get('/indexEditor', 'admin\EditorController@indexEdit');
Route::post('/saveEditor', 'admin\EditorController@saveEditor');
Route::get('/editorDelete/{id}', 'admin\EditorController@editorDelete');






 Route::group(['namespace' => 'admin','middleware'=>['auth']], function(){
      Route::get('/product', 'ProductController@index');
      Route::get('/productIndex', 'ProductController@productIndex')->name('productIndex');
	  Route::get('/productAttr/{id}', 'ProductController@productAttr');
	  Route::post('/sizeName', 'ProductController@sizeName');
	  Route::post('/productAttrSave', 'ProductController@productAttrSave');
	  Route::post('/productSave', 'ProductController@productSave');
	  Route::get('/productEdit/{id}', 'ProductController@productEdit');

	  Route::post('/productUpdate/{id}', 'ProductController@productUpdate');
	  Route::get('/productDelete/{id}', 'ProductController@productDelete');
	  Route::get('/approveProduct', 'ProductController@approveProduct');
	  Route::post('/productapprove', 'ProductController@productapprove');
 });

////customer-dashboard

Route::get('/customer-dashboard', 'CustomerController@customerDashboard')->name('customer-dashboard');
Route::PUT('/updatePassword', 'CustomerController@updatePassword');
Route::post('/customerSaveForm', 'FrontController@customerSaveForm');

//seller dasshboard

Route::get('/seller-dashboard', 'seller\SellerDashboardController@sellerDashboard')->name('seller-dashboard');
Route::get('/seller-login', 'seller\SellerDashboardController@login');
Route::get('/seller-register', 'seller\SellerDashboardController@register');
Route::post('/sellerRegisterSave', 'seller\SellerDashboardController@sellerRegisterSave');

Route::get('/seller-forgot-password', 'seller\SellerDashboardController@forgot_password');

Route::get('/seller-product', 'seller\SellerDashboardController@sellerProduct')->name('seller-product');
Route::get('/seller-product-add', 'seller\SellerDashboardController@sellerProductAdd');
Route::post('/sellerProductSave', 'seller\SellerDashboardController@sellerProductSave');
Route::get('/sellerProductDelete/{id}', 'seller\SellerDashboardController@sellerProductDelete');

Route::post('/categorySellerTosub', 'seller\SellerDashboardController@categorySellerTosub');
Route::post('/subCategorySellerTothird', 'seller\SellerDashboardController@subCategorySellerTothird');

Route::get('/sellerProductAttr/{id}', 'seller\SellerDashboardController@sellerProductAttr');
Route::post('/sellerProductAttrSave', 'seller\SellerDashboardController@sellerProductAttrSave');
Route::post('/sizeNameseller', 'seller\SellerDashboardController@sizeNameseller');
Route::get('/sellerProductAttrDelete/{id}', 'seller\SellerDashboardController@sellerProductAttrDelete');
Route::get('/sellerProductEdit/{id}', 'seller\SellerDashboardController@sellerProductEdit');
Route::post('/sellerProductupdate/{id}', 'seller\SellerDashboardController@sellerProductupdate');
Route::get('/seller-information', 'seller\SellerDashboardController@sellerInformation');
Route::post('/sellerInfoSave', 'seller\SellerDashboardController@sellerInfoSave');
Route::get('/affiliate', 'seller\SellerDashboardController@affiliate');
Route::post('/affiliateSave', 'seller\SellerDashboardController@affiliateSave');
Route::get('/sellerPayment', 'seller\SellerDashboardController@sellerPayment');


/////testing

Route::get('/test', 'FrontController@test');
Route::post('/testSave', 'FrontController@testSave');
Route::get('/allcategorynav', 'FrontController@allcategorynav');
