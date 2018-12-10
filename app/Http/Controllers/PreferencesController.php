<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreferencesController extends Controller
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
    public function edit()
    {
        $user = Auth::User();
        return view('preferences.form', ['tab' => 'preferences', 'user' => $user]);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->has('current_password') && $request->has('new_password') && $request->has('confirm_password')) {
            $credentials = ['email' => Auth::user()->email, 'password' => $request->current_password];
            if (Auth::validate($credentials) &&
                $request->new_password === $request->confirm_password
            ) {
                $user->password = bcrypt($request->new_password);
            }
        }

        $user->update();
        return redirect('/preferences/' . $user->id . '/edit');
    }
}
