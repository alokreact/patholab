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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::any('/signin', [App\Http\Controllers\AuthController::class, 'login'])->name('signin');
Route::any('/signup', [App\Http\Controllers\AuthController::class, 'register'])->name('signup');

Route::get('/allorgans', [App\Http\Controllers\OrganController::class, 'index'])->name('allorgans');
Route::get('/testbyorgan/{id}', [App\Http\Controllers\OrganController::class, 'findTestbyOrgan'])->name('testbyorgan');

Route::get('/category/all', [App\Http\Controllers\HomeController::class, 'get_all_category'])
->name('category.all');

Route::get('/category/package/{id}', [App\Http\Controllers\HomeController::class, 'get_package_from_category'])
->name('category.package');

Route::get('/front-package/{id}', [App\Http\Controllers\HomeController::class,'package'])->name('package-details');
Route::post('/subtestajax', [App\Http\Controllers\HomeController::class,'getlistofajaxSubtest'])->name('subtest.ajax');

Route::post('/searchsubtest', [App\Http\Controllers\HomeController::class,'searchSubtest'])->name('searchsubtest');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('/appointment', [App\Http\Controllers\ContactController::class, 'appointment'])->name('appointment');
Route::post('/appointment/submit', [App\Http\Controllers\ContactController::class, 'store_appointment'])->name('appointment.submit');


Route::get('/prescription', [App\Http\Controllers\ContactController::class, 'prescription'])->name('prescription');
Route::post('/prescription/submit', [App\Http\Controllers\ContactController::class, 'store_prescription'])->name('prescription.submit');




//Route::post('/checkout/submit', [App\Http\Controllers\CheckoutController::class,'iniitiate'])->name('checkout.submit');
Route::get('/confirmation', [App\Http\Controllers\CheckoutController::class,'confirmation'])->name('confirmation');
Route::get('/callback/success', [App\Http\Controllers\CheckoutController::class,'success'])->name('callback.success');





Route::delete('/remove/cart', [App\Http\Controllers\CartController::class,'remove_product'])->name('remove_product_from_cart');
Route::patch('/update/cart', [App\Http\Controllers\CartController::class,'update_product'])->name('update_cart');

Route::get('/checkout', [App\Http\Controllers\CheckoutController::class,'checkout'])->name('checkout');
Route::post('/checkout/submit', [App\Http\Controllers\CheckoutController::class,'save_order'])->name('checkout.submit');


// Route::post('cart', [App\Http\Controllers\CartController_new::class,'cart'])->name('cart');

Route::get('/cart', [App\Http\Controllers\CartController_new::class,'index'])->name('cart.index');
Route::post('add-to-cart', [App\Http\Controllers\CartController::class,'addProduct'])->name('add_to_cart');

Route::post('/package/add', [App\Http\Controllers\CartController::class,'addPackage'])->name('add_to_package');

Route::get('cart', [App\Http\Controllers\CartController::class,'cart'])->name('cart');

Route::get('session/remove', [App\Http\Controllers\CartController_new::class,'deleteSessionData'])->name('session');
Route::post('/remove-selected', [App\Http\Controllers\HomeController::class,'removeSelectedTest'])->name('remove-test');
 


Route::post('razorpay-payment', [App\Http\Controllers\CheckoutController::class, 'razorPayStore'])->name('razorpay.payment.store');
Route::get('razorpay', [App\Http\Controllers\CheckoutController::class, 'razorpay']);

Route::post('/payment/callback', [App\Http\Controllers\CheckoutController::class, 'handleCallback'])->name('payment.callback');

Route::post('/pay_option/save', [App\Http\Controllers\CheckoutController::class,'save_pay_option'])->name('save_pay_option');



Route::get('/profile', [App\Http\Controllers\ProfileController::class,'index'])->name('profile');
Route::get('/create/prescription', [App\Http\Controllers\ProfileController::class,'prescription'])->name('upload-prescription');



Route::get('/check', [App\Http\Controllers\ProfileController::class,'check'])->name('check');


Route::post('/save/patient', [App\Http\Controllers\CheckoutController::class,'addPatient'])->name('savepatient');
Route::post('/delete/patient', [App\Http\Controllers\PatientController::class,'delete'])->name('deletepatient');


Route::get('/email-template', [App\Http\Controllers\ProfileController::class,'emailTemplate'])->name('email-template');
Route::get('/email-send', [App\Http\Controllers\ProfileController::class,'send_email'])->name('send-email');


Route::post('/create/otp', [App\Http\Controllers\AuthController::class,'generateOTP'])->name('otp.create');
Route::post('/verify/otp', [App\Http\Controllers\AuthController::class,'verifyOTP'])->name('otp.verify');

include"admin.php";