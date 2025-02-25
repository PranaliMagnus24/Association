<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mews\Captcha\Facades\Captcha;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Master_Settings\MembershiptypeController;
use App\Http\Controllers\Master_Settings\GeneralSettingController;
use App\Http\Controllers\Master_Settings\TechnologyController;
use App\Http\Controllers\Master_Settings\FeesController;
use App\Http\Controllers\Master_Settings\TaxController;
use App\Http\Controllers\Master_Settings\MembershipYearController;
use App\Http\Controllers\Master_Settings\EmailController;
use App\Http\Controllers\Membership_form\MembershipController;
use App\Http\Controllers\Membership_form\CompanyProfileController;
use App\Http\Controllers\Membership_form\MembershipPlanController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyRegistrationController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\JobController;
use App\Http\Controllers\Member\AdsManagerController;
use App\Http\Controllers\Member\CatalogController;
use App\Http\Controllers\Member\CatalogCategoryController;
use App\Http\Controllers\Events\EventController;
use App\Http\Controllers\Events\EventDetailsController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\QRCodePageController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\SubCategoryController;
use App\Http\Controllers\Category\SubSubCategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Form_Registration\RegistrationController;
use App\Http\Controllers\Bazar\BazarController;

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


Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
//Master Setting Membership
Route::get('membership', [MembershiptypeController::class, 'index'])->name('memberships.index');
Route::get('membership/add', [MembershiptypeController::class, 'add'])->name('membership.add');
Route::post('memberships', [MembershiptypeController::class, 'store'])->name('memberships.store');
Route::get('memberships/{id}/edit', [MembershiptypeController::class, 'edit'])->name('memberships.edit');
Route::put('memberships/{id}', [MembershiptypeController::class, 'update'])->name('memberships.update');
Route::delete('memberships/{id}', [MembershiptypeController::class, 'destroy'])->name('memberships.destroy');
Route::get('memberships/{id}', [MembershiptypeController::class, 'show'])->name('memberships.show');
Route::get('membership_search', [MembershiptypeController::class, 'membership_search']);

// Master Settings Technologies
Route::get('technologies', [TechnologyController::class, 'index'])->name('technology.index');
Route::get('technologies/add', [TechnologyController::class, 'add'])->name('technology.add');
Route::post('technologies', [TechnologyController::class, 'store'])->name('technology.store');
Route::get('technologies/{id}/edit', [TechnologyController::class, 'edit'])->name('technology.edit');
Route::post('technologies/{id}', [TechnologyController::class, 'update'])->name('technology.update');
Route::get('delete_technologies/{id}', [TechnologyController::class, 'delete'])->name('technology.delete');
Route::get('technologies/{id}', [TechnologyController::class, 'show'])->name('technology.show');
Route::get('technology_search', [TechnologyController::class, 'technology_search']);


//Master Setting Fees
Route::get('fees', [FeesController::class, 'index'])->name('fee.index');
Route::get('fees/add', [FeesController::class, 'add'])->name('fee.add');
Route::post('fees', [FeesController::class, 'store'])->name('fee.store');
Route::get('fees/{id}/edit', [FeesController::class, 'edit'])->name('fee.edit');
Route::post('fees/{id}', [FeesController::class, 'update'])->name('fee.update');
Route::get('delete_fee/{id}', [FeesController::class, 'delete'])->name('fee.delete');
Route::get('fees/{id}', [FeesController::class, 'show'])->name('fee.show');
Route::get('fees_search', [FeesController::class, 'fees_search']);

//Master Setting Tax
Route::get('tax', [TaxController::class, 'index'])->name('tax.index');
Route::get('tax/add', [TaxController::class, 'add'])->name('tax.add');
Route::post('tax', [TaxController::class, 'store'])->name('tax.store');
Route::get('tax/{id}/edit', [TaxController::class, 'edit'])->name('tax.edit');
Route::post('tax/{id}', [TaxController::class, 'update'])->name('tax.update');
Route::get('delete_tax/{id}', [TaxController::class, 'delete'])->name('tax.delete');
Route::get('tax/{id}', [TaxController::class, 'show'])->name('tax.show');
Route::get('tax_search', [TaxController::class, 'tax_search']);

