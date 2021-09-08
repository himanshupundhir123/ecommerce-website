<?php

use Illuminate\Support\Facades\Route;

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
// Route::get('/admin/dashboard','AdminController@dashboard');
// home page
Route::get('/','IndexController@Index');


// search product
Route::match(['get','post'],'/search-product','ProductController@searchproducts');

Route::match(['get','post'],'/admin','AdminController@login');

Route::get('logout','AdminController@logout');
Auth::routes();
//category/listing Page
Route::get('/products/{url}','ProductController@products');

//category listing page
Route::get('/get-product-all/{url}','ProductController@productss');

//product_detail page
Route::get('/product/{id}','ProductController@product');

// add to cart route
Route::match(['get','post'],'add-cart','ProductController@addcart');

// cart page
Route::match(['get','post'],'cart','ProductController@cart');

// delete product by cart page
Route::get('cart/delete-product/{id}','ProductController@deletecartproduct');

// update cart quantity in cart
Route::get('/cart/update-quantity/{id}/{quantity}','ProductController@upadatecartquantity');


// get product price by attribute
Route::get('/get-product-price','ProductController@getproductprice');


Route::post('/cart/apply-coupon/','ProductController@applycoupon');

// Route::get('/', function()  
// {  
//   return view('welcome');
// });

// Route::get('admin','AdminController@login');

// Route::get('admin/dashboard','AdminController@dashboard');
Route::match(['get','post'],'/login-register','UserController@register');
Route::match(['get','post'],'/user-login','UserController@userlogin');
Route::match(['get','post'],'/forget-password','UserController@forgetpassword');



//check-email
Route::match(['get','post'],'/check-email','UserController@checkemail');

Route::group(['middleware'=>['frontlogin']],function(){
    
    Route::match(['get','post'],'account','UserController@account');
    Route::match(['get','post'],'/check-user-pwd','UserController@checkpwd');
    Route::match(['get','post'],'/update-user-pwd','UserController@updatepwd');
    Route::match(['get','post'],'/checkout','ProductController@checkout');
    Route::match(['get','post'],'/order-review','ProductController@orderReview');
    Route::match(['get','post'],'/place-order','ProductController@placeorder');
    Route::match(['get','post'],'/thanks','ProductController@thanks');
    Route::match(['get','post'],'/orders','ProductController@userorders');
    Route::match(['get','post'],'/orders/{id}','ProductController@userordersdetails');
    Route::match(['get','post'],'/paypal','ProductController@paypal');

});

//check-email
Route::match(['get','post'],'/user-logout','UserController@logout');



Auth::routes();
Route::group(['middleware' => ['adminlogin']],function(){
Route::get('/admin/dashboard','AdminController@dashboard');
Route::get('/admin/setting','AdminController@setting');
Route::match(['get','post'],'/admin/check-pwd','AdminController@chkPassword');
Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');
Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
Route::get('/admin/view-categories','CategoryController@viewCategories');
Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
Route::match(['get','post'],'/admin/add-product','ProductController@addProduct');
Route::match(['get','post'],'/admin/view-product','ProductController@viewProduct');
Route::match(['get','post'],'/admin/edit-product/{id}','ProductController@editProduct');
Route::get('/admin/delete-product-image/{id}','ProductController@deleteProductImage');
Route::get('/admin/delete-product/{id}','ProductController@deleteProduct');
Route::match(['get','post'],'/admin/add-attribute/{id}','ProductController@addAttributes');
Route::match(['get','post'],'/admin/edit-attributes/{id}','ProductController@editAttributes');
Route::match(['get','post'],'/admin/add-images/{id}','ProductController@addImages');
Route::get('/admin/delete-image/{id}','ProductController@deleteImage');
Route::match(['get','post'],'/admin/delete-attribute/{id}','ProductController@deleteAttributes');


// coupon route
Route::match(['get','post'],'/admin/add-coupon','CouponsController@addcoupon');
Route::match(['get','post'],'/admin/edit-coupon/{id}','CouponsController@editcoupon');
Route::get('/admin/view-coupon','CouponsController@viewcoupon');
//add banner
Route::match(['get','post'],'/admin/add-banner','Bannercontroller@addbanner');
Route::match(['get','post'],'/admin/edit-banner/{id}','Bannercontroller@editbanner');
Route::get('/admin/view-banner','Bannercontroller@viewbanner');

// admin order routes
Route::get('/admin/view-orders','ProductController@vieworders');





Route::get('/admin/view-order/{id}','ProductController@vieworderdetails');

// view order invoice
Route::get('/admin/view-invoice/{id}','ProductController@vieworderinvoice');

Route::post('/admin/update-order-status','ProductController@updateorderstatus');


//add cms page

Route::match(['get','post'],'/admin/add-cms-page','cmscontroller@addcmspage');

Route::match(['get','post'],'/admin/view-cms-page','cmscontroller@viewcmspage');
// edit cms page

Route::match(['get','post'],'/admin/edit-cms-page/{id}','cmscontroller@editcmspage');

Route::match(['get','post'],'/admin/delete-cms_page/{id}','cmscontroller@deletecmspage');

// Route::match(['get','post'],'/admin/edit-categoryy/{id}','CategoryController@editCategoryid');

});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::match(['get','post'],'page/{url}','cmscontroller@cmspage');

Route::match(['get','post'],'page-contact','cmscontroller@contact');