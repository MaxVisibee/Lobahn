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

// Signup form and store
Route::get('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'selectSignup'])->name('signup');
Route::get('/signup-talent', [App\Http\Controllers\Company\Auth\RegisterController::class, 'signupTalent'])->name('signup_talent');
Route::post('/signup-talent-store', [App\Http\Controllers\Company\Auth\RegisterController::class, 'signupTalentStore'])->name('signup_talent_store');
Route::get('/signup-career-opportunities', [App\Http\Controllers\Auth\RegisterController::class, 'signupCareerOpportunities'])->name('signup_career_opportunities');
Route::post('/career-store', [App\Http\Controllers\Auth\RegisterController::class, 'careerStore'])->name('career_store');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/search/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'searchEmail'])->name('search.email');

//For Frontend
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');
Route::get('/news', [App\Http\Controllers\FrontendController::class, 'news'])->name('news');
Route::get('/news/{id}','App\Http\Controllers\FrontendController@newsDetails')->name('news-details');
Route::get('/partners','App\Http\Controllers\FrontendController@partners')->name('partners');
Route::get('/faqs','App\Http\Controllers\FrontendController@faq')->name('faq');
Route::get('/privacy','App\Http\Controllers\FrontendController@privacy')->name('privacy');
Route::get('/terms','App\Http\Controllers\FrontendController@terms')->name('terms');
Route::get('/community','App\Http\Controllers\FrontendController@community')->name('community');
Route::post('/community','App\Http\Controllers\FrontendController@communityPost')->name('community.post');
Route::get('/community/{id}','App\Http\Controllers\FrontendController@communityDetails')->name('community-details');
Route::get('/events', [App\Http\Controllers\FrontendController::class, 'events'])->name('events');
Route::get('/event/{id}','App\Http\Controllers\FrontendController@eventDetails')->name('eventDetails');
Route::get('/connect','App\Http\Controllers\FrontendController@connect')->name('connect');
Route::get('/services','App\Http\Controllers\FrontendController@service')->name('services');
Route::get('/individual-member-services','App\Http\Controllers\FrontendController@individualService')->name('individualService');
Route::get('/contact','App\Http\Controllers\FrontendController@contact')->name('contact');
Route::get('/membership','App\Http\Controllers\FrontendController@membership')->name('membership');
Route::get('/membership-corporate','App\Http\Controllers\FrontendController@corporateMembership')->name('membership.corporate');
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


//Reset Password
Route::get('/pswforgot', [App\Http\Controllers\FrontendController::class, 'pswforgot'])->name('pswforgot');
Route::post('/doForgotPassword', [App\Http\Controllers\FrontendController::class, 'doForgotPassword'])->name('doForgotPassword');

Route::get('/pswreset/{code}', [App\Http\Controllers\FrontendController::class, 'pswreset'])->name('pswreset');
Route::post('/doResetPassword', [App\Http\Controllers\FrontendController::class, 'doResetPassword'])->name('doResetPassword');

//For Payment
Route::get('/invoice/{id}',[PaymentController::class, 'invoice'])->name('invoice');
Route::get('/payment',[PaymentController::class, 'payment'])->name('payment');
// Stripe - Pay
Route::post('stripe', [PaymentController::class, 'stripePay'])->name('stripe.pay');
Route::post('careerStripe', [PaymentController::class, 'careerStripePay'])->name('stripe.pay');

Route::post('google-pay', [PaymentController::class, 'googlePay'])->name('google.pay');
Route::post('google-pay/success', [PaymentController::class, 'googlePaySuccess'])->name('google.pay.success');

// Paypal
//Route::get('process-transaction', [PaymentController::class, 'paypalProcessTransaction'])->name('paypalProcessTransaction');
//Route::get('success-transaction', [PaymentController::class, 'successTransaction'])->name('successTransaction');
//Route::get('cancel-transaction', [PaymentController::class, 'cancelTransaction'])->name('cancelTransaction');
// Apple - Pay
//Route::get('applepay-transaction', [PaymentController::class, 'applepayTransaction'])->name('applepay-transaction');


