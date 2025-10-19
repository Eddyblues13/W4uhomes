<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');
Route::get('/form', [HomeController::class, 'form'])->name('form');

// Property routes   
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/buy', [PropertyController::class, 'buy'])->name('properties.buy');
Route::get('/rent', [PropertyController::class, 'rent'])->name('properties.rent');
Route::get('/sold', [PropertyController::class, 'sold'])->name('properties.sold');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Password Reset Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
});






Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Authentication
    Route::get('/login', [App\Http\Controllers\Admin\AdminLoginController::class, 'adminLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AdminLoginController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Admin\AdminLoginController::class, 'logout'])->name('logout');




    Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('home');
    // User Management
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.show');
    Route::put('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');

    // Property Management
    Route::get('/properties', [App\Http\Controllers\Admin\PropertyController::class, 'index'])->name('properties.index');
    Route::get('/properties/create', [App\Http\Controllers\Admin\PropertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [App\Http\Controllers\Admin\PropertyController::class, 'store'])->name('properties.store');
    Route::get('/properties/{property}/edit', [App\Http\Controllers\Admin\PropertyController::class, 'edit'])->name('properties.edit');
    Route::put('/properties/{property}', [App\Http\Controllers\Admin\PropertyController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{property}', [App\Http\Controllers\Admin\PropertyController::class, 'destroy'])->name('properties.destroy');

    // Homepage Management
    Route::get('/homepage', [App\Http\Controllers\Admin\HomepageController::class, 'edit'])->name('homepage.edit');
    Route::put('/homepage', [App\Http\Controllers\Admin\HomepageController::class, 'update'])->name('homepage.update');

    // Testimonial Management
    Route::get('/testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('testimonials.index');
    Route::get('/testimonials/create', [App\Http\Controllers\Admin\TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('/testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('/testimonials/{testimonial}/edit', [App\Http\Controllers\Admin\TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::put('/testimonials/{testimonial}', [App\Http\Controllers\Admin\TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('/testimonials/{testimonial}', [App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])->name('testimonials.destroy');
});
