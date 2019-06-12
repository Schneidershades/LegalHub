<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\RegistrationTransaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.home');
    }

    public function activities()
    {
        $transactions = RegistrationTransaction::where('user_id', Auth::id())->get();

        
        return view('backend.activity')
            ->with('transactions', $transactions);
    }
}
