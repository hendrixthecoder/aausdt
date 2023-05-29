<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FundsController extends Controller
{
    public function createDeposit (Request $request) {
        $validated = $request->validate([
            'proof' => 'bail|required|mimes:png,jpg,jpeg|max:10240',
            'amount' => 'bail|required|numeric',
            'trade_key' => 'bail|required|exists:users,trade_key'
        ]);

        //validate the trade key, if trade key matches allow the transaction

        if($validated['trade_key'] == $request->user()->trade_key){
            $validated['user_id'] = $request->user()->id;
            //save image in the public disk and return the relative path
            $path = $validated['proof']->store('proof','public');
    
            $validated['path'] = $path;
            $validated['status'] = 'Pending';

            Deposit::create($validated);

            return back()->with('success', 'Deposit made succssfully, wait for for approval!');
        }

        return back()->with('error', 'Trade Key Invalid!');
    }

    public function createWithdrawal (Request $request) {
        $validated = $request->validate([
            'wallet' => 'bail|required|string',
            'amount' => 'bail|required|numeric',
            'trade_key' => 'bail|required|exists:users,trade_key'
        ]);

        //validate the trade key, if trade key matches allow the transaction
        if($validated['trade_key'] == $request->user()->trade_key){
            $validated['user_id'] = $request->user()->id;
            
            $validated['status'] = 'Pending';

            Withdrawal::create($validated);

            return back()->with('success', 'Withdrawal made successfully, wait for for approval!');
        }

        return back()->with('error', 'Trade Key Invalid!');
    }
}
