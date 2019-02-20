<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendingBills = Bill::orderBy('due_on', 'desc')
            ->where('status', 'Pending')
            ->get();
        return view('home', ['tab' => 'home', 'pendingBills' => $pendingBills]);
    }
}
