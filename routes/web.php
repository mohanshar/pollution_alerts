<?php

use App\Models\sitesetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
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

// For user
Route::get('/', function () {
    $settings = sitesetting::find(1);
    Session::put('sitesetting', $settings);
    return view('frontend.layouts.includes.welcome');
});

Route::view('about', 'frontend.layouts.includes.about');
Route::view('createpost', 'UserPosting.create_post');

Route::post('post/submit', 'UserPostingController@submit')->name('post.submit');

Route::get('changeprofile', 'UpdateProfileController@changeProfile')->name('change.profile');
Route::post('updateprofile', 'UpdateProfileController@upload')->name('update.profile');


// Admin routes

Route::get('/admin/login', 'AdminLoginController@adminLogin')->name('admin.login');
Route::post('/admin/login/submit', 'AdminLoginController@submit')->name('admin.login.submit');

Route::get('/admin/logout', 'AdminLoginController@adminLogout')->name('admin.logout');
Route::get('/admin', 'AdminLoginController@adminDashboard')->name('admin.dashboard');

Route::get('userpost', 'SendSmsController@showuserpost')->name('showuser.post');
Route::get('sitesettings', 'SiteSettingController@site_settings')->name('site.settings');
Route::get('showuserpost', 'UserPostingController@userPostingShow')->name('userpost.show');
Route::post('settings/update', 'SiteSettingController@settings_update')->name('settings.update');
Route::get('editpost/{id}', 'UserPostingController@edit')->name('edit.post');
Route::get('delete_post/{id}', 'UserPostingController@delete')->name('post.delete');
Route::get('updatepost/{id}', 'UserPostingController@approvedDeclinedFunction')->name('post.update');


Auth::routes();

Route::get('/home', [HomeController::class, 'index']);

Route::post('sendsms', 'SendSmsController@sendsms')->name('send.sms');
Route::post('sendmail', 'SendMailController@sendMail')->name('send.mail');

