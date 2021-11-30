<?php

Route::get('/letadminin', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLogin'])->name('login');
Route::post('/letadminin', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLogin']);
    // Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLogin'])->name('login');
    // Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
    Route::get('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/password/reset', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'reset']);
});