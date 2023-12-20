<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MailController;


// home page
Route::get('/',[HomeController::class,'homepage'])->name('home')->middleware('checksession');
Route::get('/register',[HomeController::class,'registration'])->name('registration');
Route::post('/register-user',[HomeController::class,'registrationuser']);
Route::any('/login',[HomeController::class,'login'])->name('login');
Route::any('/login-user',[HomeController::class,'loginuser'])->name('loginuser');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');

// profile page
Route::get('/profile',[ProfileController::class,'index'])->name('profile')->middleware('checksession','sessiondestroy');
Route::any('/profile-update',[ProfileController::class,'update']);

// orders
Route::get('/your-orders',[OrderController::class,'index'])->name('orders');

// product
Route::get('/product',[ProductController::class,'index'])->name('product')->middleware('checksession');
Route::post('/add-wishlist',[ProductController::class,'addwishlist'])->name('addwishlist');
Route::post('/remove-wishlist',[ProductController::class,'removewishlist'])->name('removewishlist');
Route::any('/product-detail/{id}',[ProductController::class,'productDetail'])->name('productdetail');



// Routes with the 'admin' prefix
Route::group(['prefix' => '/admin'], function () {
    Route::get('users',[AdminController::class,'users'])->name('users')->middleware('checkauth');
    Route::get('/add-product',[AdminController::class,'addproduct'])->name('addproduct');
    Route::get('/all-product',[AdminController::class,'allproduct'])->name('allproduct');
    Route::get('/edit-product/{id}',[AdminController::class,'editproduct'])->name('editproduct');
    Route::get('/users/wishlist/{id}',[AdminController::class,'wishlist'])->name('wishlist')->middleware('checkauth');
    Route::get('/users/orders/{id}',[AdminController::class,'orders'])->name('order')->middleware('checkauth');
    Route::get('/coupons',[AdminController::class,'coupons'])->name('coupons')->middleware('checkauth');
    Route::get('/coupons/add-coupons',[AdminController::class,'addcoupon'])->name('addcoupon')->middleware('checkauth');
    Route::get('/users/reviews/{id}',[AdminController::class,'reivews'])->name('reivews')->middleware('checkauth');
    Route::post('/delete-reivew',[AdminController::class,'delete_reivew'])->name('delete_reivew');
    Route::get('/subscribers',[AdminController::class,'subscribers'])->name('subscribers');
    Route::get('/testimonials',[AdminController::class,'tesmtionials'])->name('tesmtionials');


});
// admin
Route::get('/admin',[AdminController::class,'index'])->name('admin');
Route::post('/login-admin',[AdminController::class,'login']);
Route::get('/admin-dashboard',[AdminController::class,'dashboard']);
Route::get('/logout-admin',[AdminController::class,'logout']);


Route::post('/productstore',[AdminController::class,'store'])->name('store_product');
Route::post('/update-product',[AdminController::class,'updateProduct'])->name('updateProduct');
Route::get('/delete-product/{id}',[AdminController::class,'deleteProduct'])->name('deleteProduct');
Route::get('/user-deactivation/{id}',[AdminController::class,'users_deactivate'])->name('users_deactivate');
Route::get('/user-delete/{id}',[AdminController::class,'users_delete'])->name('users_delete');
Route::get('/delete-subscriber/{id}',[AdminController::class,'subscribe_delete'])->name('subscribe_delete');

Route::get('/del-product/{id}',[AdminController::class,'del_product'])->name('del_product');
Route::post('/store-coupons',[AdminController::class,'storecoupon'])->name('storecoupon');



// pofile
Route::get('/user-wishlist',[ProfileController::class,'userwishlist'])->name('userwishlist')->middleware('checksession','sessiondestroy');

// payment
Route::post('/pay/{id}',[PaymentController::class,'pay'])->name('payment')->middleware('sessiondestroy');
Route::get('/success',[PaymentController::class,'success']);
Route::get('/error',[PaymentController::class,'error']);



Route::post('/check-coupon',[ProductController::class,'checkCoupon']);
Route::get('/coupon-deactivate/{id}',[ProductController::class,'couponDeactivate'])->name('couponDeactivate');

// Cart
Route::post('/add-cart',[CartController::class,'addCart'])->name('addCart');
Route::get('/add-cart',[CartController::class,'cartproduct'])->name('cartproduct');
Route::post('/remove-cart',[CartController::class,'removeCart'])->name('removeCart');
Route::get('/plan',[PayPalController::class,'Plan']);
Route::get('/yearlyplan',[PayPalController::class,'yearlyPlan']);
Route::get('/autopay/{planid}/{price}',[PayPalController::class,'updateSubscriptionPlanPrice']);

// search
Route::get('/search',[SearchController::class,'product_searching'])->name('search');

// raviews & ratings
Route::post('/rating',[ReviewController::class,'add_rating'])->name('addrating');
Route::post('/add-review',[ReviewController::class,'add_review'])->name('addreview');

// Mail
Route::post('/send-mail',[MailController::class,'index'])->name('sendMail');

// testmonial
Route::post('/testimonial-review',[HomeController::class,'index'])->name('tesmtionial_review');








