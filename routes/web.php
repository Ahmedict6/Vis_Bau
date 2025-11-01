<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GdprController;
use Illuminate\Support\Facades\Route;

// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// About page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

// Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// GDPR Compliance
Route::get('/gdpr', [GdprController::class, 'index'])->name('gdpr.index');
Route::post('/gdpr/export', [GdprController::class, 'export'])->name('gdpr.export');
Route::get('/gdpr/delete', [GdprController::class, 'deleteForm'])->name('gdpr.delete.form');
Route::post('/gdpr/delete', [GdprController::class, 'delete'])->name('gdpr.delete');
Route::get('/privacy-policy', [GdprController::class, 'privacy'])->name('gdpr.privacy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Hero Sliders
    Route::resource('hero-sliders', App\Http\Controllers\Admin\HeroSliderController::class);

    // Home Video
    Route::resource('home-videos', App\Http\Controllers\Admin\HomeVideoController::class);

    // Facts
    Route::resource('fun-facts', App\Http\Controllers\Admin\FunFactController::class);

    // Testimonials
    Route::resource('testimonials', App\Http\Controllers\Admin\TestimonialController::class);

    // Team Members
    Route::resource('team-members', App\Http\Controllers\Admin\TeamMemberController::class);

    // Job Listings
    Route::resource('job-listings', App\Http\Controllers\Admin\JobListingController::class);

    // Brand Logos
    Route::resource('brand-logos', App\Http\Controllers\Admin\BrandLogoController::class);

    // Section Settings
    Route::get('section-settings', [App\Http\Controllers\Admin\SectionSettingController::class, 'index'])->name('section-settings.index');
    Route::patch('section-settings/{sectionSetting}/toggle', [App\Http\Controllers\Admin\SectionSettingController::class, 'toggle'])->name('section-settings.toggle');
    Route::put('section-settings/{sectionSetting}', [App\Http\Controllers\Admin\SectionSettingController::class, 'update'])->name('section-settings.update');
    Route::post('section-settings/update-order', [App\Http\Controllers\Admin\SectionSettingController::class, 'updateOrder'])->name('section-settings.update-order');

    // Cache Management
    Route::post('cache/clear-all', [App\Http\Controllers\Admin\CacheController::class, 'clearAll'])->name('cache.clear-all');
    Route::post('cache/clear-app', [App\Http\Controllers\Admin\CacheController::class, 'clearAppCache'])->name('cache.clear-app');
    Route::post('cache/clear-config', [App\Http\Controllers\Admin\CacheController::class, 'clearConfigCache'])->name('cache.clear-config');
    Route::post('cache/clear-route', [App\Http\Controllers\Admin\CacheController::class, 'clearRouteCache'])->name('cache.clear-route');
    Route::post('cache/clear-view', [App\Http\Controllers\Admin\CacheController::class, 'clearViewCache'])->name('cache.clear-view');
    Route::post('cache/optimize', [App\Http\Controllers\Admin\CacheController::class, 'optimize'])->name('cache.optimize');

    // About Page Management
    Route::get('about-page', [App\Http\Controllers\Admin\AboutPageController::class, 'index'])->name('about-page.index');
    Route::put('about-page', [App\Http\Controllers\Admin\AboutPageController::class, 'update'])->name('about-page.update');
    Route::patch('about-page/toggle/{key}', [App\Http\Controllers\Admin\AboutPageController::class, 'toggleSection'])->name('about-page.toggle');

    // Existing content management
    Route::resource('pages', App\Http\Controllers\Admin\PageController::class);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('blog-posts', App\Http\Controllers\Admin\BlogPostController::class);
    Route::resource('contact-messages', App\Http\Controllers\Admin\ContactMessageController::class);
});

require __DIR__.'/auth.php';
