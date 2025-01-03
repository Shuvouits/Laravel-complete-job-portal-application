<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\admin\Auth\NewPasswordController;
use App\Http\Controllers\admin\Auth\PasswordController;
use App\Http\Controllers\admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\admin\Auth\RegisteredUserController;
use App\Http\Controllers\admin\Auth\VerifyEmailController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\ClearDatabaseController;
use App\Http\Controllers\admin\CounterController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\CustomPageBuilderController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\EducationController;
use App\Http\Controllers\admin\FooterController;
use App\Http\Controllers\admin\HeroController;
use App\Http\Controllers\Admin\IndustryTypeController;

use App\Http\Controllers\admin\JobCategoryController;
use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\JobExperienceController;
use App\Http\Controllers\admin\JobLocationController;
use App\Http\Controllers\admin\JobRolesController;
use App\Http\Controllers\admin\JobTypesController;
use App\Http\Controllers\admin\LanguageController;
use App\Http\Controllers\admin\LearnMoreController;
use App\Http\Controllers\admin\MenuBuilderController;
use App\Http\Controllers\admin\NewsletterController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\OrganizationTypesController;
use App\Http\Controllers\admin\payment\PaymentSettingController;
use App\Http\Controllers\Admin\plan\PlanController;
use App\Http\Controllers\admin\ProfessionController;
use App\Http\Controllers\admin\ProfileUpdateController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\RolePermissionController;
use App\Http\Controllers\admin\RoleUserController;
use App\Http\Controllers\admin\SalaryTypeController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\SocialController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\WhyChooseUs;
use App\Http\Controllers\admin\WhyChooseUsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    /*Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard'); */

    /** Profile update routes */
    Route::get('profile', [ProfileUpdateController::class, 'index'])->name('profile.index');
    Route::post('profile', [ProfileUpdateController::class, 'update'])->name('profile.update');
    Route::post('profile-password', [ProfileUpdateController::class, 'passwordUpdate'])->name('profile-password.update');

     /** Dashboard Route */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::resource('industry-types', IndustryTypeController::class);
    Route::resource('organization-types', OrganizationTypesController::class);

    Route::resource('countries', CountryController::class);
    Route::resource('states', StateController::class);
    Route::resource('cities', CityController::class);

    Route::get('/get-states/{id}', [CityController::class, 'GetState']);
    Route::get('/get-cities/{id}', [CityController::class, 'GetCities']);
    Route::resource('language', LanguageController::class);
    Route::resource('profession', ProfessionController::class);
    Route::resource('skill', SkillController::class);

    Route::resource('plans', PlanController::class);
    Route::get('payment-settings', [PaymentSettingController::class, 'index'])->name('payment-settings.index');
    Route::post('paypal-settings', [PaymentSettingController::class, 'updatePaypalSetting'])->name('paypal-settings.update');
    Route::post('stripe-settings', [PaymentSettingController::class, 'updateStripeSetting'])->name('stripe-settings.update');
    Route::post('razorpay-settings', [PaymentSettingController::class, 'updateRazorpaySetting'])->name('razorpay-settings.update');

    /*Site Setting Controller */
    Route::get('site-settings', [SiteSettingController::class, 'index'])->name('site-settings.index');
    Route::post('general-settings', [SiteSettingController::class, 'updateGeneralSetting'])->name('general-settings.update');
    Route::post('logo-settings', [SiteSettingController::class, 'updateLogoSetting'])->name('logo-settings.update');

    //orders controller
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/invoice/{id}', [OrderController::class, 'invoice'])->name('orders.invoice');

    /** Job Routes */
    Route::resource('job-categories', JobCategoryController::class);

    /** Job Eduction Routes */
    Route::resource('educations', EducationController::class);

    /** Job Type Routes */
    Route::resource('job-types', JobTypesController::class);

    /** Salary Type Routes */
    Route::resource('salary-types', SalaryTypeController::class);

    /** Tags Routes */
    Route::resource('tags', TagController::class);

    /** Job Roles Routes */
    Route::resource('job-roles', JobRolesController::class);

    /** Job Experience Routes */
    Route::resource('job-experiences', JobExperienceController::class);

    /** Job Post Routes */
    Route::resource('jobs', JobController::class);

    /** Jobs  */
    Route::post('job-status/{id}', [JobController::class, 'changeStatus'])->name('job-status.update');

    /** Blogs */
    Route::resource('blogs', BlogController::class);

    /** Hero Section */
    Route::resource('hero', HeroController::class);

    /** Why Choose Us Section */
    Route::resource('why-choose-us', WhyChooseUsController::class);

    Route::resource('learn-more', LearnMoreController::class);

    /** Counter Section */
    Route::resource('counter', CounterController::class);
    /** Job Location Section */
    Route::resource('job-location', JobLocationController::class);
    /** review Section */
    Route::resource('reviews', ReviewController::class);

    /** About us page route */
    Route::resource('about-us', AboutController::class);

    /** Custom Page Builder route */
    Route::resource('page-builder', CustomPageBuilderController::class);

    /** Newsletter route */
    Route::get('newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
    Route::delete('newsletter/{id}', [NewsletterController::class, 'destroy'])->name('newsletter.destroy');
    Route::post('newsletter', [NewsletterController::class, 'sendMail'])->name('newsletter-send-mail');

     /** Menu Builder route */
     Route::resource('menu-builder', MenuBuilderController::class);

      /** Footer route */
    Route::resource('footer', FooterController::class);

     /** Social Icon route */
     Route::resource('social-icon', SocialController::class);

     /**Clear Database */

     Route::get('clear-database', [ClearDatabaseController::class, 'index'])->name('clear-database.index');
     Route::post('clear-database', [ClearDatabaseController::class, 'clearDatabase'])->name('clear-database');

      /** role permission route */
    Route::resource('role', RolePermissionController::class);
    /** role user route */
    Route::resource('role-user', RoleUserController::class);


});
