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
