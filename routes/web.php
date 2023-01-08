<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, 'home']);
Route::group(['middleware' => 'auth'], function () {
    // Route::('/dashboard', 'Dashboard')->name('dashboard');


    Route::group(['middleware' => 'checkRole:guest'], function () {
        Route::inertia('/guestDashboard', 'GuestDashboard')->name('guestDashboard');
    });
});

// admin_user-group
    Route::middleware(['auth','checkRole:admin'])->prefix('admin')->name('admin.')
    ->group(function () {
        Route::inertia('/dashboard', 'AdminDashboard')->name('dashboard');
    });


// user-group
    Route::middleware(['auth','checkRole:user'])->prefix('user')->name('user.')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/question', [UserController::class, 'index'])->name('index');
    });

    Route::controller(QuestionController::class)->group(function () {
        Route::get('/question/create', 'createQuestion')->name('createQuestion');
        Route::post('/question/post', 'storeQuestion')->name('storeQuestion');
    });

    Route::controller(AnswerController::class)->group(function () {
        Route::get('/question/answer/{question}', 'createAnswer')->name('createAnswer');
        Route::get('/question/answer/show/{question}', 'showAnswer')->name('showAnswer');
        Route::post('/question/answer/{question}', 'storeAnswer')->name('storeAnswer');
    });
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
