<?php

Route::get('company-home', [App\Http\Controllers\Company\CompanyController::class, 'index'])->name('company.home');
Route::get('company-account', [App\Http\Controllers\Company\CompanyController::class, 'account'])->name('company.account');
Route::get('company-settings', [App\Http\Controllers\Company\CompanyController::class, 'settings'])->name('company.settings');
Route::post('company-setting-update', [App\Http\Controllers\Company\CompanyController::class, 'updateSetting'])->name('company.setting.update');
Route::get('company-profile', [App\Http\Controllers\Company\CompanyController::class, 'profile'])->name('company.profile');
Route::get('company-profile-edit', [App\Http\Controllers\Company\CompanyController::class, 'edit'])->name('company.profile.edit');
Route::post('company-profile-update', [App\Http\Controllers\Company\CompanyController::class, 'update'])->name('company.profile.update');
Route::post('company-profile-update-detail', [App\Http\Controllers\Company\CompanyController::class, 'update_detail'])->name('company.profile.update.detail');
Route::get('company-activity', [App\Http\Controllers\Company\CompanyController::class, 'activity'])->name('company.activity');
Route::get('company-listing', [App\Http\Controllers\Company\CompanyController::class, 'company_listing'])->name('company.listing');
Route::post('company-repassword', [App\Http\Controllers\Company\CompanyController::class, 'updatePassword'])->name('company.repassword');

Route::get('position-listing/{opportunity}', [App\Http\Controllers\Company\CompanyController::class, 'positionListing'])->name('company.positions');
Route::get('position-detail-add/{company_id}', [App\Http\Controllers\Company\CompanyController::class, 'positionAdd'])->name('company.position-add');
Route::get('position-detail/{opportunity}', [App\Http\Controllers\Company\CompanyController::class, 'positionDetail'])->name('company.position');
Route::post('position-detail-store', [App\Http\Controllers\Company\CompanyController::class, 'store'])->name('company.position.store');
Route::get('position-detail-edit/{opportunity}', [App\Http\Controllers\Company\CompanyController::class, 'positionEdit'])->name('company.position.edit');
Route::post('position-detail-update/{opportunity}', [App\Http\Controllers\Company\CompanyController::class, 'positionUpdate'])->name('company.position.update');

Route::get('feature-staff-detail', [App\Http\Controllers\Company\CompanyController::class, 'featureStaffDetail'])->name('feature.staff.detail');
Route::get('staff-detail', [App\Http\Controllers\Company\CompanyController::class, 'staffDetail'])->name('staff.detail');