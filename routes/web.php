<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Master_Settings\MembershiptypeController;
use App\Http\Controllers\Master_Settings\TechnologyController;
use App\Http\Controllers\Master_Settings\FeesController;
use App\Http\Controllers\Master_Settings\TaxController;
use App\Http\Controllers\Master_Settings\MembershipYearController;
use App\Http\Controllers\Membership_form\MembershipController;
use App\Http\Controllers\Membership_form\CompanyProfileController;
use App\Http\Controllers\FAQController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'verified']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Master Setting Membership
Route::get('admin/membership', [MembershiptypeController::class, 'index'])->name('memberships.index')->middleware(['auth', 'verified']);
Route::get('admin/membership/add', [MembershiptypeController::class, 'add'])->name('membership.add')->middleware(['auth', 'verified']);
Route::post('/admin/memberships', [MembershiptypeController::class, 'store'])->name('memberships.store')->middleware(['auth', 'verified']);
Route::get('/admin/memberships/{id}/edit', [MembershiptypeController::class, 'edit'])->name('memberships.edit')->middleware(['auth', 'verified']);
Route::put('/admin/memberships/{id}', [MembershiptypeController::class, 'update'])->name('memberships.update')->middleware(['auth', 'verified']);
Route::delete('/admin/memberships/{id}', [MembershiptypeController::class, 'destroy'])->name('memberships.destroy')->middleware(['auth', 'verified']);
Route::get('/admin/memberships/{id}', [MembershiptypeController::class, 'show'])->name('memberships.show')->middleware(['auth', 'verified']);
Route::get('membership_search', [MembershiptypeController::class, 'membership_search'])->middleware(['auth', 'verified']);

// Master Settings Technologies
Route::get('admin/technologies', [TechnologyController::class, 'index'])->name('technology.index')->middleware(['auth', 'verified']);
Route::get('admin/technologies/add', [TechnologyController::class, 'add'])->name('technology.add')->middleware(['auth', 'verified']);
Route::post('/admin/technologies', [TechnologyController::class, 'store'])->name('technology.store')->middleware(['auth', 'verified']);
Route::get('/admin/technologies/{id}/edit', [TechnologyController::class, 'edit'])->name('technology.edit')->middleware(['auth', 'verified']);
Route::post('/admin/technologies/{id}', [TechnologyController::class, 'update'])->name('technology.update')->middleware(['auth', 'verified']);
Route::get('delete_technologies/{id}', [TechnologyController::class, 'delete'])->name('technology.delete')->middleware(['auth', 'verified']);
Route::get('/admin/technologies/{id}', [TechnologyController::class, 'show'])->name('technology.show')->middleware(['auth', 'verified']);
Route::get('technology_search', [TechnologyController::class, 'technology_search'])->middleware(['auth', 'verified']);


//Master Setting Fees
Route::get('admin/fees', [FeesController::class, 'index'])->name('fee.index')->middleware(['auth', 'verified']);
Route::get('admin/fees/add', [FeesController::class, 'add'])->name('fee.add')->middleware(['auth', 'verified']);
Route::post('admin/fees', [FeesController::class, 'store'])->name('fee.store')->middleware(['auth', 'verified']);
Route::get('admin/fees/{id}/edit', [FeesController::class, 'edit'])->name('fee.edit')->middleware(['auth', 'verified']);
Route::post('admin/fees/{id}', [FeesController::class, 'update'])->name('fee.update')->middleware(['auth', 'verified']);
Route::get('delete_fee/{id}', [FeesController::class, 'delete'])->name('fee.delete')->middleware(['auth', 'verified']);
Route::get('admin/fees/{id}', [FeesController::class, 'show'])->name('fee.show')->middleware(['auth', 'verified']);
Route::get('fees_search', [FeesController::class, 'fees_search'])->middleware(['auth', 'verified']);

//Master Setting Tax
Route::get('admin/tax', [TaxController::class, 'index'])->name('tax.index')->middleware(['auth', 'verified']);
Route::get('admin/tax/add', [TaxController::class, 'add'])->name('tax.add')->middleware(['auth', 'verified']);
Route::post('/admin/tax', [TaxController::class, 'store'])->name('tax.store')->middleware(['auth', 'verified']);
Route::get('/admin/tax/{id}/edit', [TaxController::class, 'edit'])->name('tax.edit')->middleware(['auth', 'verified']);
Route::post('/admin/tax/{id}', [TaxController::class, 'update'])->name('tax.update')->middleware(['auth', 'verified']);
Route::get('delete_tax/{id}', [TaxController::class, 'delete'])->name('tax.delete')->middleware(['auth', 'verified']);
Route::get('/admin/tax/{id}', [TaxController::class, 'show'])->name('tax.show')->middleware(['auth', 'verified']);
Route::get('tax_search', [TaxController::class, 'tax_search'])->middleware(['auth', 'verified']);


