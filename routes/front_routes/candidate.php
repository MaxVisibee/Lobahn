<?php

Route::group(['middleware' => ['auth']], function () { 
    Route::get('home', [App\Http\Controllers\Candidate\CandidateController::class, 'dashboard'])->name('candidate.dashboard');
    Route::get('company/{id}', [App\Http\Controllers\Candidate\CandidateController::class, 'company'])->name('candidate.company');
    Route::get('profile', [App\Http\Controllers\Candidate\CandidateController::class, 'profile'])->name('candidate.profile');
    Route::get('profile-edit', [App\Http\Controllers\Candidate\CandidateController::class, 'edit'])->name('candidate.edit');
    Route::post('candidate-account-update', [App\Http\Controllers\Candidate\CandidateController::class, 'updateAccount'])->name('candidate.account.update');
    Route::post('candidate-repassword', [App\Http\Controllers\Candidate\CandidateController::class, 'updatePassword'])->name('candidate.repassword');
    Route::post('update-employment-description', [App\Http\Controllers\Candidate\CandidateController::class, 'description'])->name('candidate.description');
    Route::post('update-multi-field', [App\Http\Controllers\Candidate\CandidateController::class, 'keywords'])->name('candidate.keywords');
    Route::get('opportunity/{id}', [App\Http\Controllers\Candidate\CandidateController::class, 'opportunity'])->name('candidate.opportunity');
    Route::post('opportunity-connect', [App\Http\Controllers\Candidate\CandidateController::class, 'connect'])->name('candidate.opportunity.connect');
    Route::post('opportunity-delete', [App\Http\Controllers\Candidate\CandidateController::class, 'deleteOpportunity'])->name('candidate.opportunity.delete');

    // Edit 
    Route::post('add-employment-history', [App\Http\Controllers\Candidate\EmploymentHistoryController::class, 'add'])->name('candidate.history.add');
    Route::post('delete-employment-history', [App\Http\Controllers\Candidate\EmploymentHistoryController::class, 'delete'])->name('candidate.history.delete');
    Route::post('update-employment-history', [App\Http\Controllers\Candidate\EmploymentHistoryController::class, 'update'])->name('candidate.history.update');
    Route::post('add-education-history', [App\Http\Controllers\Candidate\CandidateController::class, 'addEducation'])->name('candidate.education');
    Route::post('update-education-history', [App\Http\Controllers\Candidate\CandidateController::class, 'updateEducation'])->name('candidate.education.update');
    Route::post('delete-education-history', [App\Http\Controllers\Candidate\CandidateController::class, 'deleteEducation'])->name('candidate.education.delete');
    Route::post('cv-add', [App\Http\Controllers\Candidate\CandidateController::class, 'addCV'])->name('candidate.cv');
    Route::post('cv-delete', [App\Http\Controllers\Candidate\CandidateController::class, 'deleteCV'])->name('candidate.cvDel');
    Route::post('update-field', [App\Http\Controllers\Candidate\CandidateController::class, 'updateField'])->name('candidate.field.update');
    Route::get('account', [App\Http\Controllers\Candidate\CandidateController::class, 'account'])->name('candidate.account');
    Route::get('setting', [App\Http\Controllers\Candidate\CandidateController::class, 'setting'])->name('candidate.setting');
    Route::get('activity', [App\Http\Controllers\Candidate\CandidateController::class, 'activity'])->name('candidate.activity');
    Route::get('/password/reset/{token}', [App\Http\Controllers\Candidate\Auth\ResetPasswordController::class, 'showResetForm'])->name('candidate_password.reset');
    Route::post('/password/reset', [App\Http\Controllers\Candidate\Auth\ResetPasswordController::class, 'reset']);
});


Route::post('registered-dashboard', [App\Http\Controllers\Auth\RegisterController::class, 'registeredDashboard'])->name('registered.dashboard');
Route::post('registered-profile', [App\Http\Controllers\Auth\RegisterController::class, 'registeredProfile'])->name('registered.profile');
Route::post('update-viewcount',[App\Http\Controllers\Candidate\CandidateController::class, 'updateViewCount']);

