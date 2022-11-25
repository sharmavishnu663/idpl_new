<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('gallary-list', '\App\Http\Controllers\Api\APIController@gallaryList')->name('gallary.list'); // Gallery List api

Route::get('privacy-list', '\App\Http\Controllers\Api\APIController@privacyPolicyList')->name('privacy.policy.list'); // Privacy policy api

Route::get('term-list', '\App\Http\Controllers\Api\APIController@termsList')->name('terms.list');  // Terms & Condition api

Route::get('contact-addresses-list', '\App\Http\Controllers\Api\APIController@contactAddressList')->name('contact.addresses.list'); //contact address api

Route::get('team-list', '\App\Http\Controllers\Api\APIController@teamList')->name('teams.list'); // Teams api

Route::get('about-video-list', '\App\Http\Controllers\Api\APIController@aboutVideoList')->name('about.video.list'); // About video api

Route::get('about-career-list', '\App\Http\Controllers\Api\APIController@careerVideoList')->name('about.career.list'); // Career video api

Route::get('user-count-list', '\App\Http\Controllers\Api\APIController@userCountsList')->name('user.counts.list');  // user count api

Route::get('user-testimonials-list', '\App\Http\Controllers\Api\APIController@userTestimonialList')->name('user.testimonial.list'); // user testimonial api

Route::post('post-form', '\App\Http\Controllers\Api\APIController@postForm')->name('post.form'); // post form api

Route::post('email-Subscription', '\App\Http\Controllers\Api\APIController@emailSubscription')->name('email.subscription'); // email subscription api

Route::post('share-resume', '\App\Http\Controllers\Api\APIController@sharedResume')->name('share.resume'); // resume shared api

Route::get('product-list', '\App\Http\Controllers\Api\APIController@productList')->name('product.list'); // product api

Route::get('jobs-list', '\App\Http\Controllers\Api\APIController@jobsList')->name('jobs.list'); // job list api

Route::get('jobs-detail/{id}', '\App\Http\Controllers\Api\APIController@jobsDetails')->name('jobs.detail'); // job details api

Route::get('corporate-list', '\App\Http\Controllers\Api\APIController@corporateList')->name('corporate.list'); // corporate list api

Route::post('corporate-fom', '\App\Http\Controllers\Api\APIController@presentationData')->name('corporate.form'); // corporate list api

Route::post('job-apply', '\App\Http\Controllers\Api\APIController@applyJobs')->name('job.apply'); // Job Apply api

Route::post('search-apply', '\App\Http\Controllers\Api\APIController@searchJobs')->name('search.apply'); // Search Apply api