//Master Setting Membership Year
Route::get('admin/membershipyear', [MembershipYearController::class, 'index'])->name('membershipyear.index')->middleware(['auth', 'verified']);
Route::get('admin/membershipyear/add', [MembershipYearController::class, 'add'])->name('membershipyear.add')->middleware(['auth', 'verified']);
Route::post('/admin/membershipyear', [MembershipYearController::class, 'store'])->name('membershipyear.store')->middleware(['auth', 'verified']);
Route::get('/admin/membershipyear/{id}/edit', [MembershipYearController::class, 'edit'])->name('membershipyear.edit')->middleware(['auth', 'verified']);
Route::post('/admin/membershipyear/{id}', [MembershipYearController::class, 'update'])->name('membershipyear.update')->middleware(['auth', 'verified']);
Route::get('delete_membershipyear/{id}', [MembershipYearController::class, 'delete'])->name('membershipyear.delete')->middleware(['auth', 'verified']);
Route::get('/admin/membershipyear/{id}', [MembershipYearController::class, 'show'])->name('membershipyear.show')->middleware(['auth', 'verified']);
Route::get('membershipyear_search', [MembershipYearController::class, 'membershipyear_search'])->middleware(['auth', 'verified']);

//Membership Form
Route::middleware(['auth'])->group(function () {
    Route::get('admin/membershipform', [MembershipController::class, 'index'])->name('member.index');
})->middleware(['auth', 'verified']);
Route::get('admin/membershipform/add', [MembershipController::class, 'add'])->name('member.add')->middleware(['auth', 'verified']);
Route::post('admin/membershipform', [MembershipController::class, 'store'])->name('member.register')->middleware(['auth', 'verified']);
Route::get('/admin/membershipform/{id}/edit', [MembershipController::class, 'edit'])->name('member.edit')->middleware(['auth', 'verified']);
Route::post('/admin/membershipform/{id}', [MembershipController::class, 'update'])->name('member.update')->middleware(['auth', 'verified']);
Route::get('delete_member/{id}', [MembershipController::class, 'delete'])->name('member.delete')->middleware(['auth', 'verified']);
Route::get('/admin/membershipform/{id}', [MembershipController::class, 'show'])->name('member.show')->middleware(['auth', 'verified']);
Route::get('membershipform_search', [MembershipController::class, 'member_search'])->name('member_search')->middleware(['auth', 'verified']);

Route::get('addcompany/{id?}', [CompanyProfileController::class, 'addcompany'])->name('new.company')->middleware(['auth', 'verified']);

//Company Registration form
Route::get('admin/companyform/add/{user_id}', [MembershipController::class, 'showCompanyForm'])->name('company.add')->middleware(['auth', 'verified']);

Route::post('api/fetch-states', [CompanyProfileController::class, 'fetchState'])->middleware(['auth', 'verified']);
Route::post('api/fetch-cities', [CompanyProfileController::class, 'fetchCity'])->middleware(['auth', 'verified']);


Route::get('admin/companylist', [CompanyProfileController::class, 'index'])->name('company.list')->middleware(['auth', 'verified']);
Route::get('admin/companyregistration/{id?}', [CompanyProfileController::class, 'add'])->name('companyregister.add')->middleware(['auth', 'verified']);
Route::post('admin/companyregistration', [CompanyProfileController::class, 'companystore'])->name('company.register')->middleware(['auth', 'verified']);
Route::get('admin/companyregistration/edit/{id}', [CompanyProfileController::class, 'edit'])->name('company.edit')->middleware(['auth', 'verified']);

Route::put('admin/companyregistration/{id}', [CompanyProfileController::class, 'update'])->name('company.update')->middleware(['auth', 'verified']);

Route::get('delete_company/{id}', [CompanyProfileController::class, 'delete'])->name('company.delete')->middleware(['auth', 'verified']);
Route::get('/admin/companylist/{id}', [CompanyProfileController::class, 'show'])->name('company.show')->middleware(['auth', 'verified']);



///FAQ Controller
Route::get('admin/faq', [FAQController::class, 'index'])->name('faq.index')->middleware(['auth', 'verified']);
Route::get('admin/faq/add', [FAQController::class, 'add'])->name('faq.add')->middleware(['auth', 'verified']);
Route::post('admin/faq/add', [FAQController::class, 'faqstore'])->name('faqs.store')->middleware(['auth', 'verified']);
Route::get('/admin/faq/{id}/edit', [FAQController::class, 'edit'])->name('faq.edit')->middleware(['auth', 'verified']);
Route::post('/admin/faq/{id}', [FAQController::class, 'update'])->name('faq.update')->middleware(['auth', 'verified']);
Route::get('delete_faq/{id}', [FAQController::class, 'delete'])->name('faq.delete')->middleware(['auth', 'verified']);
Route::get('faq_search', [FAQController::class, 'faq_search'])->name('faq_search')->middleware(['auth', 'verified']);
