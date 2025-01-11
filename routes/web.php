<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\RegisterStudent;
use App\Http\Controllers\AssessmentController;    
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\PromissoryController; 
use App\Http\Controllers\CadsController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login']);

Route::get('/contactInfo', [PagesController::class, 'contactInfo'])->name('contactInfo');
Route::get('/forgotPass', [PagesController::class, 'forgotPass'])->name('forgotPass');
// Route::post('/forgotPass', [PagesController::class, 'forgotPass'])->name('forgotPass');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [AuthController::class, 'redirectToDashboard'])->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/registerStudent', [RegisterStudent::class, 'registerStudent'])->name('admin.registerStudent');
        Route::post('/admin/registerStudent', [RegisterStudent::class, 'storeStudentRegister']);
        Route::get('/admin/viewStudents', [PagesController::class, 'viewStudents'])->name('admin.viewStudents');
    });

    Route::middleware('role:accounting')->group(function () {
        Route::get('/accounting/verifyAssessment', [ApprovalController::class, 'verifyAssessment'])->name('accounting.verifyAssessment');
        Route::post('/accounting/verifyAssessment', [ApprovalController::class, 'verifyAssessment']);
    });

    Route::middleware('role:cads')->group(function () {
        Route::match(['get', 'post'], '/cads/verifyPromissory', [CadsController::class, 'fetchPromissoryAndAssessment'])->name('cads.verifyPromissory');
    });

    Route::middleware('role:student')->group(function () {
        Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/notifications', [PagesController::class, 'notifications'])->name('user.notifications');
        Route::get('/assessment', [AssessmentController::class, 'assessment'])->name('user.assessment');
        Route::post('/assessment', [AssessmentController::class, 'assessment']);
        Route::get('promissory', [PromissoryController::class, 'promissory'])->name('user.promissory');
        Route::post('/promissory', [PromissoryController::class, 'storePromissoryNote'])->name('user.promissory.storePromissoryNote');
        Route::get('/history', [PagesController::class, 'history'])->name('user.history');
        Route::get('/settings', [PagesController::class, 'settings'])->name('user.settings');
        Route::get('/profile', [PagesController::class, 'profile'])->name('user.profile');
    });
});