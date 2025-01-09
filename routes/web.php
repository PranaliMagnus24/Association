<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\FAQController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyRegistrationController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\PositionController;

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


Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'role:admin']);
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


});



///Home Controller
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/registration', [HomeController::class, 'membershipregistration'])->name('home.membershipregistration');
Route::get('/login', [HomeController::class, 'membershiplogin'])->name('home.membershiplogin');
Route::post('/', [HomeController::class, 'membershipregistrationstore'])->name('membershipregistration.store');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/directory', [HomeController::class, 'directory'])->name('home.directory');
Route::get('/committee', [HomeController::class, 'committee'])->name('home.committee');
Route::get('/desk_directory', [HomeController::class, 'desk_directory'])->name('home.desk_directory');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('home.gallery');


//Company Registration
Route::get('/comapny/registration/{id?}', [CompanyRegistrationController::class, 'companyregistration'])->name('home.companyregistration');

Route::post('companyregistration', [CompanyRegistrationController::class, 'companystore'])->name('company.store');
Route::get('companyregistration/edit/{id}', [CompanyRegistrationController::class, 'edit'])->name('company.edit');

Route::put('companyregistration/{id}', [CompanyRegistrationController::class, 'update'])->name('company.update');

Route::get('delete_company/{id}', [CompanyRegistrationController::class, 'delete'])->name('company.delete');
Route::get('companylist/{id}', [CompanyRegistrationController::class, 'show'])->name('company.show');

Route::post('api/fetch-states', [CompanyRegistrationController::class, 'fetchState']);
Route::post('api/fetch-cities', [CompanyRegistrationController::class, 'fetchCity']);



Route::get('/member', [MemberController::class, 'index'])->middleware(['auth', 'role:user']);


