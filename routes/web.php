<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\AuthController;
use App\Http\Controllers\AdminPanel\ServiceCategoryController;
use App\Http\Controllers\AdminPanel\ServiceController;
use App\Http\Controllers\AdminPanel\ServiceMediaController;
use App\Http\Controllers\AdminPanel\TestimonialController;
use App\Http\Controllers\AdminPanel\InquiryController;
use App\Http\Controllers\AdminPanel\PageController;
use App\Http\Controllers\AdminPanel\FaqController;
use App\Http\Controllers\AdminPanel\SettingController;
use App\Http\Controllers\AdminPanel\ActivityLogController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ContactController;



Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::prefix('admin')->name('admin.')->middleware(AdminAuth::class)->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');
    // Service Categories
    Route::resource('service-categories', ServiceCategoryController::class)->except(['create', 'edit', 'show']);

    // Services
    Route::resource('services', ServiceController::class);
    // Service Media
    Route::resource('service_media', ServiceMediaController::class);
    // Testimonials
    Route::resource('testimonials', TestimonialController::class);
    // Inquiries
    Route::resource('inquiries', InquiryController::class);
    // Pages
    Route::resource('pages', PageController::class);
    // FAQs
    Route::resource('faqs', FaqController::class);
    // Settings
    Route::resource('settings', SettingController::class);


    // Activity Logs
    Route::get('activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
});
Route::prefix('admin/settings')->name('admin.settings.')->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('index');
    Route::post('/', [SettingController::class, 'store'])->name('store');
    Route::put('/{id}', [SettingController::class, 'update'])->name('update');
    Route::delete('/{id}', [SettingController::class, 'destroy'])->name('destroy');

    Route::post('/general', [SettingController::class, 'updateGeneral'])->name('general.update');
    Route::post('/password', [SettingController::class, 'updatePassword'])->name('password.update');
});





Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/test', [FrontendController::class, 'testimonials'])->name('testimonials');
Route::get('/serv', [FrontendController::class, 'services'])->name('services');
Route::get('/projects', [FrontendController::class, 'projects'])->name('projects');
Route::get('/about', [FrontendController::class, 'about'])->name('about');



Route::get('/project/{slug}', [FrontendController::class, 'showProject'])->name('project.single');
Route::get('/category/{slug}', [FrontendController::class, 'showCategory'])->name('category.single');


Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


Route::get('/projects/{id}', [FrontendController::class, 'showProject'])->name('project.details');
Route::get('/services/{slug}', [FrontendController::class, 'showService'])->name('frontend.services.service-details');
