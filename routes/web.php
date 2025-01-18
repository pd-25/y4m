<?php

use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[IndexController::class,'index'])->name('index');
Route::get('/our-vision',[IndexController::class,'ourvision'])->name('ourvision');
Route::get('/single-program/{slug}',[IndexController::class,'singleprogram'])->name('singleprogram');
Route::get('/our-team',[IndexController::class,'ourteam'])->name('ourteam');
Route::get('/store/{slug?}',[IndexController::class,'store'])->name('store');
Route::get('/enrollment',[IndexController::class,'enrollment'])->name('enrollment');
Route::get('/membership',[IndexController::class,'membership'])->name('membership');
Route::get('/contact-us',[IndexController::class,'contactus'])->name('contactus');
Route::get('/donate',[IndexController::class,'donate'])->name('donate');
Route::post('/lead-create',[IndexController::class,'leadCreate'])->name('lead-create');
Route::post('/contact-data',[IndexController::class,'contactdata'])->name('contact-data');
Route::get('/program/{slug?}',[IndexController::class,'program'])->name('program');
Route::get('optimize', function () {

    \Artisan::call('optimize:clear');

    dd("optimize is cleared");

});

Route::get('storage', function () {

    \Artisan::call('storage:link');

    dd("storage is link");

});

Route::get('migrate', function () {

    \Artisan::call(' key:generate');
    \Artisan::call(' migrate');

    dd("storage is link");

});

require __DIR__ . '/admin.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
