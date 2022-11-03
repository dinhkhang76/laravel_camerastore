<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\frontend\LienheController;
use App\Http\Controllers\frontend\GiohangController;

//Trang quản lý
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\SupplierController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\ConfigController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\RegisterController;
use App\Http\Controllers\frontend\AuthFrontendController;
use App\Http\Controllers\frontend\DangKyController;
use App\Http\Controllers\frontend\SearchController;





Route::get('/',[SiteController::class,'index'])->name('site.home');
Route::get('tim-kiem',[SearchController::class,'index'])->name('search.index');//Trang tìm kiếm

//Route::get('lien-he',[LienheController::class,'index'])->name('contact.index');
Route::get('san-pham',[SiteController::class,'product'])->name('site.product.index');
Route::get('bai-viet',[SiteController::class,'post'])->name('site.post');
Route::get('gio-hang',[GiohangController::class,'index'])->name('giohang.index');
Route::get('gio-hang/addcart/{id}',[GiohangController::class,'addcart'])->name('giohang.addcart'); 
Route::get('gio-hang/delcart',[GiohangController::class,'delcart'])->name('giohang.delcartall'); 
Route::get('gio-hang/delcart/{id}',[GiohangController::class,'delcart'])->name('giohang.delcart'); 
Route::post('gio-hang/cap-nhat',[GiohangController::class,'updatecart'])->name('giohang.updatecart'); 

//thanh toán
Route::get('thanh-toan',[GiohangController::class,'paycart'])->name('pay.index');//Trang thanh toán
Route::get('payorder',[GiohangController::class,'payorder'])->name('pay.order');
Route::get('thanh-toan-thanh-cong',[GiohangController::class,'paysuccess'])->name('pay-success.index');

Route::get('admin/login',[AuthController::class,'login'])->name('admin.login');
Route::post('admin/login',[AuthController::class,'dologin'])->name('admin.dologin');
Route::get('admin/logout',[AuthController::class,'logout'])->name('admin.logout');
Route::get('admin/register',[RegisterController::class,'register'])->name('register.admin');//Trang đăng nhập admin
Route::post('admin/register-user', [RegisterController::class, 'doRegister'])->name('doRegister.admin');

Route::get('dang-nhap',[AuthFrontendController::class,'dangnhap'])->name('login.index');//Trang đăng nhập frontend
Route::post('dangnhap-user', [AuthFrontendController::class, 'doDangnhap'])->name('doLogin.index');
Route::get('dang-xuat',[AuthFrontendController::class,'dangxuat'])->name('logout.index');//Trang đăng xuất fr

Route::get('dang-ky',[DangKyController::class,'dangky'])->name('register.index');//Trang đăng ký
Route::post('dangky-user', [DangKyController::class, 'doDangky'])->name('doRegister.index');
 

//Route::get('tim-kiem',[FindController::class,'index'])->name('find.index');// tìm kiếm

