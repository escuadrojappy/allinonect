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

Route::get('/', function () {
    return view('welcome');
});

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/account', function () {
    return view('account');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/establishment', function () {
    return view('establishment');
});

Route::get('/doh', function () {
    return view('doh');
});

Route::get('/citizen', function () {
    return view('citizen');
});

Route::get('/dohdashboard', function () {
    return view('dohdashboard');
});

Route::get('/edashboard', function () {
    return view('edashboard');
});

Route::get('/cdashboard', function () {
    return view('cdashboard');
});

Route::get('/econtactreport', function () {
    return view('econtactreport');
});

Route::get('/econtacttracing', function () {
    return view('econtacttracing');
});

Route::get('/csettings', function () {
    return view('csettings');
});

Route::get('/dohmessages', function () {
    return view('dohmessages');
});

Route::get('/dohcontactreport', function () {
    return view('dohcontactreport');
});

Route::get('/dohprofile', function () {
    return view('dohprofile');
});

Route::get('/establishmentprofile', function () {
    return view('establishmentprofile');
});

Route::get('/dohaccountrequest', function () {
    return view('dohaccountrequest');
});