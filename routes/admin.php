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
use App\Http\Controllers\Admin\MetaController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CareerPartnerController;
use App\Http\Controllers\Admin\ConnectController;
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
use App\Http\Controllers\Admin\JobTitleCategoryController;
use App\Http\Controllers\Admin\LanguageLevelsController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\PeopleManagementController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\TargetPayController;
use App\Http\Controllers\Admin\SuitabilityRatioController;
use App\Http\Controllers\Admin\TalentDiscoveryController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\PaymentController;

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('admins', AdminController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::get('seekers/lock/{seeker}',[UserController::class,'handleLock'])->name('seekers.lock');
    Route::resource('seekers', UserController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('payments', PaymentController::class, ['only' => ['index', 'show']]);
    Route::get('payments/charge/{id}', [PaymentController::class, 'charge'])->name('payments.charge');
    Route::get('payments/refund/{id}', [PaymentController::class, 'refund'])->name('payments.refund');
    Route::resource('packages', PackageController::class);
    Route::resource('industries', IndustryController::class);
    Route::resource('events', EventController::class);
    Route::resource('opportunities', OpportunityController::class);
    Route::resource('job_types', JobTypeController::class);
    Route::resource('job_experiences', JobExperienceController::class);
    Route::post('sort_job_experiences/{id}', [JobExperienceController::class, 'sortjobexperiences']);
    Route::resource('job_skills', JobSkillController::class);
    Route::resource('job_shifts', JobShiftController::class);
    Route::resource('job_titles', JobTitleController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('districts', DistrictController::class);
    Route::get('districts/{id}/delete', [DistrictController::class, 'destroy']);
    Route::resource('job_applies', JobApplyController::class);
    Route::resource('degree_levels', DegreeLevelController::class);
    Route::post('sort-degree-level/{id}', [DegreeLevelController::class, 'sortdegreelevel']);
    Route::resource('carrier_levels', CarrierLevelController::class);
    Route::post('sort-carrier_levels/{id}', [CarrierLevelController::class, 'sortcarrierlevels']);
    Route::resource('functional_areas', FunctionalAreaController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('privacies', PrivacyController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('meta', MetaController::class);
    Route::resource('payment_methods', PaymentMethodController::class);
    Route::resource('study_fields', StudyFieldController::class);
    Route::resource('sub_sectors', SubSectorController::class);
    Route::resource('news_categories', NewsCategoryController::class);
    Route::resource('news_events', NewsEventController::class);
    Route::post('news_events/img-upload', [NewsEventController::class,'imgUpload']);
    Route::resource('institutions', InstitutionController::class);
    Route::resource('keywords', KeywordController::class);
    Route::resource('geographicals', GeographicalController::class);
    Route::resource('qualifications', QualificationController::class);
    Route::resource('tech_knowledges', TechKnowledgeController::class);
    Route::resource('key_strengths', KeyStrengthController::class);
    Route::resource('job_functions', JobFunctionController::class);
    Route::resource('specialities', SpecialityController::class);
    Route::resource('target_pays', TargetPayController::class);
    Route::resource('suitability-ratios', SuitabilityRatioController::class);
    Route::resource('people-management', PeopleManagementController::class);
    Route::post('sort-people-management/{id}', [PeopleManagementController::class, 'sortpeoplemanagement']);
    Route::resource('language-levels', LanguageLevelsController::class);
    Route::post('sort-language-levels/{id}', [LanguageLevelsController::class, 'sortLanguageLevels']);
    Route::resource('job-title-categories', JobTitleCategoryController::class);

    // Mail Send
    Route::get('mail', [MailController::class, 'index'])->name('mail.index');
    Route::post('mail', [MailController::class, 'sendMail'])->name('mail.send');
    Route::post('mail-analysis', [MailController::class, 'analysis'])->name('mail.analysis');
    Route::get('mail-export', [MailController::class, 'export'])->name('mail.export');

    Route::get('manual-mail', [MailController::class, 'manual'])->name('mail.manual');
    Route::post('manual-mail', [MailController::class, 'sendManual'])->name('send.manual');

    Route::get('activity-log', [ActivityLogController::class, 'index'])->name('activitylog');

    Route::get('check',[MailController::class, 'check']);

    //For Autoget Areas and Districts
    Route::get('opportunities/countries/{id}', ['as'=>'opportunities.country','uses'=>'App\Http\Controllers\Admin\OpportunityController@getArea']);
    Route::get('/opportunities/areas/{id}', [OpportunityController::class, 'getDistrict']);

    Route::resource('languages', LanguageController::class);
    Route::resource('news', NewsController::class);
    Route::post('news/img-upload',[NewsController::class,'imgUpload']);
    Route::resource('banners', BannerController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('terms', TermController::class);
    Route::resource('communities', CommunityController::class);
    Route::post('communities/approve',[CommunityController::class, 'approve'])->name('communities.approve');
    Route::post('communities/un-approve',[CommunityController::class, 'unApprove'])->name('communities.unapprove');
    
    Route::get('edit-site-settings', [SiteSettingController::class, 'edit'])->name('site-settings.edit');
    Route::post('site-settings/{id}', [SiteSettingController::class, 'update'])->name('site-settings.update');
    Route::patch('site-settings/{id}', [SiteSettingController::class, 'update'])->name('site-settings.update');
    Route::get('edit-payment', [SiteSettingController::class, 'payment'])->name('edit-payment.index');
    Route::patch('edit-payment/{id}', [SiteSettingController::class, 'paymentUpdate'])->name('edit-payment.update');
    Route::get('edit-payment', [SiteSettingController::class, 'payment'])->name('edit-payment.index');
    Route::patch('edit-payment/{id}', [SiteSettingController::class, 'paymentUpdate'])->name('edit-payment.update');

    Route::get('edit-talent-discovery', [TalentDiscoveryController::class, 'edit'])->name('talent-discovery.edit');
    Route::post('talent-discovery/{id}', [TalentDiscoveryController::class, 'update'])->name('talent-discovery.update');
    Route::patch('talent-discovery/{id}', [TalentDiscoveryController::class, 'update'])->name('talent-discovery.update');

    Route::get('edit-career-partner', [CareerPartnerController::class, 'edit'])->name('career-partner.edit');
    Route::post('career-partner/{id}', [CareerPartnerController::class, 'update'])->name('career-partner.update');
    Route::patch('career-partner/{id}', [CareerPartnerController::class, 'update'])->name('career-partner.update');

    Route::get('edit-connect', [ConnectController::class, 'edit'])->name('connect.edit');
    Route::post('connect/{id}', [ConnectController::class, 'update'])->name('connect.update');
    Route::patch('connect/{id}', [ConnectController::class, 'update'])->name('connect.update');

    Route::get('edit-membership', [MembershipController::class, 'edit'])->name('membership.edit');
    Route::post('membership/{id}', [MembershipController::class, 'update'])->name('membership.update');
    Route::patch('membership/{id}', [MembershipController::class, 'update'])->name('membership.update');
    

    //Delete Mulitiimage for Community
    Route::post('communities/images/{id}', [App\Http\Controllers\Admin\CommunityController::class, 'deleteimage']);

    Route::post('sortBanner/{id}', [BannerController::class, 'sortBanner']);
    Route::post('sortPartner/{id}', [PartnerController::class, 'sortPartner']);
    Route::post('approved/{id}', [CommunityController::class, 'approved']);

    Route::get('cv-delete/{cv_id}', [UserController::class, 'cvDelete'])->name('cv-delete');

    Route::get('countries/export/data', [CountryController::class, 'exportExcel'])->name('countries.export');
    Route::post('countries/import', [CountryController::class, 'importExcel'])->name('countries.import');
    Route::get('job_types/export/data', [JobTypeController::class, 'exportExcel'])->name('job_types.export');
    Route::post('job_types/import', [JobTypeController::class, 'importExcel'])->name('job_types.import');
    Route::get('job_shifts/export/data', [JobShiftController::class, 'exportExcel'])->name('job_shifts.export');
    Route::post('job_shifts/import', [JobShiftController::class, 'importExcel'])->name('job_shifts.import');
    Route::get('keywords/export/data', [KeywordController::class, 'exportExcel'])->name('keywords.export');
    Route::post('keywords/import', [KeywordController::class, 'importExcel'])->name('keywords.import');
    Route::get('carrier_levels/export/data', [CarrierLevelController::class, 'exportExcel'])->name('carrier_levels.export');
    Route::post('carrier_levels/import', [CarrierLevelController::class, 'importExcel'])->name('carrier_levels.import');
    Route::get('job_experiences/export/data', [JobExperienceController::class, 'exportExcel'])->name('job_experiences.export');
    Route::post('job_experiences/import', [JobExperienceController::class, 'importExcel'])->name('job_experiences.import');
    Route::get('degree_levels/export/data', [DegreeLevelController::class, 'exportExcel'])->name('degree_levels.export');
    Route::post('degree_levels/import', [DegreeLevelController::class, 'importExcel'])->name('degree_levels.import');
    Route::get('languages/export/data', [LanguageController::class, 'exportExcel'])->name('languages.export');
    Route::post('languages/import', [LanguageController::class, 'importExcel'])->name('languages.import');
    Route::get('institutions/export/data', [InstitutionController::class, 'exportExcel'])->name('institutions.export');
    Route::post('institutions/import', [InstitutionController::class, 'importExcel'])->name('institutions.import');
    Route::get('geographicals/export/data', [GeographicalController::class, 'exportExcel'])->name('geographicals.export');
    Route::post('geographicals/import', [GeographicalController::class, 'importExcel'])->name('geographicals.import');
    Route::get('job_skills/export/data', [JobSkillController::class, 'exportExcel'])->name('job_skills.export');
    Route::post('job_skills/import', [JobSkillController::class, 'importExcel'])->name('job_skills.import');
    Route::get('qualifications/export/data', [QualificationController::class, 'exportExcel'])->name('qualifications.export');
    Route::post('qualifications/import', [QualificationController::class, 'importExcel'])->name('qualifications.import');
    Route::get('key_strengths/export/data', [KeyStrengthController::class, 'exportExcel'])->name('key_strengths.export');
    Route::post('key_strengths/import', [KeyStrengthController::class, 'importExcel'])->name('key_strengths.import');
    Route::get('job_titles/export/data', [JobTitleController::class, 'exportExcel'])->name('job_titles.export');
    Route::post('job_titles/import', [JobTitleController::class, 'importExcel'])->name('job_titles.import');
    Route::get('industries/export/data', [IndustryController::class, 'exportExcel'])->name('industries.export');
    Route::post('industries/import', [IndustryController::class, 'importExcel'])->name('industries.import');
    Route::get('sub_sectors/export/data', [SubSectorController::class, 'exportExcel'])->name('sub_sectors.export');
    Route::post('sub_sectors/import', [SubSectorController::class, 'importExcel'])->name('sub_sectors.import');
    Route::get('functional_areas/export/data', [FunctionalAreaController::class, 'exportExcel'])->name('functional_areas.export');
    Route::post('functional_areas/import', [FunctionalAreaController::class, 'importExcel'])->name('functional_areas.import');
    Route::get('specialities/export/data', [SpecialityController::class, 'exportExcel'])->name('specialities.export');
    Route::post('specialities/import', [SpecialityController::class, 'importExcel'])->name('specialities.import');

    //Delete Language
    Route::post('opportunities/addons/{id}',[OpportunityController::class, 'deleteLang']);
    //Check Delete Opportunities
    Route::post('opportunities/destroy',[OpportunityController::class, 'destroyAll']);
    //Check Delete Seekers
    Route::post('seekers/destroy-all', [UserController::class, 'destroyAll']);
    //Check Delete Company
    Route::post('companies/destroy-all', [CompanyController::class, 'destroyAll']);
});