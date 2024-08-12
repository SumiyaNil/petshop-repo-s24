<?php

use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FosterController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\AccessoriesController as FrontendAccessoriesController;
use App\Http\Controllers\Frontend\CustomerController as FrontendCustomerController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
//for website panel

Route::get('/',[FrontendHomeController::class, 'home'])->name('frontend.home');
Route::get('/product',[FrontendProductController::class,'allproduct'])->name('frontend.product');
Route::get('/allaccessories',[FrontendAccessoriesController::class,'accessories'])->name('frontend.accessories');

Route::post('/register',[FrontendCustomerController::class,'register'])->name('frontend.register');
Route::post('/login',[FrontendCustomerController::class,'login'])->name('frontend.login');

Route::get('/accessories/show/{p_id}',[FrontendAccessoriesController::class,'show'])->name('show.accessories');
//cart
Route::get('/add-to-cart/{productID}',[OrderController::class,'addCart'])->name('add.cart');
Route::get('/view-cart',[OrderController::class,'viewcart'])->name('view.cart');
Route::get('/clear-cart',[OrderController::class, 'clearCart'])->name('cart.clear');
Route::get('/cart/item/delete/{id}',[OrderController::class, 'cartItemDelete'])->name('cart.item.delete');
Route::get('/search',[FrontendAccessoriesController::class,'search'])->name('search');
//logout and checkout
Route::group(['middleware'=>'customer_auth'],function(){
   Route::get('/logout',[FrontendCustomerController::class,'logout'])->name('frontend.logout');
   Route::get('checkout',[OrderController::class,'checkout'])->name('checkout');
   Route::post('/placeorder',[OrderController::class,'placeOrder'])->name('place.order');
   Route::get('/profile-page',[ProfileController::class,'profilePage'])->name("profile.page");
   Route::get('/profile-order',[ProfileController::class,'profileOrder'])->name('profile.order');
   Route::get('/view-Invoice/{order_id}',[OrderController::class,'viewInvoice'])->name('view.invoice');
  
});



Route::group(['prefix'=>'admin'],function(){

//Login
    Route::get('/login',[UserController::class,'loginentry'])->name('login');
    Route::post('/login-form',[UserController::class,'form'])->name('login.form');
    Route::group(['middleware' => 'auth'],function(){
    //Route::get('/',[AdminController::class,'admin'])->name('admin.panel');
    //main panel
       Route::get('/',[MasterController::class,'master'])->name('master.panel');
    //logout
       Route::get('/logout',[UserController::class,'logout'])->name('logout');

    //dashboard
       Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    
       Route::get('/business-settings',[BusinessController::class,'business'])->name('business.settings');
    
       //accessories
       Route::get('/accessories',[AccessoriesController::class,'accessories'])->name('accessories.list');
       Route::get('accessories-form',[AccessoriesController::class,'form'])->name('accessories.form');
       Route::post('accessories-store',[AccessoriesController::class,'store'])->name('accessories.store');
       //accessories delete
       Route::get('/accessories-delete/delete/{acc_id}',[AccessoriesController::class,'delete'])->name('accessories.delete');
       Route::get('/accessories-view/view/{acc_id}',[AccessoriesController::class,'view_accessories'])->name('accessories.view');
       Route::get('/accessories-edit/edit/{acc_id}',[AccessoriesController::class,'edit_accessories'])->name('accessories.edit');
       Route::post('/accessories-update/update/{acc_id}}',[AccessoriesController::class,'update_accessories'])->name('accessories.update');
       
       Route::get('/customer',[CustomerController::class,'customer'])->name('customer.list');
       Route::get('/customer-form',[CustomerController::class,'form'])->name('customer.form');
       Route::post('/customer-store',[CustomerController::class,'store'])->name('customer.store');
    


       //Route::get('/animal',[AnimalController::class,'animal'])->name('animal');
    


       Route::get('/report',[ReportController::class,'report'])->name('report');


       Route::get('/service',[ServiceController::class,'service']);

       
       Route::get('/order',[OrderController::class,'order'])->name('order.list');


       Route::get('/fostercare',[FosterController::class,'foster'])->name('foster.list');
       Route::get('/foster-form',[FosterController::class,'form'])->name('foster.form');
       Route::post('foster-store',[FosterController::class,'store'])->name('foster.store');


    
       Route::get('/payment',[PaymentController::class,'list'])->name('payment.list');
       Route::get('/payment-form',[PaymentController::class,'form'])->name('payment.form');
       Route::post('/payment-store',[PaymentController::class,'store'])->name('payment.store');
    
       Route::get('/category',[CategoryController::class,'list'])->name('category.list');
       Route::get('/categoryform',[CategoryController::class,'form'])->name('category.form');
       Route::post('/categorystore',[CategoryController::class,'store'])->name('category.store');
    

    });


});