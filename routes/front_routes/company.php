<?php

Route::get('company-home', [App\Http\Controllers\Company\CompanyController::class, 'index'])->name('company.home');