<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
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

        if($validated['trade_key'] == $request->user()->trade_key){
            $validated['user_id'] = $request->user()->id;
            $path = $validated['proof']->store('proof','public');
    
            $validated['path'] = $path;
            $validated['status'] = 'Pending';

            Deposit::create($validated);

            return back()->with('success', 'Deposit made succssfully, wait for for approval!');
        }

        return back()->with('error', 'Trade Key Invalid!');
    }
}
