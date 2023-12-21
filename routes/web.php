<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// Home
use App\Http\Controllers\HomeController;

// Auth
use App\Http\Controllers\AuthController;

// Form Tamu
use App\Http\Controllers\TamuController;

// Admin
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\RekapController as AdminRekapController;
use App\Http\Controllers\admin\TamuController as AdminTamuController;
use App\Http\Controllers\admin\FormKontakController as AdminFormKontakController;

// Petugas
use App\Http\Controllers\petugas\TamuController as petugasTamuController;
use App\Http\Controllers\petugas\DashboardController as petugasDashboardController;
use App\Http\Controllers\petugas\ScanController as petugasScanController;

// Tamu
use App\Http\Controllers\tamu\DashboardController as tamuDashboardController;
use App\Http\Controllers\tamu\DataTamuController as tamuDataTamuController;
use App\Http\Controllers\tamu\RiwayatController as tamuRiwayatController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// reset password
use App\Http\Controllers\Auth\ResetPasswordController;
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

// Home
Route::get('/', [HomeController::class, 'index'])->name('beranda')->middleware('guest');

Route::get('/contact', [HomeController::class, 'showContactForm'])->name('contact.show');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store');
// Auth Form
Route::get('auth/login', [AuthController::class, 'index'])->name('formLogin')->middleware('guest');
Route::get('auth/register', [AuthController::class, 'registerForm'])->name('formRegister')->middleware('guest');
Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout');

// Auth Proses
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');


// Verifikasi
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('tamu/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('success', 'Link verifikasi berhasil di kirim, cek email anda atau cek bagian spam');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Reset password
Route::get('/forgot-password', [ResetPasswordController::class, 'showLinkRequestForm'])
    ->middleware('guest')
    ->name('password.request');
Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetLinkEmail'])
    ->middleware('guest')
    ->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->middleware('guest')
    ->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->middleware('guest')
    ->name('password.update');


// ROLE ADMIN
Route::middleware(['auth',  'role:admin'])->group(
    function () {
        // Dashboard
        Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        // Admin tamu
        Route::get('admin/tamu', [AdminTamuController::class, 'index'])->name('admin.tamu');
        Route::put('/admin/tamu/{id}/update-status', [AdminTamuController::class, 'updateStatus'])->name('admin.tamu.update-status');
        Route::get('admin/tamu/{id}', [AdminTamuController::class, 'show'])->name('admin.tamu.show');
        Route::get('admin/tamu/{id}/edit', [AdminTamuController::class, 'edit'])->name('admin.tamu.edit');
        Route::put('admin/tamu/{id}', [AdminTamuController::class, 'update'])->name('admin.tamu.update');
        Route::delete('admin/tamu/{id}', [AdminTamuController::class, 'destroy'])->name('admin.tamu.destroy');

        // Rekap tamu
        Route::get('admin/rekap', [AdminRekapController::class, 'index'])->name('admin.rekap');
        Route::post('admin/rekap', [AdminRekapController::class, 'rekap'])->name('admin.rekap.export');

        // Form Kontak
        Route::get('admin/formKontak', [AdminFormKontakController::class, 'index'])->name('admin.fomrkontak');
    }
);

// ROLE PETUGAS
Route::middleware('auth', 'role:petugas')->group(
    function () {
        // Dashboard
        Route::get('petugas/dashboard', [petugasDashboardController::class, 'index'])->name('petugas.dashboard');

        // Data tamu
        Route::get('petugas/tamu', [petugasTamuController::class, 'index'])->name('petugas.tamu');
        Route::put('petugas/tamu/{id}/update-status', [petugasTamuController::class, 'updateStatus'])->name('petugas.tamu.update.status');
        Route::get('petugas/tamu/{id}', [petugasTamuController::class, 'show'])->name('petugas.tamu.show');
        Route::get('petugas/tamu/{id}/edit', [petugasTamuController::class, 'edit'])->name('petugas.tamu.edit');
        Route::put('petugas/tamu/{id}', [petugasTamuController::class, 'update'])->name('petugas.tamu.update');
        Route::delete('petugas/tamu/{id}', [petugasTamuController::class, 'destroy'])->name('petugas.tamu.destroy');

        // Scan
        Route::get('petugas/scan', [petugasScanController::class, 'index'])->name('scan');
        Route::post('petugas/scan', [petugasScanController::class, 'scanQRCode'])->name('scan.qrcode');
    }
);

// ROLE TAMU
Route::middleware(['auth', 'verified', 'role:tamu'])->group(
    function () {
        // Dashbord
        Route::get('tamu/dashboard', [tamuDashboardController::class, 'index'])->name('tamu.dashboard');
        // Data Tamu
        Route::get('tamu/dataTamu', [tamuDataTamuController::class, 'index'])->name('dataTamu');
        Route::delete('tamu/{id}', [tamuDataTamuController::class, 'destroy'])->name('tamu.destroy');
        // Riwayat
        Route::get('tamu/riwayat', [tamuRiwayatController::class, 'index'])->name('riwayat');
    }
);

// FORM DATA TAMU
Route::get('tamu', [TamuController::class, 'index'])->name('formTamu');
Route::post('tamu', [TamuController::class, 'store'])->name('tamu.store');
