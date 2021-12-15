<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Payment\StripePaymentController;
use App\Http\Controllers\Payment\PayPalController;
use App\Http\Controllers\Payment\PaymentController;
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

Auth::routes();

/* * ******** Company Auth ************ */

include_once($real_path . 'company_auth.php');

/* * ******** Admin Auth ************ */

include_once($real_path . 'admin_auth.php');

/* * ******** CandidateController ************ */

include_once($real_path . 'candidate.php');

// Signup form and store
Route::get('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'selectSignup'])->name('signup');
Route::get('/signup-talent', [App\Http\Controllers\Company\Auth\RegisterController::class, 'signupTalent'])->name('signup_talent');
Route::post('/signup-talent-store', [App\Http\Controllers\Company\Auth\RegisterController::class, 'signupTalentStore'])->name('signup_talent_store');
Route::get('/signup-career-opportunities', [App\Http\Controllers\Auth\RegisterController::class, 'signupCareerOpportunities'])->name('signup_career_opportunities');
Route::post('/career-store', [App\Http\Controllers\Auth\RegisterController::class, 'careerStore'])->name('career_store');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/search/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'searchEmail'])->name('search.email');

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//For Frontend
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');
Route::get('/news', [App\Http\Controllers\FrontendController::class, 'news'])->name('news');
Route::get('/news/{id}','App\Http\Controllers\FrontendController@newsDetails')->name('newsDetails');
Route::get('/partners','App\Http\Controllers\FrontendController@partners')->name('partners');
Route::get('/faqs','App\Http\Controllers\FrontendController@faq')->name('faq');
Route::get('/privacy','App\Http\Controllers\FrontendController@privacy')->name('privacy');
Route::get('/terms','App\Http\Controllers\FrontendController@terms')->name('terms');
Route::get('/community','App\Http\Controllers\FrontendController@community')->name('community');
Route::get('/events', [App\Http\Controllers\FrontendController::class, 'events'])->name('events');
Route::get('/event/{id}','App\Http\Controllers\FrontendController@eventDetails')->name('eventDetails');

//Reset Password
Route::get('/pswforgot', [App\Http\Controllers\FrontendController::class, 'pswforgot'])->name('pswforgot');
Route::post('/doForgotPassword', [App\Http\Controllers\FrontendController::class, 'doForgotPassword'])->name('doForgotPassword');

Route::get('/pswreset/{code}', [App\Http\Controllers\FrontendController::class, 'pswreset'])->name('pswreset');
Route::post('/doResetPassword', [App\Http\Controllers\FrontendController::class, 'doResetPassword'])->name('doResetPassword');

//Corporate Member
Route::get('/corporate_members', [App\Http\Controllers\CorporateController::class, 'index'])->name('corporate_members');
Route::get('/job_details', [App\Http\Controllers\CorporateController::class, 'jobDetails'])->name('job_details');
Route::get('/member_profile', [App\Http\Controllers\CorporateController::class,'memberProfile'])->name('member-profile');
Route::get('/premium_plan', [App\Http\Controllers\CorporateController::class,'premiumPlan'])->name('premium_plan');
Route::get('/company_profile', [App\Http\Controllers\CorporateController::class,'companyProfile'])->name('company_profile');
Route::get('/profile_edit', [App\Http\Controllers\CorporateController::class,'profileEdit'])->name('profile_edit');
Route::get('/company_account', [App\Http\Controllers\CorporateController::class,'companyAccount'])->name('company_account');
Route::get('/company_invoice', [App\Http\Controllers\CorporateController::class,'companyInvoice'])->name('company_invoice');
Route::get('/search', [App\Http\Controllers\CorporateController::class,'search'])->name('search');

//For Payment
Route::get('/payment',[PaymentController::class, 'payment'])->name('payment');
// Stripe - Pay
Route::post('stripe', [PaymentController::class, 'stripePay'])->name('stripe.pay');
// Paypal
Route::get('process-transaction', [PaymentController::class, 'paypalProcessTransaction'])->name('paypalProcessTransaction');
Route::get('success-transaction', [PaymentController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PaymentController::class, 'cancelTransaction'])->name('cancelTransaction');
// Apple - Pay
Route::get('applepay-transaction', [PaymentController::class, 'applepayTransaction'])->name('applepay-transaction');

