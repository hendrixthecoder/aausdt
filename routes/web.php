<?php

use App\Http\Controllers\Admin\AdminActionController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\FundsController;
use App\Http\Controllers\User\UserActionController;

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

Route::get('/', function (Request $request) {

    $email = env('MAIL_FROM_ADDRESS');

    //trick to set balance equal to zero for unauthenticated users
    $request->user() ? $balance = $request->user()->balance() : $balance = 0;
    return view('welcome', compact(['balance','email']));
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
    Route::delete('/wallet/{id}', [UserActionController::class, 'walletDelete'])->name('deleteWallet');

    Route::get('/deposits', [PageController::class, 'renderDepositsPage'])->name('userDepositsPage');
    Route::post('/deposits', [FundsController::class, 'createDeposit'])->name('createDepositUser');

    Route::get('/withdrawals', [PageController::class, 'renderWithdrawalsPage'])->name('userWithdrawalsPage');
    Route::post('/withdrawals', [FundsController::class, 'createWithdrawal'])->name('createWithdrawalUser');

    Route::get('/transfer', [PageController::class, 'renderTransferPage'])->name('userTransferPage');
    Route::post('/transfer', [FundsController::class, 'createTransfer'])->name('userCreateTransfer');

    Route::post('logout', [AuthController::class, 'logout'])->name('logUserOut');

    Route::get('/account-security', [PageController::class, 'secureAcccount'])->name('userSecureAccountPage');

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
        Route::get('/manage-withdrawals', [AdminPageController::class, 'renderWithdrawalsPage'])->name('adminManageWithdrawals');

        Route::post('approve-deposit/{id}', [AdminActionController::class, 'approveDeposit'])->name('adminApproveDeposit');
        Route::post('decline-withdrawal/{id}', [AdminActionController::class, 'declineDeposit'])->name('adminDeclineDeposit');
    });
});

