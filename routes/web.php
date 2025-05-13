<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\HomepageController; 
use App\Http\Controllers\ProductCategoryController; 
use App\Http\Controllers\ProductController;
 
Route::get('/',[HomepageController::class,'index'])->name('home'); 
Route::get('product', [HomepageController::class, 'product']);
Route::get('product/{slug}', [HomepageController::class, 'product']); 
Route::get('categories',[HomepageController::class, 'categories']); 
Route::get('category/{slug}', [HomepageController::class, 'category']); 
Route::get('cart', [HomepageController::class, 'cart']); 
Route::get('checkout', [HomepageController::class, 'checkout']);


// Route::get('/', function(){ 
//    $title = "Homepage"; 
   
//    return view('web.homepage',['title'=>$title]); 
// }); 
 
// Route::get('product', function(){ 
//    $title = "Product"; 
 
//    return view('web.product',['title'=>$title]); 
// }); 
 
// Route::get('product/{slug}', function($slug){ 
//    $title = "Single Product"; 
 
//    return view('web.single_product',['title'=>$title,'slug'=>$slug]); 
// }); 
 
// Route::get('categories', function(){ 
//    $title = "Categories"; 
 
//    return view('web.categories',['title'=>$title]); 
// }); 
 
// Route::get('categories/{slug}', function($slug){ 
//    $title = "Single Categories"; 
 
//    return view('web.single_categories',['title'=>$title,'slug'=>$slug]); 
// }); 
 
// Route::get('cart', function(){ 
//    $title = "Cart"; 
 
//    return view('web.cart',['title'=>$title]); 
// }); 
 
// Route::get('checkout', function(){ 
//    $title = "Checkout"; 
 
//    return view('web.checkout',['title'=>$title]); 
// }); 

// Route::get('/', function () {
//     return view('web.homepage');
// });

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::group(['prefix'=>'dashboard'], function(){

    Route::resource('categories',ProductCategoryController::class);
});

Route::group(['prefix'=>'dashboard'], function(){

    Route::resource('products',ProductController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
