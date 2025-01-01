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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Master Setting Membership
Route::get('admin/membership', [MembershiptypeController::class, 'index'])->name('memberships.index');
Route::get('admin/membership/add', [MembershiptypeController::class, 'add'])->name('membership.add');
Route::post('/admin/memberships', [MembershiptypeController::class, 'store'])->name('memberships.store');
Route::get('/admin/memberships/{id}/edit', [MembershiptypeController::class, 'edit'])->name('memberships.edit');
Route::put('/admin/memberships/{id}', [MembershiptypeController::class, 'update'])->name('memberships.update');
Route::delete('/admin/memberships/{id}', [MembershiptypeController::class, 'destroy'])->name('memberships.destroy');
Route::get('/admin/memberships/{id}', [MembershiptypeController::class, 'show'])->name('memberships.show');
Route::get('membership_search', [MembershiptypeController::class, 'membership_search']);

// Master Settings Technologies
Route::get('admin/technologies', [TechnologyController::class, 'index'])->name('technology.index');
Route::get('admin/technologies/add', [TechnologyController::class, 'add'])->name('technology.add');
Route::post('/admin/technologies', [TechnologyController::class, 'store'])->name('technology.store');
Route::get('/admin/technologies/{id}/edit', [TechnologyController::class, 'edit'])->name('technology.edit');
Route::post('/admin/technologies/{id}', [TechnologyController::class, 'update'])->name('technology.update');
Route::get('delete_technologies/{id}', [TechnologyController::class, 'delete'])->name('technology.delete');
Route::get('/admin/technologies/{id}', [TechnologyController::class, 'show'])->name('technology.show');
Route::get('technology_search', [TechnologyController::class, 'technology_search']);


//Master Setting Fees
Route::get('admin/fees', [FeesController::class, 'index'])->name('fee.index');
Route::get('admin/fees/add', [FeesController::class, 'add'])->name('fee.add');
Route::post('admin/fees', [FeesController::class, 'store'])->name('fee.store');
Route::get('admin/fees/{id}/edit', [FeesController::class, 'edit'])->name('fee.edit');
Route::post('admin/fees/{id}', [FeesController::class, 'update'])->name('fee.update');
Route::get('delete_fee/{id}', [FeesController::class, 'delete'])->name('fee.delete');
Route::get('admin/fees/{id}', [FeesController::class, 'show'])->name('fee.show');
Route::get('fees_search', [FeesController::class, 'fees_search']);

//Master Setting Tax
Route::get('admin/tax', [TaxController::class, 'index'])->name('tax.index');
Route::get('admin/tax/add', [TaxController::class, 'add'])->name('tax.add');
Route::post('/admin/tax', [TaxController::class, 'store'])->name('tax.store');
Route::get('/admin/tax/{id}/edit', [TaxController::class, 'edit'])->name('tax.edit');
Route::post('/admin/tax/{id}', [TaxController::class, 'update'])->name('tax.update');
Route::get('delete_tax/{id}', [TaxController::class, 'delete'])->name('tax.delete');
Route::get('/admin/tax/{id}', [TaxController::class, 'show'])->name('tax.show');
Route::get('tax_search', [TaxController::class, 'tax_search']);


//Master Setting Membership Year
Route::get('admin/membershipyear', [MembershipYearController::class, 'index'])->name('membershipyear.index');
Route::get('admin/membershipyear/add', [MembershipYearController::class, 'add'])->name('membershipyear.add');
Route::post('/admin/membershipyear', [MembershipYearController::class, 'store'])->name('membershipyear.store');
Route::get('/admin/membershipyear/{id}/edit', [MembershipYearController::class, 'edit'])->name('membershipyear.edit');
Route::post('/admin/membershipyear/{id}', [MembershipYearController::class, 'update'])->name('membershipyear.update');
Route::get('delete_membershipyear/{id}', [MembershipYearController::class, 'delete'])->name('membershipyear.delete');
Route::get('/admin/membershipyear/{id}', [MembershipYearController::class, 'show'])->name('membershipyear.show');
Route::get('membershipyear_search', [MembershipYearController::class, 'membershipyear_search']);

//Membership Form
Route::middleware(['auth'])->group(function () {
    Route::get('admin/membershipform', [MembershipController::class, 'index'])->name('member.index');
});
Route::get('admin/membershipform/add', [MembershipController::class, 'add'])->name('member.add');
Route::post('admin/membershipform', [MembershipController::class, 'store'])->name('member.register');
Route::get('/admin/membershipform/{id}/edit', [MembershipController::class, 'edit'])->name('member.edit');
Route::post('/admin/membershipform/{id}', [MembershipController::class, 'update'])->name('member.update');
Route::get('delete_member/{id}', [MembershipController::class, 'delete'])->name('member.delete');
Route::get('/admin/membershipform/{id}', [MembershipController::class, 'show'])->name('member.show');
Route::get('membershipform_search', [MembershipController::class, 'member_search'])->name('member_search');

Route::get('addcompany/{id?}', [CompanyProfileController::class, 'addcompany'])->name('new.company');

//Company Registration form
Route::get('admin/companyform/add/{user_id}', [MembershipController::class, 'showCompanyForm'])->name('company.add');

Route::post('api/fetch-states', [CompanyProfileController::class, 'fetchState']);
Route::post('api/fetch-cities', [CompanyProfileController::class, 'fetchCity']);


Route::get('admin/companylist', [CompanyProfileController::class, 'index'])->name('company.list');
Route::get('admin/companyregistration/{id?}', [CompanyProfileController::class, 'add'])->name('companyregister.add');
Route::post('admin/companyregistration', [CompanyProfileController::class, 'companystore'])->name('company.register');
Route::get('admin/companyregistration/edit/{id}', [CompanyProfileController::class, 'edit'])->name('company.edit');

Route::put('admin/companyregistration/{id}', [CompanyProfileController::class, 'update'])->name('company.update');

Route::get('delete_company/{id}', [CompanyProfileController::class, 'delete'])->name('company.delete');
Route::get('/admin/companylist/{id}', [CompanyProfileController::class, 'show'])->name('company.show');