//Master Setting Membership Year
Route::get('membershipyear', [MembershipYearController::class, 'index'])->name('membershipyear.index');
Route::get('membershipyear/add', [MembershipYearController::class, 'add'])->name('membershipyear.add');
Route::post('membershipyear', [MembershipYearController::class, 'store'])->name('membershipyear.store');
Route::get('membershipyear/{id}/edit', [MembershipYearController::class, 'edit'])->name('membershipyear.edit');
Route::post('membershipyear/{id}', [MembershipYearController::class, 'update'])->name('membershipyear.update');
Route::get('delete_membershipyear/{id}', [MembershipYearController::class, 'delete'])->name('membershipyear.delete');
Route::get('membershipyear/{id}', [MembershipYearController::class, 'show'])->name('membershipyear.show');
Route::get('membershipyear_search', [MembershipYearController::class, 'membershipyear_search']);

//Membership Form
Route::middleware(['auth'])->group(function () {
    Route::get('membershipform', [MembershipController::class, 'index'])->name('member.index');
});
Route::get('membershipform/add', [MembershipController::class, 'add'])->name('member.add');
Route::post('membershipform', [MembershipController::class, 'store'])->name('member.register');
Route::get('membershipform/{id}/edit', [MembershipController::class, 'edit'])->name('member.edit');
Route::post('membershipform/{id}', [MembershipController::class, 'update'])->name('member.update');
Route::get('delete_member/{id}', [MembershipController::class, 'delete'])->name('member.delete');
Route::get('membershipform/{id}', [MembershipController::class, 'show'])->name('member.show');
Route::get('membershipform_search', [MembershipController::class, 'member_search'])->name('member_search');

Route::get('addcompany/{id?}', [CompanyProfileController::class, 'addcompany'])->name('new.company');

//Company Registration form
Route::get('companyform/add/{user_id}', [MembershipController::class, 'showCompanyForm'])->name('company.add');

Route::post('api/fetch-states', [CompanyProfileController::class, 'fetchState']);
Route::post('api/fetch-cities', [CompanyProfileController::class, 'fetchCity']);
Route::get('companylist', [CompanyProfileController::class, 'index'])->name('company.list');
Route::get('companyregistration/{id?}', [CompanyProfileController::class, 'add'])->name('companyregister.add');
Route::post('companyregistration', [CompanyProfileController::class, 'companystore'])->name('company.register');
Route::get('companyregistration/edit/{id}', [CompanyProfileController::class, 'edit'])->name('company.edit');

Route::put('companyregistration/{id}', [CompanyProfileController::class, 'update'])->name('company.update');

Route::get('delete_company/{id}', [CompanyProfileController::class, 'delete'])->name('company.delete');
Route::get('companylist/{id}', [CompanyProfileController::class, 'show'])->name('company.show');
Route::get('/subcategory-get/{category_id}', [CompanyProfileController::class, 'getSubcategories']);



///FAQ Controller
Route::get('faq', [FAQController::class, 'index'])->name('faq.index');
Route::get('faq/add', [FAQController::class, 'add'])->name('faq.add');
Route::post('faq/add', [FAQController::class, 'faqstore'])->name('faqs.store');
Route::get('faq/{id}/edit', [FAQController::class, 'edit'])->name('faq.edit');
Route::post('/faq/{id}', [FAQController::class, 'update'])->name('faq.update');
Route::get('delete_faq/{id}', [FAQController::class, 'delete'])->name('faq.delete');
Route::get('faq_search', [FAQController::class, 'faq_search'])->name('faq_search');
Route::get('faq/{id}', [FAQController::class, 'show'])->name('faq.show');


