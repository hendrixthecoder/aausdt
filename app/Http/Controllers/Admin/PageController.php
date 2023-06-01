<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\PaymentDetails;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function renderWithdrawalsPage () : View {
        $withdrawals = Withdrawal::where('status', 'Pending')->get();
        return view('admin.withdrawals', compact(['withdrawals']));
    }

    public function renderDepositsPage () : View {
        $deposits = Deposit::where('status', 'Pending')->get();
        return view('admin.deposits', compact(['deposits']));
    }

    public function renderPaymentDetailsPage () : View {
        $payment_details = PaymentDetails::all();
        return view('admin.payment-details', compact(['payment_details']));
    }
    
}
