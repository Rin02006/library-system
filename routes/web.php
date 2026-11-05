<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OTPController;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
});

Route::middleware('auth')->group(function () {
    
    // 1. OTP ROUTES (These do NOT require OTP verification to access)
    Route::get('/verify-otp', [OTPController::class, 'showVerifyForm'])->name('otp.verify.form');
    Route::post('/verify-otp', [OTPController::class, 'verifyOtp'])->name('otp.verify');

    // 2. DASHBOARD (Direct Controller Check)
    Route::get('/dashboard', [BookController::class, 'dashboard'])->name('dashboard');
    
    // 3. PROTECTED ROUTES (Middleware as a backup bouncer)
    Route::middleware([\App\Http\Middleware\EnsureOtpIsVerified::class])->group(function () {
        
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // ADMIN ROUTES
        Route::middleware([\App\Http\Middleware\IsAdmin::class])->group(function () {
            Route::resource('books', BookController::class);
            Route::get('/borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
            Route::post('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');
        });

        // USER ROUTES
        Route::get('/user-dashboard', function () {
            if (auth()->user()->otp_code !== null) {
                return redirect()->route('otp.verify.form');
            }

            $user = Auth::user();
            $activeBorrows = Borrowing::with('book')->where('user_id', $user->id)->whereNull('returned_at')->get();
            $hasOverdue = $activeBorrows->contains(function ($borrow) {
                return \Carbon\Carbon::parse($borrow->borrowed_at)->diffInDays(now()) > 7;
            });
            $availableBooksCount = Book::where('status', 'Available')->count();

            return view('user.dashboard', compact('activeBorrows', 'hasOverdue', 'availableBooksCount'));
        })->name('user.dashboard');

        Route::get('/borrow-books', [BorrowingController::class, 'borrowPage'])->name('user.borrow');
        Route::post('/books/{book}/borrow', [BorrowingController::class, 'store'])->name('books.borrow');
        Route::get('/my-records', [BorrowingController::class, 'myRecords'])->name('user.records');
    });
});

require __DIR__.'/auth.php';