<?php

use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/our-vision', [IndexController::class, 'ourvision'])->name('ourvision');
Route::get('/single-program/{slug}', [IndexController::class, 'singleprogram'])->name('singleprogram');
Route::get('/our-team', [IndexController::class, 'ourteam'])->name('ourteam');
Route::get('/store/{slug?}', [IndexController::class, 'store'])->name('store');
Route::get('/enrollment', [IndexController::class, 'enrollment'])->name('enrollment');
Route::get('/membership', [IndexController::class, 'membership'])->name('membership');
Route::get('/contact-us', [IndexController::class, 'contactus'])->name('contactus');
Route::get('/donate', [IndexController::class, 'donate'])->name('donate');
Route::get('/donate-now', [IndexController::class, 'donatenow'])->name('donatenow');
Route::post('/donate-now-post', [PayPalController::class, 'donatenowpost'])->name('donatenowpost');
Route::get('/donate-now-success', [PayPalController::class, 'donatenowsuccess'])->name('donatenowsuccess');
Route::get('/donate-now-cancel', [PayPalController::class, 'donatenowcancel'])->name('donatenowcancel');


Route::post('/lead-create', [IndexController::class, 'leadCreate'])->name('lead-create');
Route::post('/contact-data', [IndexController::class, 'contactdata'])->name('contact-data');
Route::get('/program/{slug?}', [IndexController::class, 'program'])->name('program');

Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('success-transaction-msg', [PayPalController::class, 'successTransactionMsg'])->name('successTransactionMsg');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
Route::get('cancel-transaction-msg', [PayPalController::class, 'cancelTransactionMsg'])->name('cancelTransactionMsg');

Route::get('optimize', function () {

    \Artisan::call('optimize:clear');

    dd("optimize is cleared");
});

Route::get('storage', function () {

    \Artisan::call('storage:link');

    dd("storage is link");
});

Route::get('dump', function () {

    \Artisan::call('dump-autoload');


    dd("dump is link");
});

require __DIR__ . '/admin.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
