<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PaymentDetails;
use App\Models\Rand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class PageController extends Controller
{
    public function renderQuestionsPage () : View {
        return view('questions');
    }

    public function renderWalletsPage (Request $request) : View  {
        $wallets = $request->user()->wallets;
        return view('wallet', compact(['wallets']));
    }

    public function renderDepositsPage (Request $request) {
        $deposits = $request->user()->deposits;
        $details = PaymentDetails::all();
        return view('deposits', compact(['deposits', 'details']));
    }

    public function renderWithdrawalsPage (Request $request) : View {
        $wallets = $request->user()->wallets;
        $withdrawals = $request->user()->withdrawals;
        $balance = $request->user()->balance();
        return view('withdrawal', compact(['wallets', 'withdrawals', 'balance']));
    }

    public function renderTransferPage (Request $request) : View {
        $balance = $request->user()->balance();
        return view('transfer', compact(['balance']));
    }

    public function getRand () {
        return response()->json([
            'data' => Rand::all()
        ]);
    }
}
