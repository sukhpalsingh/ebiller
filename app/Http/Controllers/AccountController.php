<?php

namespace App\Http\Controllers;

use App\Account;
use App\Icon;
use Illuminate\Http\Request;

class AccountController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::get();
        return view('accounts.index', ['tab' => 'accounts', 'accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.form', ['tab' => 'accounts']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = Account::create($request->all());
        $request->file('icon')->storeAs(
            'icons',
            'account_' . $account->id
        );
        return $this->edit($account->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::where('id', $id)
            ->firstOrFail();

        $icon = Icon::where('id', $account->icon_id)
            ->first();

        return view('accounts.form', ['tab' => 'accounts', 'account' => $account, 'icon' => $icon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $account = Account::where('id', $id)
            ->firstOrFail();

        $data = $request->all();
        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('icons');
            $icon = new Icon();
            $icon->path = $path;
            $icon->save();
            $data['icon_id'] = $icon->id;
        }

        $account->fill($data)
            ->update();

        return $this->edit($account->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
