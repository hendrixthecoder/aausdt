<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserActionController extends Controller
{
    public function addWalletPost (Request $request) {
        $validated = $request->validate([
            'wallet_address' => 'bail|required|alpha_num|',
            'wallet_address_type' => 'bail|required|',
            'trade_key' => 'bail|required|exists:users,trade_key'
        ]);

        $validated['user_id'] = $request->user()->id;

        if($validated['trade_key'] == $request->user()->trade_key){
            Wallet::create($validated);
    
            return back()->with('success', 'Wallet Added Successfully!');
        }
        
        return back()->with('error', 'Invalid Trade Key!');
    }

    public function walletPut (Request $request) {
        $wallet = Wallet::findOrFail($request->id);

        if($wallet){
            $validated = $request->validate([
                'wallet_address' => 'bail|required|alpha_num|',
                'wallet_address_type' => 'bail|required|',
                'trade_key' => 'bail|required|exists:users,trade_key'
            ]);

            if($validated['trade_key'] == $request->user()->trade_key){
                $wallet->wallet_address = $validated['wallet_address'];
                $wallet->wallet_address_type = $validated['wallet_address_type'];

                $wallet->save();
        
                return back()->with('success', 'Wallet Updated Successfully!');
            }

        }

        return back()->with('error', 'Wallet not found');

    }
}
