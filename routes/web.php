<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Backend\DashboardController;

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

$real_path = realpath(__DIR__) . DIRECTORY_SEPARATOR . 'front_routes' . DIRECTORY_SEPARATOR;

/* * ******** Verification ******* */

Route::get('email-verification/error', [App\Http\Controllers\Company\Auth\RegisterController::class, 'getVerificationError'])->name('email-verification.error');

Route::get('email-verification/check/{token}', [App\Http\Controllers\Auth\RegisterController::class, 'getVerification'])->name('email-verification.check');

Route::get('company-email-verification/error', [App\Http\Controllers\Company\Auth\RegisterController::class, 'getVerificationError'])->name('company.email-verification.error');

Route::get('company-email-verification/check/{token}', [App\Http\Controllers\Company\Auth\RegisterController::class, 'getVerification'])->name('company.email-verification.check');

/* * ***************************** */

// ajax route
Route::get('filter-states', [App\Http\Controllers\AjaxController::class, 'filterStates'])->name('filter.states');
Route::get('filter-cities', [App\Http\Controllers\AjaxController::class, 'filterCities'])->name('filter.cities');
Route::get('filter-sectors', [App\Http\Controllers\AjaxController::class, 'filterSectors'])->name('filter.sectors');

/* * ******** CompanyController ************ */

include_once($real_path . 'company.php');

// Auth::routes();
Auth::routes(['verify' => true]);

/* * ******** Company Auth ************ */

include_once($real_path . 'company_auth.php');

/* * ******** Admin Auth ************ */

include_once($real_path . 'admin_auth.php');

// Signup form and store
Route::get('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'selectSignup'])->name('signup');
Route::get('/signup-talent', [App\Http\Controllers\Auth\RegisterController::class, 'signupTalent'])->name('signup_talent');
Route::get('/signup-career-opportunities', [App\Http\Controllers\Auth\RegisterController::class, 'signupCareerOpportunities'])->name('signup_career_opportunities');

Route::post('/signup-talent-store', [App\Http\Controllers\Company\Auth\RegisterController::class, 'signupTalentStore'])->name('signup_talent_store');
Route::post('/career-opportunities-store', [App\Http\Controllers\Auth\RegisterController::class, 'careerOpportunitiesStore'])->name('career_opportunities_store');

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//For Frontend
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');
Route::get('/news', [App\Http\Controllers\FrontendController::class, 'news'])->name('news');
Route::get('/news/{id}','App\Http\Controllers\FrontendController@newsDetails')->name('newsDetails');
Route::get('/faqs','App\Http\Controllers\FrontendController@faq')->name('faq');
Route::get('/privacy','App\Http\Controllers\FrontendController@privacy')->name('privacy');
Route::get('/terms','App\Http\Controllers\FrontendController@terms')->name('terms');
Route::get('/community','App\Http\Controllers\FrontendController@community')->name('community');
Route::get('/events', [App\Http\Controllers\FrontendController::class, 'events'])->name('events');
Route::get('/event/{id}','App\Http\Controllers\FrontendController@eventDetails')->name('eventDetails');

//Reset Password

Route::get('/pswforgot', [App\Http\Controllers\FrontendController::class, 'pswforgot'])->name('pswforgot');
Route::post('/pwreset', [App\Http\Controllers\FrontendController::class, 'pwreset'])->name('pwreset');