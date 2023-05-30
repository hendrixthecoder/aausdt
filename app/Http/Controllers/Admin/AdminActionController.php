<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminActionController extends Controller
{
    public function approveWithdrawal ($id) {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->status = 'Processed';
        $withdrawal->save();

        return back()->with('success', 'Withdrawal approved successfully!');
    }

    public function declinewithdrawal ($id) {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->status = 'Declined';
        $withdrawal->save();

        return back()->with('success', 'Withdrawal declined successfully!');
    }

    public function approveDeposit ($id) {
        $deposit = Deposit::findOrFail($id);
        $deposit->status = "Processed";
        $deposit->save();

        return back()->with('success', 'Deposit approved successfully!');
    }

    public function declineDeposit ($id) {
        $deposit = Deposit::findOrFail($id);
        $deposit->status = "Declined";
        $deposit->save();

        //delete decline deposit file after declining, yo are welcome!😙😉
        Storage::disk('public')->delete($deposit->path);

        return back()->with('success', 'Deposit declined successfully!');
    }

}
