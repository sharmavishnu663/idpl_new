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


Route::get('gallary-list', '\App\Http\Controllers\Api\APIController@gallaryList')->name('gallary.list');
Route::get('privacy-list', '\App\Http\Controllers\Api\APIController@privacyPolicyList')->name('privacy.policy.list');

Route::get('term-list', '\App\Http\Controllers\Api\APIController@termsList')->name('terms.list');

Route::get('contact-addresses-list', '\App\Http\Controllers\Api\APIController@contactAddressList')->name('contact.addresses.list');

Route::get('team-list', '\App\Http\Controllers\Api\APIController@teamList')->name('teams.list');
Route::get('about-video-list', '\App\Http\Controllers\Api\APIController@aboutVideoList')->name('about.video.list');

Route::get('user-count-list', '\App\Http\Controllers\Api\APIController@userCountsList')->name('user.counts.list');
Route::get('user-testimonials-list', '\App\Http\Controllers\Api\APIController@userTestimonialList')->name('user.testimonial.list');
Route::post('post-form', '\App\Http\Controllers\Api\APIController@postForm')->name('post.form');
Route::post('email-Subscription', '\App\Http\Controllers\Api\APIController@emailSubscription')->name('email.subscription');
