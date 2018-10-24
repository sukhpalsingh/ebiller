<?php

namespace App\Http\Controllers;

use App\Account;
use App\Bill;
use App\BillCategory;
use App\File;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillController extends Controller
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

    private $statusOptions = [
        'Pending',
        'Paid'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::get();
        return view('bills.index', ['tab' => 'bills', 'bills' => $bills]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BillCategory::get();
        $accounts = Account::get();
        return view(
            'bills.form',
            [
                'tab' => 'bills',
                'categories' => $categories,
                'accounts' => $accounts,
                'statusOptions' => $this->statusOptions
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['due_on'] = Carbon::createFromFormat('d/m/Y', $data['due_on'])->format('Y-m-d');
        $data['auto_pay'] = (isset($data['auto_pay']) && $data['auto_pay'] === 'true') ? true : false;
        $bill = Bill::create($data);
        $this->edit($bill->id);
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
        $bill = Bill::where('id', $id)->firstOrFail();
        $categories = BillCategory::get();
        $accounts = Account::get();
        return view(
            'bills.form',
            [
                'tab' => 'bills',
                'categories' => $categories,
                'accounts' => $accounts,
                'statusOptions' => $this->statusOptions,
                'bill' => $bill
            ]
        );
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
        $bill = Bill::where('id', $id)
            ->firstOrFail();

        $data = $request->all();
        $data['auto_pay'] = (isset($data['auto_pay']) && $data['auto_pay'] === 'true') ? true : false;
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('files');
            $file = new File();
            $file->category = 'bill';
            $file->path = $path;
            $file->save();
            $data['file_id'] = $file->id;
        }

        $bill->fill($data)
            ->update();
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