Route::get('ratio-calculation', [App\Http\Controllers\FrontendController::class, 'ratioCalculation']);

Route::get("test",function(){

   $tsr_score = $psr_score = 0;
   $tsr_percent = $psr_percent = 0;
   $ratios = App\Models\SuitabilityRatio::get();
   $opportunity = App\Models\Opportunity::where('id',15)->first();
   $seeker = App\Models\User::where('id',3)->first();

   $seeker_languages = App\Models\LanguageUsage::where('user_id',$seeker->id)->get();
   $opportunity_languages = App\Models\LanguageUsage::where('job_id',$opportunity->id)->get();

   if( count($seeker_languages)== 0 || count($opportunity_languages)== 0 )
      {
         $tsr_score += $ratios[9]->talent_num;
         $psr_score += $ratios[9]->position_num;
         $tsr_percent += $ratios[9]->tsr_percent;
         $psr_percent += $ratios[9]->psr_percent;
      }
   else 
      {
         foreach($seeker_languages as $seeker_language)
         {
            foreach($opportunity_languages as $opportunity_language)
            {
               if($seeker_language->language_id ==  $opportunity_language->language_id &&  $seeker_language->level->priority >= $opportunity_language->level->priority)
               {
                     $tsr_score += $ratios[9]->talent_num;
                     $psr_score += $ratios[9]->position_num;
                     $tsr_percent += $ratios[9]->tsr_percent;
                     $psr_percent += $ratios[9]->psr_percent;
                     break 2;
               }
            }
         }
      }





   //   Target Pay Checked

   //   $is_null = false;
   //   $fulltime_status = $parttime_status = $freelance_status = $target_status = false;
   //   $fulltime_check = (is_null($seeker->full_time_salary) || is_null($opportunity->full_time_salary)) ?  true : false;
   //   $parttime_check = (is_null($seeker->part_time_salary) || is_null($opportunity->part_time_salary)) ?  true : false;
   //   $freelance_check = (is_null($seeker->freelance_salary) || is_null($opportunity->freelance_salary)) ?  true : false;
   //   $target_check = (is_null($seeker->target_salary) || is_null($opportunity->salary_to)) ?  true : false;
      
   //   $is_null = $fulltime_check && $parttime_check && $freelance_check && $target_check ?  true: false ;

   //   if($is_null)
   //   {
   //      echo "data empty";
   //       // Data Empty
   //       $tsr_percent += $ratios[2]->talent_percent;
   //       $psr_percent += $ratios[2]->position_percent; 
   //   }
   //   elseif( (!is_null($opportunity->full_time_salary) && !is_null($seeker->full_time_salary) ) &&  $opportunity->full_time_salary >= $seeker->full_time_salary )
   //   {
   //      echo "fulltime match";
   //       // Fulltime Salry Match
   //       $fulltime_status = true;
   //   }

   //   elseif( (!is_null($opportunity->part_time_salary) && !is_null($seeker->part_time_salary) ) && $opportunity->part_time_salary >= $seeker->part_time_salary )
   //   {
   //       echo "parttime match";
   //       // Parttime Salry Match
   //       $parttime_status = true;
   //   }

   //   elseif((!is_null($opportunity->freelance_salary) && !is_null($seeker->freelance_salary)) && $opportunity->freelance_salary >= $seeker->freelance_salary )
   //   {
   //       echo "freelance match";
   //       // Freelance Salry Match
   //       $freelance_status = true;   
   //   }

   //   elseif((!is_null($opportunity->salary_to) && !is_null($seeker->target_salary)) && $opportunity->salary_to >= $seeker->target_salary )
   //   {
   //       echo "target match";
   //       // Traget Salary Match
   //       $target_status = true;
   //   }

   //   if($fulltime_status || $parttime_status || $freelance_status || $target_status)
   //   {
   //      echo "one match";
   //       // At Least One Match
   //       $tsr_percent += $ratios[2]->tsr_percent;
   //       $psr_percent += $ratios[2]->psr_percent;
   //   }
   // else {
   //       echo "no one match";
   //  }

});





      