<?php

Route::get('company-home', [App\Http\Controllers\Company\CompanyController::class, 'index'])->name('company.home');
Route::get('company-account', [App\Http\Controllers\Company\CompanyController::class, 'account'])->name('company.account');
Route::get('company-settings', [App\Http\Controllers\Company\CompanyController::class, 'settings'])->name('company.settings');
Route::post('company-setting-update', [App\Http\Controllers\Company\CompanyController::class, 'updateSetting'])->name('company.setting.update');
Route::get('company-profile', [App\Http\Controllers\Company\CompanyController::class, 'profile'])->name('company.profile');
Route::get('company-profile-edit', [App\Http\Controllers\Company\CompanyController::class, 'edit'])->name('company.profile.edit');
Route::post('company-crop-image-upload', [App\Http\Controllers\Company\CompanyController::class, 'uploadCropImage']);

Route::post('company-profile-update', [App\Http\Controllers\Company\CompanyController::class, 'update'])->name('company.profile.update');
Route::post('company-profile-update-detail', [App\Http\Controllers\Company\CompanyController::class, 'update_detail'])->name('company.profile.update.detail');
Route::get('company-activity', [App\Http\Controllers\Company\CompanyController::class, 'activity'])->name('company.activity');
Route::get('company-listing', [App\Http\Controllers\Company\CompanyController::class, 'company_listing'])->name('company.listing');
Route::post('company-repassword', [App\Http\Controllers\Company\CompanyController::class, 'updatePassword'])->name('company.repassword');

Route::get('position-listing/{opportunity}', [App\Http\Controllers\Company\CompanyController::class, 'positionListing'])->name('company.positions');
Route::get('position-detail-add/{company_id}', [App\Http\Controllers\Company\CompanyController::class, 'positionAdd'])->name('company.position-add');
Route::get('position-detail/{opportunity}', [App\Http\Controllers\Company\CompanyController::class, 'positionDetail'])->name('company.position');
Route::post('position-detail-store', [App\Http\Controllers\Company\CompanyController::class, 'positionStore'])->name('company.position.store');
Route::get('position-detail-edit/{opportunity}', [App\Http\Controllers\Company\CompanyController::class, 'positionEdit'])->name('company.position.edit');
Route::post('position-detail-update/{opportunity}', [App\Http\Controllers\Company\CompanyController::class, 'positionUpdate'])->name('company.position.update');


Route::post('click-to-staff', [App\Http\Controllers\Company\CompanyController::class, 'clickToStaff'])->name('click.to.staff');
Route::post('connect-to-staff', [App\Http\Controllers\Company\CompanyController::class, 'connectToStaff'])->name('connect.to.staff');
Route::post('shortlist-to-staff', [App\Http\Controllers\Company\CompanyController::class, 'shortlistToStaff'])->name('shortlist.to.staff');
Route::post('delete-to-staff', [App\Http\Controllers\Company\CompanyController::class, 'removeStaff'])->name('remove.staff');
Route::get('staff-detail/{opportunity_id}/{user_id}/', [App\Http\Controllers\Company\CompanyController::class, 'staffDetail'])->name('staff.detail');

Route::post('/update-staff-viewcount',[App\Http\Controllers\Company\CompanyController::class, 'updateViewCount']);
Route::get('/feature-staff-detail', [App\Http\Controllers\Company\CompanyController::class, 'featureStaffDetail'])->name('feature.staff.detail');

Route::post('to-company-dashboard', [App\Http\Controllers\Company\Auth\RegisterController::class, 'toDashboard'])->name('to.company.dashboard');
Route::post('to-optimize-listing', [App\Http\Controllers\Company\Auth\RegisterController::class, 'toOptimizeListing'])->name('to.company.optimize');
Route::get('optimize-listing',[App\Http\Controllers\Company\CompanyController::class, 'optimizeProfile'])->name("talent.opitimize");
Route::post('optimize-listing',[App\Http\Controllers\Company\CompanyController::class, 'saveOptimizedProfile'])->name("talent.opitimized");