///CMS Page Controller
Route::get('cms', [CMSController::class, 'index'])->name('cms.index');
Route::get('cms/add', [CMSController::class, 'add'])->name('cms.add');
Route::post('cms/add', [CMSController::class, 'cmsstore'])->name('cms.store');
Route::get('cms/{id}/edit', [CMSController::class, 'edit'])->name('cms.edit');
Route::post('cms/{id}', [CMSController::class, 'update'])->name('cms.update');

Route::get('delete_cms/{id}', [CMSController::class, 'delete'])->name('cms.delete');
Route::get('cms_search', [CMSController::class, 'cms_search'])->name('cms_search');
Route::get('cms/{id}', [CMSController::class, 'show'])->name('cms.show');

////General Setting
Route::get('settings', [GeneralSettingController::class, 'index'])->name('setting.index');
Route::post('settings', [GeneralSettingController::class, 'store'])->name('setting.store');

////Email Setting
Route::get('email', [EmailController::class, 'index'])->name('email.index');
Route::get('email/{id}', [EmailController::class, 'delete_email'])->name('email.delete');

///Committee Controller
Route::get('committee', [CommitteeController::class, 'index'])->name('committee.index');
Route::get('committee/add', [CommitteeController::class, 'add'])->name('committee.add');
Route::post('committee', [CommitteeController::class, 'store'])->name('committee.store');
Route::get('committee/{id}/edit', [CommitteeController::class, 'edit'])->name('committee.edit');
Route::post('committee/{id}', [CommitteeController::class, 'update'])->name('committee.update');
Route::get('committee_delete/{id}', [CommitteeController::class, 'delete'])->name('committee.delete');
Route::get('committee/{id}', [CommitteeController::class, 'show'])->name('committee.show');

///Position Controller
Route::get('position', [PositionController::class, 'index'])->name('position.index');
Route::get('position/add', [PositionController::class, 'add'])->name('position.add');
Route::post('position', [PositionController::class, 'store'])->name('position.store');
Route::get('position/{id}/edit', [PositionController::class, 'edit'])->name('position.edit');
Route::post('position/{id}', [PositionController::class, 'update'])->name('position.update');
Route::get('delete_position/{id}', [PositionController::class, 'delete'])->name('position.delete');

//category
Route::get('index', [CategoryController::class, 'index'])->name('categorylist');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::post('/store-other-category', [CategoryController::class, 'storeOtherCategory'])->name('store.other.category');



