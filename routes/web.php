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
    return view('welcome', ['title' => 'All-in-One Contact Tracing']);
});

Route::get('welcome', function () {
    return view('welcome', ['title' => 'All-in-One Contact Tracing']);
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

Route::get('/login/establishment', function () {
    return view('establishment', ['title' => 'Establishment Login']);
});

Route::get('/login/admin', function () {
    return view('admin_login', ['title' => 'Admin Login']);
});

Route::get('/login/citizen', function () {
    return view('citizen', ['title' => 'Citizen Login']);
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

Route::get('/establishment/change_password', function () {
    return view('establishment_contents/change_password', ['title' => 'Change Password']);
});

Route::get('/admin/my_profile', function () {
    return view('admin_contents/my_profile', ['title' => 'My Profile']);
});

Route::get('/citizen/dashboard', function () {
    return view('visitor_contents/dashboard', ['title' => 'Visitors']);
});
Route::get('/establishment/my_profile', function () {
    return view('establishment_contents/my_profile', ['title' => 'My Profile']);
});

Route::get('/establishment/qrscanner', function () {
    return view('establishment_contents/scanner', ['title' => 'Qr Scanner']);
});

Route::get('/admin/qrscanner2', function () {
    return view('admin_contents/scanner2', ['title' => 'Qr Scanner']);
});

Route::get('/forgot-password', function () {
    return view('forgot_password_contents/forgot_password', ['title' => 'Forgot Password']);
});

Route::get('/reset-password', function () {
    return view('forgot_password_contents/reset_password', ['title' => 'Reset Password']);
});

Route::get('/citizen/health-status-logs', function () {
    return view('visitor_contents/health_status_logs', ['title' => 'Health Status Logs']);
});

Route::get('/admin/covid-result-logs', function () {
    return view('admin_contents/covid_result_logs', ['title' => 'Covid Result Logs']);
});

Route::get('/admin/recently-deleted', function () {
    return view('admin_contents/recently_deleted', ['title' => 'Recently Deleted']);
});