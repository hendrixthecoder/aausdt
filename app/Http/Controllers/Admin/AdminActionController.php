<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Http\Controllers\Controller;
use App\Models\PaymentDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

        //delete decline deposit file after declining, you are welcome!😙😉
        Storage::disk('public')->delete($deposit->path);

        return back()->with('success', 'Deposit declined successfully!');
    }

    public function createPaymentDetail (Request $request) {

        dd('lmao');

        $validator = $request->validate([
            'wallet_address_type' => 'bail|required|alpha_num',
            'wallet_address' => 'bail|required|alpha_num'
        ]);

        PaymentDetails::create($validator);
        return back()->with('success', 'Payment Method added succesfully');

    }

    public function putPaymentDetail ($id, Request $request) {
        
        $validator = $request->validate([
            'wallet_address_type' => 'bail|required|alpha_num',
            'wallet_address' => 'bail|required|alpha_num'
        ]);
        
        $detail = PaymentDetails::findOrFail($id);
        
        $detail->wallet_address = $validator['wallet_address'];
        $detail->wallet_address_type = $validator['wallet_address_type'];
        $detail->save();

        return back()->with('success', 'Payment Detail edited successfully');
    }

}