<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function renderQuestionsPage () : View {
        return view('questions');
    }

    public function renderWalletsPage (Request $request) : View  {
        $wallets = $request->user()->wallets;
        return view('wallet', compact(['wallets']));
    }
}
