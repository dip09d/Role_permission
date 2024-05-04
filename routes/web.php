<?php

use Illuminate\Http\Request;
use App\Http\Controllers\country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\testimonial;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationTemplateController;


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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AdminController::class, 'login']);
    Route::post('/check', [AdminController::class, 'check']);
});

Route::middleware(['admin_auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/Notification', [AdminController::class, 'notification']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});

Route::middleware(['admin_auth','permission:Admin,User'])->group(function () { 
Route::get('/user', [AdminController::class, 'user']);
Route::get('/get_data', [AdminController::class, 'get_data']);
Route::get('/get_data/{id}', [AdminController::class, 'get_data']);
Route::post('/add_user', [AdminController::class, 'form_data']);
Route::post('/edit_user/{id}', [AdminController::class, 'edit_user']);
Route::delete('/delete_user/{id}', [AdminController::class, 'delete_user']);
Route::post('/toggle_status', [AdminController::class, 'toggle_user_status']);
});


Route::middleware(['admin_auth','permission:Admin,Role'])->group(function () {
    Route::get('/role', [RoleController::class, 'index']);
    Route::get('/get_role_data', [RoleController::class, 'get_data']);
    Route::get('/get_role_data/{id}', [RoleController::class, 'get_data']);
    Route::post('/add_role', [RoleController::class, 'form_data']);
    Route::post('/edit_role/{id}', [RoleController::class, 'edit_role']);
    Route::post('/role_toggle_status', [RoleController::class, 'toggle_role_status']);
    Route::delete('/delete_role/{id}', [RoleController::class, 'delete_user']);
});

Route::middleware(['admin_auth'])->group(function () {
    Route::get('/permission', [PermissionController::class, 'Index']);
    Route::get('/get_permission', [PermissionController::class, 'get_permission']);
});

Route::middleware(['admin_auth'])->group(function () {
    Route::get('/Notification', [NotificationController::class, 'notification']);
    Route::post('/changeStatus', [NotificationController::class, 'toggleReadStatus']);
    Route::delete('/delete_notify/{id}', [NotificationController::class, 'delete_notification']);
});

Route::middleware(['admin_auth','permission:Management,Category'])->group(function () {
    Route::get('/catagory', [CatagoryController::class, 'index']);
    Route::get('/get_catagory_data', [CatagoryController::class, 'get_data']);
    Route::get('/get_catagory_data/{id}', [CatagoryController::class, 'get_data']);
    Route::post('/add_catagory', [CatagoryController::class, 'form_data']);
    Route::post('/edit_catagory/{id}', [CatagoryController::class, 'edit_catagory']);
    Route::post('/catagory_toggle_status', [CatagoryController::class, 'toggle_catagory_status']);
    Route::delete('/delete_catagory/{id}', [CatagoryController::class, 'delete_user']);
   
});

Route::middleware(['admin_auth','permission:Setting,All Settings'])->group(function () {
    Route::get('/Settings/{group_key?}', [SettingsController::class, 'Index']);
    Route::get('/get_allSettings_data/{id}', [SettingsController::class, 'allSettings_get']);
    Route::post('/add_allSettings_group', [SettingsController::class, 'add_allSettings']);
    Route::post('/edit_allSettings_group/{id}', [SettingsController::class, 'update_allSettings']);
    Route::post('/settings_search', [SettingsController::class, 'settings_search']);
});

Route::middleware(['admin_auth','permission:Setting,Setting Group'])->group(function () {
  
    Route::get('/get_Settings', [SettingsController::class, 'get_Settings']);
    Route::get('/Settings_group', [SettingsController::class, 'Settings_group']);
    Route::post('/add_Settings_group', [SettingsController::class, 'form_data']);
    Route::get('/get_Settings_data/{id}', [SettingsController::class, 'get_Settings']);
    Route::post('/settings_toggle_status', [SettingsController::class, 'toggle_settings_status']);
    Route::post('/edit_Settings_group/{id}', [SettingsController::class, 'edit_Settings_data']);
    Route::delete('/delete_setting_group/{id}', [SettingsController::class, 'delete_setting_group']);

});

Route::middleware(['admin_auth','permission:Management,Email Template'])->group(function () {
    Route::get('/email_template', [EmailController::class, 'Index']);
    Route::post('/mail_toggle_status', [EmailController::class, 'toggle_mail_status']);
    Route::get('/get_mail_data/{id}', [EmailController::class, 'get_data']);
    Route::post('/edit_mail/{id}', [EmailController::class, 'edit_mail']);
    Route::delete('/delete_mail/{id}', [EmailController::class, 'delete_mail']);
    Route::post('/add_mail', [EmailController::class, 'insert_mail']);
    Route::get('/export', [EmailController::class, 'export']);
    Route::get('/mail_search', [EmailController::class, 'mails_search']);
});


Route::middleware(['admin_auth','permission:Management,Notification Template'])->group(function () {
    Route::get('/notification_template', [NotificationTemplateController::class, 'Index']);
    Route::post('/add_notification', [NotificationTemplateController::class, 'insert_notifications']);
    Route::get('/get_notification_data/{id}', [NotificationTemplateController::class, 'get_data']);
    Route::post('/notify_template_status', [NotificationTemplateController::class, 'notify_template_status']);
    Route::post('/edit_notification/{id}', [NotificationTemplateController::class, 'edit_notification']);
    Route::delete('/delete_notification/{id}', [NotificationTemplateController::class, 'delete_notification']);
    Route::get('/notification_search', [NotificationTemplateController::class, 'notification_search']);
    Route::get('/export_notification', [NotificationTemplateController::class, 'export']);
});


Route::middleware(['admin_auth','permission:Management'])->group(function () {
    Route::get('/testimonial', [testimonial::class, 'Index']);
    Route::post('/upload_file', [testimonial::class, 'upload_file']);
    Route::post('/add_testimonial', [testimonial::class, 'insert_data']);
    Route::post('/notify_testimonial_status', [testimonial::class, 'toggle_testimonial_status']);
    Route::get('/testimonial_details/{id}', [testimonial::class, 'get_details']);
    Route::post('/edit_testimonial/{id}', [testimonial::class, 'edit_testimonial']);
    Route::delete('/delete_testimonal/{id}', [testimonial::class, 'delete_testimonial']);
});


Route::middleware(['admin_auth','permission:Management'])->group(function () {
    Route::get('/country', [country::class, 'Index']);
});
