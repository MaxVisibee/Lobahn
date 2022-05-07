<?php

use Illuminate\Support\Facades\Route;
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
Route::get('filter-cities-datatable', [App\Http\Controllers\AjaxController::class, 'filterCitiesDataTable'])->name('filter.cities.datatable');
Route::get('filter-sectors', [App\Http\Controllers\AjaxController::class, 'filterSectors'])->name('filter.sectors');

Auth::routes();

include_once($real_path . 'admin_auth.php');
include_once($real_path . 'company_auth.php');
include_once($real_path . 'company.php');
include_once($real_path . 'candidate.php');

Route::post('notification', [App\Http\Controllers\FrontendController::class, 'checkNotification'])->name('notification');

//For Frontend
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');

Route::get('/partners','App\Http\Controllers\FrontendController@partners')->name('partners');
Route::get('/faqs','App\Http\Controllers\FrontendController@faq')->name('faq');
Route::get('/privacy','App\Http\Controllers\FrontendController@privacy')->name('privacy');
Route::get('/terms','App\Http\Controllers\FrontendController@terms')->name('terms');

Route::get('/community','App\Http\Controllers\FrontendController@community')->name('community');
Route::get('/community/most-liked','App\Http\Controllers\FrontendController@communityMostLiked')->name('community.most.like');
Route::post('/community','App\Http\Controllers\FrontendController@communityPost')->name('community.post');
Route::get('/community/{title}/{id}','App\Http\Controllers\FrontendController@communityDetails')->name('community-details');
Route::post('/community/{title}/community-like', 'App\Http\Controllers\FrontendController@communityLike')->name('community.like');

Route::get('/news', [App\Http\Controllers\FrontendController::class, 'news'])->name('news');
Route::get('/news/{id}','App\Http\Controllers\FrontendController@newsDetails')->name('news-details');
Route::get('/news/{title}/{id}','App\Http\Controllers\FrontendController@newsDetails')->name('news-details');
Route::post('/news/{title}/news-like', 'App\Http\Controllers\FrontendController@newsLike')->name('news.like');

Route::get('/events', [App\Http\Controllers\FrontendController::class, 'events'])->name('events');
Route::get('/event/{id}','App\Http\Controllers\FrontendController@eventDetails')->name('eventDetails');
Route::get('/connect','App\Http\Controllers\FrontendController@connect')->name('connect');
Route::get('/services','App\Http\Controllers\FrontendController@service')->name('services');
Route::get('/individual-member-services','App\Http\Controllers\FrontendController@individualService')->name('individualService');
Route::get('/contact','App\Http\Controllers\FrontendController@contact')->name('contact');

Route::get('/about','App\Http\Controllers\FrontendController@about')->name('about');
Route::post('/save-contact', 'App\Http\Controllers\FrontendController@saveContact')->name('saveContact');
Route::post('/event-register', 'App\Http\Controllers\FrontendController@eventRegister')->name('eventRegister');
Route::get('search','App\Http\Controllers\FrontendController@search')->name('search');
Route::get('career-partner', 'App\Http\Controllers\FrontendController@partner')->name('career-partner');
Route::get('career-partner-parchase', 'App\Http\Controllers\FrontendController@partnerParchase')->name('career-partner-parchase');
Route::post('career-partner-parchase', 'App\Http\Controllers\FrontendController@partnerParchaseComplete')->name('career-partner.premium');
Route::get('talent-discovery', 'App\Http\Controllers\FrontendController@discovery')->name('talent-discovery');
Route::get('talent-discovery-parchase', 'App\Http\Controllers\FrontendController@discoveryParchase')->name('talent-discovery-parchase');
Route::post('talent-discovery-parchase', 'App\Http\Controllers\FrontendController@discoveryParchaseComplete')->name('talent-discovery.premium');

Route::group(['middleware' => ['guest']], function () {
  Route::get('/membership','App\Http\Controllers\FrontendController@membership')->name('membership');
  Route::get('/membership-corporate','App\Http\Controllers\FrontendController@corporateMembership')->name('membership.corporate');
  // Signup form and store
  Route::get('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'selectSignup'])->name('signup');
  Route::get('/signup-talent', [App\Http\Controllers\Company\Auth\RegisterController::class, 'signupTalent'])->name('signup_talent');
  Route::post('/signup-talent-store', [App\Http\Controllers\Company\Auth\RegisterController::class, 'signupTalentStore'])->name('signup_talent_store');
  Route::get('/signup-career-opportunities', [App\Http\Controllers\Auth\RegisterController::class, 'signupCareerOpportunities'])->name('signup_career_opportunities');
  Route::post('/career-store', [App\Http\Controllers\Auth\RegisterController::class, 'careerStore'])->name('career_store');
  Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');

  Route::post('/search/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'searchEmail'])->name('search.email');
});


Route::post('add-custom-input',[App\Http\Controllers\AjaxController::class,'saveCustomInput']);

//Reset Password
Route::get('/pswforgot', [App\Http\Controllers\FrontendController::class, 'pswforgot'])->name('pswforgot');
Route::post('/doForgotPassword', [App\Http\Controllers\FrontendController::class, 'doForgotPassword'])->name('doForgotPassword');

Route::get('/pswreset/{code}', [App\Http\Controllers\FrontendController::class, 'pswreset'])->name('pswreset');
Route::post('/doResetPassword', [App\Http\Controllers\FrontendController::class, 'doResetPassword'])->name('doResetPassword');

//For Payment
Route::get('/make-payment',[PaymentController::class,'paymentForm'])->name('make-payment');
Route::get('/invoice/{id}',[PaymentController::class, 'invoice'])->name('invoice');
Route::get('/payment',[PaymentController::class, 'payment'])->name('payment');
// Stripe - Pay
Route::post('stripe', [PaymentController::class, 'stripePay'])->name('stripe.pay');
Route::post('careerStripe', [PaymentController::class, 'careerStripePay'])->name('stripe.pay');

Route::post('google-pay', [PaymentController::class, 'googlePay'])->name('google.pay');
Route::post('google-pay/success', [PaymentController::class, 'googlePaySuccess'])->name('google.pay.success');

Route::get('refund/{id}', [PaymentController::class, 'refund'])->name('refund');
Route::get('charge/{id}', [PaymentController::class, 'charge'])->name('charge');

// Paypal
//Route::get('process-transaction', [PaymentController::class, 'paypalProcessTransaction'])->name('paypalProcessTransaction');
//Route::get('success-transaction', [PaymentController::class, 'successTransaction'])->name('successTransaction');
//Route::get('cancel-transaction', [PaymentController::class, 'cancelTransaction'])->name('cancelTransaction');
// Apple - Pay
//Route::get('applepay-transaction', [PaymentController::class, 'applepayTransaction'])->name('applepay-transaction');


//Route::get('ratio-calculation', [App\Http\Controllers\FrontendController::class, 'resetJobScoreData']);

Route::get("test",function(){

        


  //  $tsr_score = $psr_score = 0;
  //  $tsr_percent = $psr_percent = 0;
  //  $ratios = App\Models\SuitabilityRatio::get();
  //  $opportunity = App\Models\Opportunity::where('id',15)->first();
  //  $seeker = App\Models\User::where('id',3)->first();
  //  $matched_factors =[];

  // return $seeker->speciality(3)->speciality->speciality_name;

     
});




      