//subcategory
Route::get('/subcategorylist', [SubCategoryController::class, 'index'])->name('subcategorylist');
Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
Route::get('/subcategory/{id}/edit', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
Route::put('/subcategory/{id}/update', [SubCategoryController::class, 'update'])->name('subcategory.update');
Route::delete('/subcategory/{id}/destroy', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');


//subsubcategory
Route::get('/subsubcategorylist', [SubSubCategoryController::class, 'index'])->name('subsubcategorylist');
Route::get('/subsubcategory/create', [SubSubCategoryController::class, 'create'])->name('subsubcategory.create');
Route::post('/subsubcategory/store', [SubSubCategoryController::class, 'store'])->name('subsubcategory.store');
Route::get('/subsubcategory/{id}/edit', [SubSubCategoryController::class, 'edit'])->name('subsubcategory.edit');
Route::put('/subsubcategory/{id}/update', [SubSubCategoryController::class, 'update'])->name('subsubcategory.update');
Route::delete('/subsubcategory/{id}/destroy', [SubSubCategoryController::class, 'destroy'])->name('subsubcategory.destroy');

//gallery
Route::get('gallery', [GalleryController::class, 'index'])->name('gallerylist');
Route::get('gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::get('gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
Route::put('gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
Route::delete('gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
Route::delete('/gallery/{gallery}/image/{image}', [GalleryController::class, 'deleteImage'])->name('gallery.delete');
Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');
Route::post('/gallery/add-image', [GalleryController::class, 'addImageToGallery'])->name('gallery.addImage');

//Images
Route::get('image-upload', [ImageController::class, 'index'])->name('imagelisting');
Route::post('image-upload', [ImageController::class, 'store'])->name('image.store');
Route::get('image/create', [ImageController::class, 'create'])->name('imageUpload');
Route::get('image/{id}/edit', [ImageController::class, 'edit'])->name('imageedit');
Route::put('image/update/{id}', [ImageController::class, 'update'])->name('update');
Route::delete('image/{id}', [ImageController::class, 'destroy'])->name('destroy');

//Type
Route::get('types', [TypeController::class, 'index'])->name('typelist');
Route::get('types/create', [TypeController::class, 'create'])->name('types.create');
Route::post('types', [TypeController::class, 'store'])->name('types.store');
Route::get('types/{id}/edit', [TypeController::class, 'edit'])->name('types.edit');
Route::put('types/{id}', [TypeController::class, 'update'])->name('types.update');
Route::delete('types/{id}', [TypeController::class, 'destroy'])->name('types.destroy');
//page
Route::get('pages', [PageController::class, 'index'])->name('pagelist');
Route::get('pages/create', [PageController::class, 'create'])->name('pages.create');
Route::post('pages', [PageController::class, 'store'])->name('pages.store');
Route::get('pages/{id}/edit', [PageController::class, 'edit'])->name('pages.edit');
Route::put('pages/{id}', [PageController::class, 'update'])->name('pages.update');
Route::delete('pages/{id}', [PageController::class, 'destroy'])->name('pages.destroy');

////Events Controller
Route::get('events/list', [EventController::class, 'eventlist'])->name('list.event');
Route::get('event/create', [EventController::class, 'addevent'])->name('add.event');
Route::post('event/create', [EventController::class, 'store'])->name('event.store');

Route::get('event/{id}/edit', [EventController::class, 'eventedit'])->name('edit.event');
Route::post('event/{id}', [EventController::class, 'eventupdate'])->name('update.event');
Route::get('event_delete/{id}', [EventController::class, 'eventdelete'])->name('delete.event');
Route::get('event_show/{id}', [EventController::class, 'eventshow'])->name('view.event');
Route::get('event/{event}/registrations', [EventController::class, 'viewRegistrations'])->name('view.registrations');
Route::get('export-registrations/{eventId}', [EventController::class, 'exportRegistrations'])->name('export.registrations');

//Membership Plan Controller
Route::get('plan/list', [MembershipPlanController::class, 'list'])->name('membershipplan.list');
Route::get('plan', [MembershipPlanController::class, 'create'])->name('membershipplan.create');
Route::post('plan', [MembershipPlanController::class, 'store'])->name('membershipplan.store');
Route::get('plan/{id}/edit', [MembershipPlanController::class, 'edit'])->name('membershipplan.edit');
Route::post('plan/{id}', [MembershipPlanController::class, 'update'])->name('membershipplan.update');
Route::get('plan_delete/{id}', [MembershipPlanController::class, 'delete'])->name('membershipplan.delete');
Route::get('plan/{id}', [MembershipPlanController::class, 'show'])->name('membershipplan.show');


});

Route::middleware(['auth', 'eventmanager'])->group(function () {

    Route::get('/admin/qr-code/{eventform_id}', [QRCodePageController::class, 'showEventFormDetails'])
        ->name('qrpage');
Route::post('/event/checkin/{id}', [QRCodePageController::class, 'checkIn'])->name('event.checkin');
Route::post('/event/checkout/{id}', [QRCodePageController::class, 'checkOut'])->name('event.checkout');

});


///Home Controller
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/registration', [HomeController::class, 'membershipregistration'])->name('home.membershipregistration');
Route::get('/login', [HomeController::class, 'membershiplogin'])->name('home.membershiplogin');
Route::post('/', [HomeController::class, 'membershipregistrationstore'])->name('membershipregistration.store');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/history', [HomeController::class, 'history'])->name('home.about');
Route::get('/committee', [HomeController::class, 'committee'])->name('home.committee');
Route::get('/desk_directory', [HomeController::class, 'desk_directory'])->name('home.desk_directory');
Route::get('/indexgallery', [HomeController::class, 'gallery'])->name('home.gallery');
Route::get('/faq', [HomeController::class, 'faq'])->name('home.faq');
Route::get('/islamic_tijarat', [HomeController::class, 'islamic_tijarat'])->name('home.islamictijarat');
Route::get('/associate', [HomeController::class, 'associate'])->name('home.associate');
Route::get('/jobs', [HomeController::class, 'jobs'])->name('home.jobs');
Route::get('/jobs/{id}/details', [HomeController::class, 'jobdetails'])->name('jobsdetails');
Route::get('/thankyou', [HomeController::class, 'thankyou'])->name('thankyou');
Route::get('/events', [HomeController::class, 'homeevents'])->name('home.events');
Route::get('/directory/list', [HomeController::class, 'directory_list'])->name('directory.list');
Route::get('/membership', [HomeController::class, 'membership'])->name('home.membership');
Route::post('api/fetch-states', [HomeController::class, 'fetchState']);
Route::post('api/fetch-cities', [HomeController::class, 'fetchCity']);

//Directory Controller
Route::get('/directory', [DirectoryController::class, 'directory'])->name('home.directory');
Route::get('/directory_details/{id}', [DirectoryController::class, 'show'])->name('directory.view');
Route::post('/review/store', [DirectoryController::class, 'store'])->name('review.store');
Route::get('/verify-review/{token}', [DirectoryController::class, 'verify'])->name('review.verify');
Route::get('comments/{id}', [DirectoryController::class, 'showComments'])->name('comments.show');
Route::get('/directory-subcategory/{category_id}', [DirectoryController::class, 'getSubcategories']);





//Company Registration
Route::get('/comapny/registration/{id?}', [CompanyRegistrationController::class, 'companyregistration'])->name('home.companyregistration');

Route::post('companyregistration', [CompanyRegistrationController::class, 'companystore'])->name('company.store');
Route::get('companyregistration/edit/{id}', [CompanyRegistrationController::class, 'edit'])->name('company.edit');

Route::put('companyregistration/{id}', [CompanyRegistrationController::class, 'update'])->name('company.update');

Route::get('delete_company/{id}', [CompanyRegistrationController::class, 'delete'])->name('company.delete');
Route::get('companylist/{id}', [CompanyRegistrationController::class, 'show'])->name('company.show');
Route::get('/company-subcategory/{category_id}', [CompanyRegistrationController::class, 'getSubcategories']);

Route::post('api/fetch-states', [CompanyRegistrationController::class, 'fetchState']);
Route::post('api/fetch-cities', [CompanyRegistrationController::class, 'fetchCity']);


////Member
Route::get('/member', [MemberController::class, 'index'])->middleware(['auth', 'role:user'])->name('member');
Route::get('/member-profile', [MemberController::class, 'profile'])->middleware(['auth', 'role:user'])->name('profile.index');
Route::post('/member-profile', [MemberController::class, 'memberprofileupdate'])->name('update.profile');
Route::post('/member-profile/{id}', [MemberController::class, 'companyprofileupdate'])->name('update.companyprofile');
Route::post('/update-password', [MemberController::class, 'updatePassword'])->middleware(['auth', 'role:user'])->name('updatePassword');
Route::get('/my-account', [MemberController::class, 'myaccount'])->middleware(['auth', 'role:user'])->name('myaccount');
Route::get('/member-subcategory/{category_id}', [MemberController::class, 'getSubcategories']);

//Job Controller
Route::get('joblist', [JobController::class, 'index'])->name('joblist');
Route::get('/job', [JobController::class, 'createjob'])->middleware(['auth', 'role:user'])->name('job');
Route::post('/job', [JobController::class, 'store'])->name('job.store');
Route::post('api/fetch-states', [JobController::class, 'fetchState'])->name('fetch.states');
Route::post('api/fetch-cities', [JobController::class, 'fetchCity'])->name('fetch.cities');
Route::get('/get-subcategories/{category_id}', [JobController::class, 'getSubcategories']);
Route::get('job/{id}/edit', [JobController::class, 'edit'])->name('job.edit');
Route::post('job/{id}', [JobController::class, 'update'])->name('job.update');
Route::get('job/{id}', [JobController::class, 'delete'])->name('job.delete');
Route::get('details/{id}', [JobController::class, 'show'])->name('job.view');
Route::post('/apply-job', [JobController::class, 'applyJob'])->name('job.apply');
Route::get('/jobapplylist/{job_id}', [JobController::class, 'jobApplyList'])->name('jobapplylist');
Route::get('apply-details/{id}', [JobController::class, 'jobapplydetails'])->name('jobapplydetails');
Route::post('/interview', [JobController::class, 'interview'])->name('interviewstore');

//Ads Manager Controller
Route::get('create/ads', [AdsManagerController::class, 'index'])->name('create.ads');
Route::post('/create/ads', [AdsManagerController::class, 'store'])->name('ads.store');

//Catalog Controller
Route::get('catalog', [CatalogController::class, 'index'])->name('catalog.list');
Route::get('catalog/create', [CatalogController::class, 'create'])->name('catalog.create');
Route::post('catalog/create', [CatalogController::class, 'store'])->name('catalog.store');
Route::get('catalog/edit/{id}', [CatalogController::class, 'edit'])->name('catalog.edit');
Route::post('catalog/{id}', [CatalogController::class, 'update'])->name('catalog.update');
Route::get('catalog/delete/{id}', [CatalogController::class, 'delete'])->name('catalog.delete');
Route::get('/get-subcategories', [CatalogController::class, 'getSubcategories'])->name('get.subcategories');


//Event Details Controller
Route::get('event_details/{id}', [EventDetailsController::class, 'eventdetails'])->name('eventdetails');
Route::get('event_register/{id}', [EventDetailsController::class, 'eventregister'])->name('eventregister');
Route::post('api/fetch-states', [EventDetailsController::class, 'fetchState']);
Route::post('api/fetch-cities', [EventDetailsController::class, 'fetchCity']);
Route::post('/event-store', [EventDetailsController::class, 'eventstore'])->name('eventstore');
Route::get('qr-code', [EventDetailsController::class, 'qrcodeindex'])->name('event.details');

////Mail Controller
// Route::get('/send-contact', [MailController::class, 'sendContact']);
Route::post('/send-contact', [MailController::class, 'sendContact'])->name('send.email');



//Razorpay Payment
Route::get('/razorpay-payment', [RazorpayPaymentController::class, 'razorpayindex'])->name('razorpay.payment.index');
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

//LanguageController;
Route::get('lang/home', [LanguageController::class, 'index']);
Route::get('lang/change', [LanguageController::class, 'change'])->name('changeLang');


//Form Registration Controller
Route::get('registration', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('registration', [RegistrationController::class, 'registrationstore'])->name('registration.store');


//Bazar Controller
Route::get('/ramzan-bazar', [BazarController::class, 'ramzanbazar'])->name('homebazar');
Route::get('/bazar-details/{id}', [BazarController::class, 'bazardetails'])->name('homebazar.details');
Route::get('/bazar_registration', [BazarController::class, 'bazarregistration'])->name('bazar.registration');
Route::post('/bazar_registration', [BazarController::class, 'store'])->name('bazarregistration.store');
Route::get('/shop/{id}/{name}', [BazarController::class, 'show'])->name('shop.profile');
Route::post('/shop', [BazarController::class, 'shopform'])->name('shop-form');
Route::post('/product-inquiry', [BazarController::class, 'productinquiry'])->name('productinquiry');

