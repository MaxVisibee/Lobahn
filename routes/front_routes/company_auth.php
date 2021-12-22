<?php

Route::prefix('company')->name('company.')->group(function () {
    // Route::get('/', [App\Http\Controllers\Company\Auth\LoginController::class, 'showLoginForm']);
    // Route::get('/login', [App\Http\Controllers\Company\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Company\Auth\LoginController::class, 'login'])->name('login');
    Route::post('/logout', [App\Http\Controllers\Company\Auth\LoginController::class, 'logout'])->name('logout');

    // Registration Routes...
    Route::get('/get-subsectors/{id}', [App\Http\Controllers\Company\Auth\RegisterController::class, 'getSectors'])->name('get-sectors');
    Route::get('/register', [App\Http\Controllers\Company\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Company\Auth\RegisterController::class, 'register']);
    Route::get('/get-email', [App\Http\Controllers\Company\Auth\ForgotPasswordController::class, 'getEmail'])->name('get-email');
    Route::get('/password/reset', [App\Http\Controllers\Company\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [App\Http\Controllers\Company\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [App\Http\Controllers\Company\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [App\Http\Controllers\Company\Auth\ResetPasswordController::class, 'reset']);
});



Route::post('company-registered-dashboard', [App\Http\Controllers\Company\Auth\RegisterController::class, 'registeredDashboard'])->name('company-reg.dashboard');
Route::post('company-registered-listing', [App\Http\Controllers\Company\Auth\RegisterController::class, 'registeredListing'])->name('company-reg.listing');


