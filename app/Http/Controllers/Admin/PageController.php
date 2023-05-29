<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function renderWithdrawalsPage () {
        $withdrawals = Withdrawal::where('status', 'Pending')->get();
        return view('admin.withdrawals', compact(['withdrawals']));
    }
}