//Trang quan ly
Route::middleware('loginadmin')->prefix('admin')->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    
    
    //Quan ly danh muc san pham   
    Route::resource('category', CategoryController::class);
    Route::get('category-trash',[CategoryController::class,'trash'])->name('category-trash');
    Route::get('category/{id}/status',[CategoryController::class,'status'])->name('category.status');
    Route::get('category/{id}/deltrash',[CategoryController::class,'deltrash'])->name('category.deltrash');
    Route::get('category/{id}/retrash',[CategoryController::class,'retrash'])->name('category.retrash');

    // Quan ly chu de bai viet
    Route::resource('topic', TopicController::class);
    Route::get('topic-trash',[TopicController::class,'trash'])->name('topic-trash');
    Route::get('topic/{id}/status',[TopicController::class,'status'])->name('topic.status');
    Route::get('topic/{id}/deltrash',[TopicController::class,'deltrash'])->name('topic.deltrash');
    Route::get('topic/{id}/retrash',[TopicController::class,'retrash'])->name('topic.retrash');

    // Quan ly nha cung cap
    Route::resource('supplier', SupplierController::class);
    Route::get('supplier-trash',[SupplierController::class,'trash'])->name('supplier-trash');
    Route::get('supplier/{id}/status',[SupplierController::class,'status'])->name('supplier.status');
    Route::get('supplier/{id}/deltrash',[SupplierController::class,'deltrash'])->name('supplier.deltrash');
    Route::get('supplier/{id}/retrash',[SupplierController::class,'retrash'])->name('supplier.retrash');


    // Quan ly san pham
    Route::resource('product', ProductController::class);
    Route::get('product-trash',[ProductController::class,'trash'])->name('product-trash');
    Route::get('product/{id}/status',[ProductController::class,'status'])->name('product.status');
    Route::get('product/{id}/deltrash',[ProductController::class,'deltrash'])->name('product.deltrash');
    Route::get('product/{id}/retrash',[ProductController::class,'retrash'])->name('product.retrash');

    // Quan ly bai viet
    Route::resource('post', PostController::class);
    Route::get('post-trash',[PostController::class,'trash'])->name('post-trash');
    Route::get('post/{id}/status',[PostController::class,'status'])->name('post.status');
    Route::get('post/{id}/deltrash',[PostController::class,'deltrash'])->name('post.deltrash');
    Route::get('post/{id}/retrash',[PostController::class,'retrash'])->name('post.retrash');

     // Quan ly trang don
    Route::resource('page', PageController::class);
    Route::get('page-trash',[PageController::class,'trash'])->name('page-trash');
    Route::get('page/{id}/status',[PageController::class,'status'])->name('page.status');
    Route::get('page/{id}/deltrash',[PageController::class,'deltrash'])->name('page.deltrash');
    Route::get('page/{id}/retrash',[PageController::class,'retrash'])->name('page.retrash');

     // Quan ly don hang
     Route::resource('order', OrderController::class);
     Route::get('order-trash',[OrderController::class,'trash'])->name('order-trash');
     Route::get('order/{id}/status',[OrderController::class,'status'])->name('order.status');
     Route::get('order/{id}/deltrash',[OrderController::class,'deltrash'])->name('order.deltrash');
     Route::get('order/{id}/retrash',[OrderController::class,'retrash'])->name('order.retrash');

      // Quan ly khach hang
      Route::resource('customer', CustomerController::class);
      Route::get('customer-trash',[CustomerController::class,'trash'])->name('customer-trash');
      Route::get('customer/{id}/status',[CustomerController::class,'status'])->name('customer.status');
      Route::get('customer/{id}/deltrash',[CustomerController::class,'deltrash'])->name('customer.deltrash');
      Route::get('customer/{id}/retrash',[CustomerController::class,'retrash'])->name('customer.retrash');
     
      // Quan ly lien he
      Route::resource('contact', ContactController::class);
      Route::get('contact-trash',[ContactController::class,'trash'])->name('contact-trash');
      Route::get('contact/{id}/status',[ContactController::class,'status'])->name('contact.status');
      Route::get('contact/{id}/deltrash',[ContactController::class,'deltrash'])->name('contact.deltrash');
      Route::get('contact/{id}/retrash',[ContactController::class,'retrash'])->name('contact.retrash');


      // Quan ly Slider
      Route::resource('slider', SliderController::class);
      Route::get('slider-trash',[SliderController::class,'trash'])->name('slider-trash');
      Route::get('slider/{id}/status',[SliderController::class,'status'])->name('slider.status');
      Route::get('slider/{id}/deltrash',[SliderController::class,'deltrash'])->name('slider.deltrash');
      Route::get('slider/{id}/retrash',[SliderController::class,'retrash'])->name('slider.retrash');


      // Quan ly Menu
      Route::resource('menu', MenuController::class);
      Route::get('menu-trash',[MenuController::class,'trash'])->name('menu-trash');
      Route::get('menu/{id}/status',[MenuController::class,'status'])->name('menu.status');
      Route::get('menu/{id}/deltrash',[MenuController::class,'deltrash'])->name('menu.deltrash');
      Route::get('menu/{id}/retrash',[MenuController::class,'retrash'])->name('menu.retrash');

    //Quan ly cau hinh
    Route::resource('config', ConfigController::class);


      // Quan ly thanh vien
      Route::resource('user', UserController::class);
      Route::get('user-trash',[UserController::class,'trash'])->name('user-trash');
      Route::get('user/{id}/status',[MenuController::class,'status'])->name('user.status');
      Route::get('user/{id}/deltrash',[UserController::class,'deltrash'])->name('user.deltrash');
      Route::get('user/{id}/retrash',[UserController::class,'retrash'])->name('user.retrash');



});

Route::get('{slug}',[SiteController::class,'index'])->name('site.slug');

