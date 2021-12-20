<?php

Route::get('company-home', [App\Http\Controllers\Company\CompanyController::class, 'index'])->name('company.home');
Route::get('company-listing', [App\Http\Controllers\Company\CompanyController::class, 'company_listing'])->name('company.listing');