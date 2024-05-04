<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserApi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCategory;
use App\Http\Controllers\Api\ApiSettings;
use App\Http\Controllers\Api\testimonial;
use App\Http\Controllers\Api\ApiStateCity;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\CmsController;
use App\Http\Controllers\Api\ApiEmailTemplate;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\ApiNotificationTemplate;

Route::post('/login', [ApiController::class, 'login']);
Route::get('/logout', [ApiController::class, 'logout']);
Route::get('/dashboard', [ApiController::class, 'index']);


/* ---------------------- Role Api ---------------------------*/
Route::post('/add_role', [ApiController::class, 'form_data']);
Route::get('/role_list', [ApiController::class, 'get_data']);
Route::get('/role_details/{id}', [ApiController::class, 'get_data']);
Route::post('/role_toggle_status', [ApiController::class, 'toggle_role_status']);
Route::delete('/delete_role/{id}', [ApiController::class, 'delete_user']);
Route::post('/edit_role/{id}', [ApiController::class, 'edit_role']);

Route::get('/notification', [ApiController::class, 'notification']);
Route::post('/notify_status', [ApiController::class, 'toggle_notify_status']);
Route::delete('/delete_notification/{id}', [ApiController::class, 'delete_notify']);
Route::get('/notification_count', [ApiController::class, 'notification_count']);


/* ---------------------- User Api ---------------------------*/
Route::get('/user_list', [UserApi::class, 'get_data']);
Route::get('/user_details/{id}', [UserApi::class, 'get_data']);
Route::post('/add_user', [UserApi::class, 'form_data']);
Route::post('/edit_user/{id}', [UserApi::class, 'edit_user']);
Route::delete('/delete_user/{id}', [UserApi::class, 'delete_user']);
Route::post('/toggle_status', [UserApi::class, 'toggle_user_status']);


/* ---------------------- Settings Api ---------------------------*/
Route::get('/Settings_group_', [ApiSettings::class, 'Settings_group']);
Route::get('/get_Settings_data/{id}', [ApiSettings::class, 'Settings_group']);
Route::post('/edit_Settings_group/{id}', [ApiSettings::class, 'edit_Settings']);
Route::delete('/delete_Settings_group/{id}', [ApiSettings::class, 'delete_Settings_group']);
Route::get('/allsettings', [ApiSettings::class, 'getAllSettings']);
Route::post('/add_allSettings_group', [ApiSettings::class, 'add_allSettings']);
Route::get('/get_allSettings_data/{id}', [ApiSettings::class, 'allSettings_get']);
Route::post('/edit_allSettings_group/{id}', [ApiSettings::class, 'update_allSettings']);
Route::post('/settings_search', [ApiSettings::class, 'settings_search']);



Route::get('/catagory_list', [ApiCategory::class, 'get_data']);
Route::get('/catagory_details/{id}', [ApiCategory::class, 'get_details'])->name('get.catagory.particuler.data');
Route::post('/catagory_add', [ApiCategory::class, 'form_data'])->name('add_catagory');
Route::post('/catagory_edit/{id}', [ApiCategory::class, 'edit_catagory'])->name('edit_catagory');
Route::post('/catagory_toggle_status', [ApiCategory::class, 'toggle_catagory_status']);
Route::delete('/delete_catagory/{id}', [ApiCategory::class, 'delete_user'])->name('delete_catagory');
Route::post('/uploadImage', [ApiCategory::class, 'uploadpic']);


Route::get('/get_city_data', [ApiStateCity::class, 'get_data']);
Route::get('/get_city_data/{id}', [ApiStateCity::class, 'get_data']);
Route::post('/edit_city/{id}', [ApiStateCity::class, 'edit_city'])->name('edit_city');
Route::post('/city_toggle_status', [ApiStateCity::class, 'toggle_city_status']);
Route::delete('/delete_city/{id}', [ApiStateCity::class, 'delete_city'])->name('delete_city');
Route::post('/add_city', [ApiStateCity::class, 'insert_city'])->name('add_city');


Route::get('/get_mail_data/{id?}', [ApiEmailTemplate::class, 'get_data']);
Route::post('/edit_mail/{id}', [ApiEmailTemplate::class, 'edit_mail'])->name('edit_mail');
Route::post('/mail_toggle_status', [ApiEmailTemplate::class, 'toggle_mail_status']);
Route::delete('/delete_mail/{id}', [ApiEmailTemplate::class, 'delete_mail'])->name('delete_mail');
Route::post('/add_mail', [ApiEmailTemplate::class, 'insert_mail'])->name('add_mail');
Route::get('/export', [ApiEmailTemplate::class, 'export']);
Route::get('/mail_search', [ApiEmailTemplate::class, 'mails_search']);


Route::get('/get_notification_template/{id?}', [ApiNotificationTemplate::class, 'get_data']);
Route::post('/edit_notification_template/{id}', [ApiNotificationTemplate::class, 'edit_notification'])->name('edit_notification');
Route::post('/notification_toggle_status', [ApiNotificationTemplate::class, 'toggle_notifications_status']);
Route::post('/add_notification', [ApiNotificationTemplate::class, 'insert_notifications']);
Route::get('/exportnotification', [ApiNotificationTemplate::class, 'export']);



Route::get('/cms_list', [CmsController::class, 'get_data']);
Route::get('/cms_details/{id}', [CmsController::class, 'get_details']);


Route::get('/testimonial_list', [testimonial::class, 'get_data']);
Route::get('/testimonial_details/{id}', [testimonial::class, 'get_details']);
Route::post('/testimonial_logo', [testimonial::class, 'uploadpic']);
Route::post('/testimonial_add', [testimonial::class, 'insert_testimonial']);
Route::post('/testimonial_toggle_status', [testimonial::class, 'toggle_testimonial_status']);
Route::post('/edit_testimonial_data/{id}', [testimonial::class, 'edit_testimonial']);
Route::delete('/delete_testimonial_data/{id}', [testimonial::class, 'delete_testimonial']);

Route::get('/country_list', [CountryController::class, 'get_data']);
Route::get('/country_details/{id}', [CountryController::class, 'get_details']);