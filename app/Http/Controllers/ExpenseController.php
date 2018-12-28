<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseItem;
use App\Services\FileService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
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
        $expenses = Expense::get();
        return view('expenses.index', ['tab' => 'expenses', 'expenses' => $expenses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.form', ['tab' => 'expenses', 'expense' => new Expense()]);
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
        $data['spent_on'] = Carbon::createFromFormat('d/m/Y', $data['spent_on'])->format('Y-m-d');
        $expense = Expense::create($data);

        ExpenseItem::create([
            'expense_id' => $expense->id,
            'description' => $request->description,
            'tax_rate' => 10,
            'amount' => $request->amount
        ]);

        return $this->edit($expense->id);
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
        $expense = Expense::findOrFail($id);
        return view('expenses.form', ['tab' => 'expenses', 'expense' => $expense]);
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
        $expense = Expense::findOrFail($id);
        $expense->file_id = $fileService->save($request, 'expense');
        $expense->save();

        return $this->edit($expense->id);
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
