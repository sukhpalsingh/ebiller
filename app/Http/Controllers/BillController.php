<?php

namespace App\Http\Controllers;

use App\Account;
use App\Bill;
use App\BillCategory;
use App\Services\FileService;
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
        $bills = Bill::orderBy('due_on', 'desc')->get();
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
    public function store(Request $request, FileService $fileService)
    {
        $data = $request->all();
        $data['due_on'] = Carbon::createFromFormat('d/m/Y', $data['due_on'])->format('Y-m-d');
        $data['auto_pay'] = (isset($data['auto_pay']) && $data['auto_pay'] === 'true') ? true : false;
        $data['file_id'] = $fileService->save($request);
        $bill = Bill::create($data);
        return redirect('/bills/' . $bill->id . '/edit');
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
    public function update(Request $request, $id, FileService $fileService)
    {
        $bill = Bill::where('id', $id)
            ->firstOrFail();

        $data = $request->all();

        if (empty($bill->file_id)) {
            $data['file_id'] = $fileService->save($request);
        }

        $data['due_on'] = Carbon::createFromFormat('d/m/Y', $data['due_on'])->format('Y-m-d');
        $data['auto_pay'] = (isset($data['auto_pay']) && $data['auto_pay'] === 'true') ? true : false;

        $bill->fill($data)
            ->update();

        return redirect('/bills/' . $bill->id . '/edit');
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
