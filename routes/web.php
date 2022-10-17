<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', '\App\Http\Controllers\Auth\LoginController@redirectRoute');
// Route::get('/home', '\App\Http\Controllers\Auth\LoginController@redirectRoute');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('admin.showlogin');
    Route::post('/login', '\App\Http\Controllers\Auth\LoginController@doLogin')->name('admin.login');


    Route::get('/dashboard', '\App\Http\Controllers\Admin\DashboardController@dashboard')->name('admin.dashboard');
    // Gallary route
    Route::get('/gallary', '\App\Http\Controllers\Admin\DashboardController@gallary')->name('admin.gallary');
    Route::post('/add/gallary', '\App\Http\Controllers\Admin\DashboardController@addGallary')->name('admin.add.gallary');
    Route::post('/edit/gallary', '\App\Http\Controllers\Admin\DashboardController@editGallary')->name('admin.edit.gallary');
    Route::get('/delete/gallary/{id}', '\App\Http\Controllers\Admin\DashboardController@deleteGallary')->name('admin.delete.gallary');

    // privacy route
    Route::get('/privacy_policy', '\App\Http\Controllers\Admin\LegalController@privacyPolicy')->name('admin.privacy_policy');
    Route::post('/add/policy', '\App\Http\Controllers\Admin\LegalController@addPolicy')->name('admin.add.policy');
    Route::post('/edit/policy', '\App\Http\Controllers\Admin\LegalController@editPolicy')->name('admin.edit.policy');

    // terms route
    Route::get('/terms', '\App\Http\Controllers\Admin\LegalController@term')->name('admin.terms');
    Route::post('/add/terms', '\App\Http\Controllers\Admin\LegalController@addTerm')->name('admin.add.terms');
    Route::post('/edit/terms', '\App\Http\Controllers\Admin\LegalController@editTerm')->name('admin.edit.terms');

    // contact Address route
    Route::get('/contact-address', '\App\Http\Controllers\Admin\LegalController@contactAddress')->name('admin.contact.address');
    Route::post('/add/contact-address', '\App\Http\Controllers\Admin\LegalController@addContactAddress')->name('admin.add.contact.address');
    Route::post('/edit/contact-address', '\App\Http\Controllers\Admin\LegalController@editContactAddress')->name('admin.edit.contact.address');
    Route::get('delete-contact-address/{id}', '\App\Http\Controllers\Admin\LegalController@deleteContactAddress')->name('delete.contact.address');

    // team route
    Route::get('/team', '\App\Http\Controllers\Admin\LegalController@teamShow')->name('admin.team');
    Route::post('/add/team', '\App\Http\Controllers\Admin\LegalController@addTeam')->name('admin.add.team');
    Route::post('/edit/team', '\App\Http\Controllers\Admin\LegalController@editTeam')->name('admin.edit.team');
    Route::get('delete-team/{id}', '\App\Http\Controllers\Admin\LegalController@deleteTeam')->name('delete.team');

    // about video route
    Route::get('/video', '\App\Http\Controllers\Admin\LegalController@aboutVideo')->name('admin.about.video');
    Route::post('/add/video', '\App\Http\Controllers\Admin\LegalController@addAboutVideo')->name('admin.add.about.video');
    Route::post('/edit/video', '\App\Http\Controllers\Admin\LegalController@editAboutVideo')->name('admin.edit.about.video');
    Route::get('delete-video/{id}', '\App\Http\Controllers\Admin\LegalController@deleteAboutVideo')->name('delete.about.video');
    Route::get('status-video/{id}', '\App\Http\Controllers\Admin\LegalController@statusAboutVideo')->name('status.about.video');

    // career video route
    Route::get('/career-video', '\App\Http\Controllers\Admin\HomeController@careerVideo')->name('admin.career.video');
    Route::post('/add/career-video', '\App\Http\Controllers\Admin\HomeController@addCareerVideo')->name('admin.add.career.video');
    Route::post('/edit/career-video', '\App\Http\Controllers\Admin\HomeController@editCareerVideo')->name('admin.edit.career.video');
    Route::get('delete-career-video/{id}', '\App\Http\Controllers\Admin\HomeController@deleteCareerVideo')->name('delete.career.video');
    Route::get('status-career-video/{id}', '\App\Http\Controllers\Admin\HomeController@statusCareerVideo')->name('status.career.video');

    // user counts route
    Route::get('/userCounts', '\App\Http\Controllers\Admin\LegalController@userCount')->name('admin.user.counts');
    Route::post('/add/userCounts', '\App\Http\Controllers\Admin\LegalController@addUserCounts')->name('admin.add.user.counts');
    Route::post('/edit/userCounts', '\App\Http\Controllers\Admin\LegalController@editUserCounts')->name('admin.edit.user.counts');

    // Testinomial counts route
    Route::get('/testimonial', 'App\Http\Controllers\Admin\HomeController@userTestimonial')->name('admin.user.testimonial');
    Route::post('/add/testimonial', 'App\Http\Controllers\Admin\HomeController@addUserTestimonial')->name('admin.add.user.testimonial');
    Route::post('/edit/testimonial', '\App\Http\Controllers\Admin\HomeController@editUserTestimonial')->name('admin.edit.user.testimonial');
    Route::get('delete-testimonial/{id}', '\App\Http\Controllers\Admin\HomeController@deleteTestimonial')->name('delete.user.testimonial');

    // Jobs route
    Route::get('/jobs', 'App\Http\Controllers\Admin\HomeController@jobs')->name('admin.jobs');
    Route::post('/add/job', 'App\Http\Controllers\Admin\HomeController@addJobs')->name('admin.add.job');
    Route::post('/edit/job', '\App\Http\Controllers\Admin\HomeController@editJobs')->name('admin.edit.job');
    Route::get('delete-job/{id}', '\App\Http\Controllers\Admin\HomeController@deleteJobs')->name('delete.job');

    // products route
    Route::get('/products', 'App\Http\Controllers\Admin\DashboardController@products')->name('admin.products');
    Route::post('/add/product', 'App\Http\Controllers\Admin\DashboardController@addProduct')->name('admin.add.product');
    Route::post('/edit/product', '\App\Http\Controllers\Admin\DashboardController@editProduct')->name('admin.edit.product');
    Route::get('delete-product/{id}', '\App\Http\Controllers\Admin\DashboardController@deleteProduct')->name('delete.product');

    // Category Product route
    Route::get('/category-product', 'App\Http\Controllers\Admin\LegalController@categoryProducts')->name('admin.category.product');
    Route::post('/add/category-product', 'App\Http\Controllers\Admin\LegalController@addCategoryProduct')->name('admin.add.category.product');
    Route::post('/edit/category-product', '\App\Http\Controllers\Admin\LegalController@editCategoryProduct')->name('admin.edit.category.product');
    Route::get('delete-category-product/{id}', '\App\Http\Controllers\Admin\LegalController@deleteCategoryProduct')->name('delete.category.product');

    // Product theme route
    Route::get('/product-theme', 'App\Http\Controllers\Admin\DashboardController@themeProducts')->name('admin.product.theme');
    Route::post('/add/product-theme', 'App\Http\Controllers\Admin\DashboardController@addThemeProduct')->name('admin.add.product.theme');
    Route::post('/edit/product-theme', '\App\Http\Controllers\Admin\DashboardController@editThemeProduct')->name('admin.edit.product.theme');
    Route::get('delete-product-theme/{id}', '\App\Http\Controllers\Admin\DashboardController@deleteThemeProduct')->name('delete.product.theme');

    // Gallary route
    Route::get('/corporate', '\App\Http\Controllers\Admin\DashboardController@corporate')->name('admin.corporate');
    Route::post('/add/corporate', '\App\Http\Controllers\Admin\DashboardController@addCorporate')->name('admin.add.corporate');
    Route::post('/edit/corporate', '\App\Http\Controllers\Admin\DashboardController@editCorporate')->name('admin.edit.corporate');
    Route::get('/delete/corporate/{id}', '\App\Http\Controllers\Admin\DashboardController@deleteCorporate')->name('admin.delete.corporate');


    // Jobs route
    Route::get('/job-applied', 'App\Http\Controllers\Admin\HomeController@resumeShared')->name('admin.resume.shared');

    // theme change api

    Route::post('/theme-change', 'App\Http\Controllers\Admin\HomeController@themeChange')->name('admin.theme.change');



    Route::get('/logout', '\App\Http\Controllers\Admin\DashboardController@logout')->name('logout');
});
