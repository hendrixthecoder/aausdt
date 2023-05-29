<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;


class AdminActionController extends Controller
{
    public function approveDeposit ($id) {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->status = 'Processed';
        $withdrawal->save();

        return back()->with('success', 'Withdrawal approved successfully!');
    }

    public function declineDeposit ($id) {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->status = 'Declined';
        $withdrawal->save();

        return back()->with('success', 'Withdrawal declined successfully!');
    }

}
