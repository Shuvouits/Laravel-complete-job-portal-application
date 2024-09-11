<?php


use App\Http\Controllers\admin\payment\PaymentSettingController;
use App\Http\Controllers\candidate\CandidateAccountSettingController;
use App\Http\Controllers\candidate\CandidatePageController;
use App\Http\Controllers\candidate\CandidateProfileController;
use App\Http\Controllers\CandidateEducationController;
use App\Http\Controllers\company\CompanyPageController;
use App\Http\Controllers\company\CompanyProfileController;
use App\Http\Controllers\frontend\AboutUsPageController;
use App\Http\Controllers\frontend\CandidateExperienceController;
use App\Http\Controllers\frontend\CandidateJobBookmarkController;
use App\Http\Controllers\frontend\CandidateMyJobController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\CompanyOrderController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\FrontendBlogPageController;
use App\Http\Controllers\frontend\FrontendCandidatePageController;
use App\Http\Controllers\frontend\FrontendCompanyPageController;
use App\Http\Controllers\frontend\FrontendJobPageController;
use App\Http\Controllers\frontend\JobController;
use App\Http\Controllers\frontend\PlanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'Index']);

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

Route::group(
    ['middleware' => ['auth', 'verified', 'user.role:candidate'], 'prefix' => 'candidate', 'as' => 'candidate.'],
    function () {

        Route::get('/dashboard', function () {
            return view('frontend.candidate-dashboard.dashboard');
        })->name('dashboard');

        Route::get('/profile', [CandidateProfileController::class, 'CandidateProfile'])->name('profile.index');
        Route::post('/basic-info', [CandidateProfileController::class, 'BasicInfo'])->name('basic-info');
        Route::post('/profile-info', [CandidateProfileController::class, 'ProfileInfo'])->name('profile-info');
        Route::resource('experience', CandidateExperienceController::class);
        Route::resource('education', CandidateEducationController::class);
        Route::get('/get-state/{id}', [CandidateAccountSettingController::class, 'GetState']);
        Route::get('/get-cities/{id}', [CandidateAccountSettingController::class, 'GetCities']);
        Route::post('/account-info-update', [CandidateAccountSettingController::class, 'AccountInfoUpdate']);
        Route::post('/email-changed', [CandidateAccountSettingController::class, 'EmailChanged']);
        Route::post('/password-changed', [CandidateAccountSettingController::class, 'PasswordChanged']);

        /** my job routes */
        Route::get('applied-jobs', [CandidateMyJobController::class, 'index'])->name('applied-jobs.index');
        Route::get('bookmarked-jobs', [CandidateJobBookmarkController::class, 'index'])->name('bookmarked-jobs.index');

    }
);

Route::group(
    [
        'middleware' => ['auth', 'verified', 'user.role:company'],
        'prefix' => 'company',
        'as' => 'company.'
    ],

    function () {

        Route::get('/dashboard', function () {
            return view('frontend.company-dashboard.dashboard');
        })->name('dashboard');
        Route::get('/profile', [CompanyProfileController::class, 'CompanyProfile'])->name('profile');
        Route::post('/company-info', [CompanyProfileController::class, 'CompanyInfo'])->name('company-info');
        Route::post('/founding-info', [CompanyProfileController::class, 'FoundingInfo'])->name('founding-info');
        Route::post('/account-info', [CompanyProfileController::class, 'AccountInfo'])->name('account-info');
        Route::post('/password-info', [CompanyProfileController::class, 'PasswordInfo'])->name('password-info');

        Route::get('/get-states/{id}', [LocationController::class, 'GetState']);
        Route::get('/get-cities/{id}', [LocationController::class, 'GetCity']);

        Route::get('/all-cities', [LocationController::class, 'AllCity']);

        /** Job Routes */
        Route::get('applications/{id}', [JobController::class, 'applications'])->name('job.applications');
        Route::resource('jobs', JobController::class);

        //Payment
        Route::get('payment/success', [PaymentSettingController::class, 'paymentSuccess'])->name('payment.success');
        Route::get('payment/error', [PaymentSettingController::class, 'paymentError'])->name('payment.error');

        //paypal
        Route::get('paypal/payment', [PaymentSettingController::class, 'payWithPaypal'])->name('paypal.payment');
        Route::get('paypal/success', [PaymentSettingController::class, 'paypalSuccess'])->name('paypal.success');
        Route::get('paypal/cancel', [PaymentSettingController::class, 'paypalCancel'])->name('paypal.cancel');

        //stripe
        Route::get('stripe/payment', [PaymentSettingController::class, 'payWithStripe'])->name('stripe.payment');
        Route::get('stripe/success', [PaymentSettingController::class, 'stripeSuccess'])->name('stripe.success');
        Route::get('stripe/cancel', [PaymentSettingController::class, 'stripeCancel'])->name('stripe.cancel');


        //razorpay
        Route::get('razorpay-redirect', [PaymentSettingController::class, 'razorpayRedirect'])->name('razorpay-redirect');
        Route::post('razorpay/payment', [PaymentSettingController::class, 'payWithRazorpay'])->name('razorpay.payment');

        /** Order Routes */
        Route::get('orders', [CompanyOrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{id}', [CompanyOrderController::class, 'show'])->name('orders.show');
        Route::get('orders/invoice/{id}', [CompanyOrderController::class, 'invoice'])->name('orders.invoice');



    }
);

Route::get('/companies', [FrontendCompanyPageController::class, 'index'])->name('companies.index');
Route::get('/companies/{slug}', [CompanyPageController::class, 'shows'])->name('companies.show');


Route::get('/candidate', [FrontendCandidatePageController::class, 'index'])->name('candidates.index');
Route::get('candidates/{slug}', [FrontendCandidatePageController::class, 'show'])->name('candidates.show');

Route::get('/candidate/details/{slug}', [CandidatePageController::class, 'CandidateDetails']);

Route::get('/pricing-plan', [PlanController::class, 'AllPlan']);
Route::get('/checkout/{id}', [CheckoutController::class, 'Checkout']);

//Find a job route
Route::get('jobs', [FrontendJobPageController::class, 'index'])->name('jobs.index');
Route::get('jobs/{slug}', [FrontendJobPageController::class, 'show'])->name('jobs.show');
Route::post('apply-job/{id}', [FrontendJobPageController::class, 'applyJob'])->name('apply-job.store');
Route::get('job-bookmark/{id}', [CandidateJobBookmarkController::class, 'save'])->name('job.bookmark');

/** Blog Routes */
Route::get('blogs', [FrontendBlogPageController::class, 'index'])->name('blogs.index');
Route::get('blogs/{slug}', [FrontendBlogPageController::class, 'show'])->name('blogs.show');

/** About Routes */
Route::get('about-us', [AboutUsPageController::class, 'index'])->name('about.index');


/** Count Routes */
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactController::class, 'sendMail'])->name('send-mail');
