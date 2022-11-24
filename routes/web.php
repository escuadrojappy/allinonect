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
    return view('welcome', ['title' => 'Home']);
});

Route::get('welcome', function () {
    return view('welcome', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/account', function () {
    return view('account', ['title' => 'Account'] );
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('/contact', function () {
    return view('contact' , ['title' => 'Contact Us']);
});

Route::get('/establishment', function () {
    return view('establishment');
});

Route::get('/login/admin', function () {
    return view('admin_login', ['title' => 'Admin Login']);
});

Route::get('/citizen', function () {
    return view('citizen');
});

Route::get('/dohdashboard', function () {
    return view('dohdashboard', ['title' => 'Dashboard']);
});

Route::get('/edashboard', function () {
    return view('edashboard', ['title' => 'Dashboard']);
});

Route::get('/cdashboard', function () {
    return view('cdashboard');
});

Route::get('/econtactreport', function () {
    return view('econtactreport', ['title' => 'Contact Report']);
});

Route::get('/econtacttracing', function () {
    return view('econtacttracing' , ['title' => 'Contact Tracing']);
});

Route::get('/csettings', function () {
    return view('csettings');
});

Route::get('/dohmessages', function () {
    return view('dohmessages', ['title' => 'Messages']);
});

Route::get('/dohcontactreport', function () {
    return view('dohcontactreport', ['title' => 'Contact Report']);
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


Route::get('/admin/dashboard', function () {
    return view('admin_contents/dashboard', ['title' => 'Dashboard']);
});

Route::get('/admin/useraccounts/establishment', function () {
    return view('admin_contents/establishment', ['title' => 'Establishments']);
});

Route::get('/admin/useraccounts/visitor', function () {
    return view('admin_contents/visitor', ['title' => 'Visitor']);
});

Route::get('/admin/contactreport', function () {
    return view('admin_contents/contact_report', ['title' => 'Contact Report']);
});

Route::get('/admin/setting', function () {
    return view('admin_contents/setting', ['title' => 'Settings']);
});

Route::get('/establishment/dashboard', function () {
    return view('establishment_contents/dashboard', ['title' => 'Establishment Dashboard']);
});

Route::get('/establishment/contacts/contactreport', function () {
    return view('establishment_contents/contact_report', ['title' => 'Establishment Contact Report']);
});

Route::get('/establishment/contacts/contacttracing', function () {
    return view('establishment_contents/contact_tracing', ['title' => 'Contact Tracing']);
});

Route::get('/establishment/setting', function () {
    return view('establishment_contents/setting', ['title' => 'Settings']);
});