<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//home

route::get('redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
route::get('product_details/{id}',[HomeController::class,'product_details']);
route::post('add_cart/{id}',[HomeController::class,'add_cart']);
route::get('show_cart',[HomeController::class,'show_cart']);
route::get('remove_cart/{id}',[HomeController::class,'remove_cart']);
route::get('cash_on_deli',[HomeController::class,'cash_on_deli']);
route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);
Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');
route::get('show_order',[HomeController::class,'show_order']);
route::get('cancel_order/{id}',[HomeController::class,'cancel_order']);
route::get('search_product',[HomeController::class,'search_product']);

route::get('all_products',[HomeController::class,'all_products']);
route::get('product_search',[HomeController::class,'product_search']);

route::get('/services',[HomeController::class,'services']);
route::get('/about',[HomeController::class,'about']);

route::get('/contact',[HomeController::class,'contact']);






// admin

route::get('/view_category',[AdminController::class,'view_category']);
route::post('/upload_category',[AdminController::class,'upload_category']);
route::get('delete_category/{id}',[AdminController::class,'delete_category']);

route::get('add_product',[AdminController::class,'add_product']);
route::post('upload_product',[AdminController::class,'upload_product']);
route::get('view_product',[AdminController::class,'view_product']);
route::get('delete_product/{id}',[AdminController::class,'delete_product']);
route::get('update_product/{id}',[AdminController::class,'update_product']);
route::post('update_product_con/{id}',[AdminController::class,'update_product_con']);

route::get('order',[AdminController::class,'order']);
route::get('delivered/{id}',[AdminController::class,'delivered']);
route::get('print_pdf/{id}',[AdminController::class,'print_pdf']);

route::get('search',[AdminController::class,'search']);







