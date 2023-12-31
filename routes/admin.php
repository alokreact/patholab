<?php 
Route::resource('/organ', 'App\Http\Controllers\Admin\OrganController');

Route::resource('/test', 'App\Http\Controllers\Admin\TestController');

Route::resource('/grouptest', 'App\Http\Controllers\Admin\GrouptestController');

Route::resource('/lab', 'App\Http\Controllers\Admin\LabController');

Route::resource('/category', 'App\Http\Controllers\Admin\CategoryController');

Route::resource('/admintestbyorgan', 'App\Http\Controllers\Admin\TestByOrganController');

Route::resource('/labpackage', 'App\Http\Controllers\Admin\LabPackageController');

Route::resource('/package', 'App\Http\Controllers\Admin\PackageController');

Route::get('/allppointment', [App\Http\Controllers\Admin\AdminController::class, 'appointment'])->name('allppointment');

Route::get('/order', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('order.index');

Route::get('/order/download/{id}', [App\Http\Controllers\Admin\OrderController::class, 'download'])->name('order.download');

Route::get('/prescription/download', [App\Http\Controllers\Admin\OrderController::class, 'prescription_show'])->name('prescription.all');

Route::get('/prescription/download/{id}', [App\Http\Controllers\Admin\OrderController::class, 'download_prescription'])->name('prescription.download');

Route::get('/get-report', [App\Http\Controllers\Admin\OrderController::class,'getRecord'])->name('get-report');
Route::get('/show/order', [App\Http\Controllers\Admin\OrderController::class, 'show_order'])->name('show.order');

Route::resource('/slider', 'App\Http\Controllers\Admin\SliderController');

Route::post('/upload-report', [App\Http\Controllers\Admin\OrderController::class,'uploadReport'])->name('upload.report');
Route::post('/upload-new-report', [App\Http\Controllers\Admin\OrderController::class,'uploadnewReport'])->name('upload.newreport');


Route::post('/subtest/price', [App\Http\Controllers\Admin\LabPackageController::class, 'getSubtestprice'])->name('subtestprice');

Route::get('/create/coupon', [App\Http\Controllers\Admin\CouponController::class, 'create'])->name('coupon.create');

Route::post('/save/coupon', [App\Http\Controllers\Admin\CouponController::class, 'store'])->name('coupon.store');

Route::get('/get/coupon', [App\Http\Controllers\Admin\CouponController::class, 'index'])->name('coupon.index');

Route::get('/get/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
Route::get('/edit/user/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
Route::get('/post/user/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
Route::post('/orderstatus/update', [App\Http\Controllers\Admin\OrderController::class, 'changeOrderStatus'])->name('orderstatus.update');

Route::group(['middleware' => ['auth']], function () {   
    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
});
