<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Monarobase\CountryList\CountryListFacade;

class AuthController extends Controller
{
    public function renderLoginPage () {
        return view('login');
    }

    public function postLoginUser (Request $request) {
        $credentials = $request->validate([
            'email' => 'bail|required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }

    public function renderRegisterPage () {
        $countries = CountryListFacade::getList('en');
        return view('register', compact('countries'));
    }

    public function postRegisterUser (Request $request) {
        $validated = $request->validate([
            'username' => 'bail|required|alpha_num|min:6|unique:users,username',
            'email' => 'bail|required|email|unique:users,email,',
            'country' => 'required|alpha|',
            'number' => 'bail|required|numeric|min:8',
            'password' => 'bail|required|min:8|confirmed|alpha_num',
            'password_confirmation' => 'bail|required|min:8|alpha_num',
            'trade_key' => 'bail|required|min:8|alpha_num|confirmed',
            'trade_key_confirmation' => 'bail|required|min:8|alpha_num'
        ]);

        $validated['password'] = Hash::make($request->password);
        $user = User::create($validated);
        Auth::login($user);

        return redirect()->route('userHome');

    }

    
}
