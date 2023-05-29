<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\User;
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

        //check if user has sufficient funds to make a withdrawal
        if($request->user()->balance() > $validated['amount']){

            //validate the trade key, if trade key matches allow the transaction
            if($validated['trade_key'] == $request->user()->trade_key){
                $validated['user_id'] = $request->user()->id;
                
                $validated['status'] = 'Pending';
    
                Withdrawal::create($validated);
    
                return back()->with('success', 'Withdrawal made successfully, wait for for approval!');
            }

            return back()->with('error', 'Trade Key Invalid!');
        }
        
        return back()->with('error', 'Insufficient funds!');

    }

    public function createTransfer (Request $request) {
        $validated = $request->validate([
            'account' => 'bail|required|alpha_num|exists:users,username',
            'amount' => 'bail|required|numeric'
        ]);

        if($request->user()->balance() > $validated['amount']){

            //avoiding the user sending money to themselves cuz wth💀
            if($validated['account'] != $request->user()->username) {
                $validated['sender_id'] = $request->user()->id;
                $validated['receiver_id'] = User::where('username', $validated['account'])->first()->id;
                
                Transaction::create($validated);
    
                return back()->with('success', 'Transfer successful!');
            }

            return back()->with('error', 'You can only make external transfers!');
        }

        return back()->with('error', 'Insufficient funds!');
    }
}
