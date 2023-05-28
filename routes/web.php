<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\UserActionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('userHome');

Route::get('/login', [AuthController::class, 'renderLoginPage'])->name('userLoginPage');
Route::post('login', [AuthController::class, 'postLoginUser'])->name('postLoginUser');

Route::get('/register', [AuthController::class, 'renderRegisterPage'])->name('userRegisterPage');
Route::post('/register', [AuthController::class, 'postRegisterUser'])->name('postRegisterUser');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/questions', [PageController::class, 'renderQuestionsPage'])->name('userQuestionsPage');

    Route::get('/wallet', [PageController::class, 'renderWalletsPage'])->name('userWalletsPage');
    Route::post('/wallet', [UserActionController::class, 'addWalletPost'])->name('postWalletAdd');
    Route::put('/wallet', [UserActionController::class, 'walletPut'])->name('putWalletAdd');


    Route::get('/account-security', [PageController::class, 'secureAcccount'])->name('userSecureAccountPage');
});

