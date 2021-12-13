<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\OpportunityController;
use App\Http\Controllers\Admin\JobTypeController;
use App\Http\Controllers\Admin\JobSkillController;
use App\Http\Controllers\Admin\JobExperienceController;
use App\Http\Controllers\Admin\JobShiftController;
use App\Http\Controllers\Admin\JobTitleController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\JobApplyController;
use App\Http\Controllers\Admin\FunctionalAreaController;
use App\Http\Controllers\Admin\DegreeLevelController;
use App\Http\Controllers\Admin\CarrierLevelController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\CommunityController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\StudyFieldController;
use App\Http\Controllers\Admin\SubSectorController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsEventController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\InstitutionController;
use App\Http\Controllers\Admin\GeographicalController;
use App\Http\Controllers\Admin\KeywordController;
use App\Http\Controllers\Admin\QualificationController;
use App\Http\Controllers\Admin\KeyStrengthController;
use App\Http\Controllers\Admin\TechKnowledgeController;
use App\Http\Controllers\Admin\JobFunctionController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\Admin\SiteSettingController;


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

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('/', [LoginController::class, 'showLogin']);
//     Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
//     Route::post('/login', [LoginController::class, 'login']);
//     Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//     Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
//     Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
//     Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
//     Route::post('/password/reset', [ResetPasswordController::class, 'reset']);
// });

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('admins', AdminController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('seekers', UserController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('industries', IndustryController::class);
    Route::resource('events', EventController::class);
    Route::resource('opportunities', OpportunityController::class);
    Route::resource('job_types', JobTypeController::class);
    Route::resource('job_experiences', JobExperienceController::class);
    Route::resource('job_skills', JobSkillController::class);
    Route::resource('job_shifts', JobShiftController::class);
    Route::resource('job_titles', JobTitleController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('job_applies', JobApplyController::class);
    Route::resource('degree_levels', DegreeLevelController::class);
    Route::resource('carrier_levels', CarrierLevelController::class);
    Route::resource('functional_areas', FunctionalAreaController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('privacies', PrivacyController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('payment_methods', PaymentMethodController::class);
    Route::resource('study_fields', StudyFieldController::class);
    Route::resource('sub_sectors', SubSectorController::class);
    Route::resource('news_categories', NewsCategoryController::class);
    Route::resource('news_events', NewsEventController::class);
    Route::resource('institutions', InstitutionController::class);
    Route::resource('keywords', KeywordController::class);
    Route::resource('geographicals', GeographicalController::class);
    Route::resource('qualifications', QualificationController::class);
    Route::resource('tech_knowledges', TechKnowledgeController::class);
    Route::resource('key_strengths', KeyStrengthController::class);
    Route::resource('job_functions', JobFunctionController::class);
    Route::resource('specialities', SpecialityController::class);

    // Mail Send
    Route::get('mail', [MailController::class, 'index'])->name('mail.index');
    Route::post('mail', [MailController::class, 'sendMail'])->name('mail.index');

    //For Autoget Areas and Districts
    Route::get('opportunities/countries/{id}', ['as'=>'opportunities.country','uses'=>'App\Http\Controllers\Admin\OpportunityController@getArea']);
    Route::get('/opportunities/areas/{id}', [OpportunityController::class, 'getDistrict']);

    Route::resource('languages', LanguageController::class);
    Route::resource('news', NewsController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('terms', TermController::class);
    Route::resource('communities', CommunityController::class);
    
    Route::get('edit-site-settings', [SiteSettingController::class, 'edit'])->name('site-settings.edit');
    Route::post('site-settings/{id}', [SiteSettingController::class, 'update'])->name('site-settings.update');
    Route::patch('site-settings/{id}', [SiteSettingController::class, 'update'])->name('site-settings.update');

    //Delete Mulitiimage for Community
    Route::post('communities/images/{id}', [App\Http\Controllers\Admin\CommunityController::class, 'deleteimage']);
});
