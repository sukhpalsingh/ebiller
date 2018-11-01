<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccountTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Account $account)
    {
        $transactions = Transaction::get();
        return view('transactions.index', ['tab' => 'accounts', 'transactions' => $transactions, 'account' => $account]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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

    public function importCreate($accountId)
    {
        $account = Account::where('id', $accountId)->firstOrFail();
        return view('transactions.import', ['tab' => 'accounts', 'account' => $account]);
    }

    public function import($accountId, Request $request)
    {
        if (! $request->hasFile('file')) {
            abort(400, 'File is required.');
        }

        $fileObj = $request->file('file');
        $file = $fileObj->openFile('r');

        $columns = [];
        $sampleData = [
            'date' => null,
            'type' => null,
            'type_details' => null,
            'amount' => null,
            'description' => null,
            'balance' => null
        ];

        while($values = $file->fgetcsv()) {
            if (empty($values[0])) {
                continue;
            }

            if (empty($columns)) {
                $columns = $values;
                continue;
            }

            $rowData = array_combine($columns, $values);

            if (empty($rowData['date']) || empty($rowData['amount']) || empty($rowData['balance'])) {
                abort(400, 'Invalid data');
            }

            $data = [];
            foreach ($sampleData as $column => $value) {
                if (empty($rowData[$column])) {
                    $data[$column] = $value;
                } else {
                    $data[$column] = $rowData[$column];
                }
            }

            $data['date'] = Carbon::createFromFormat('d M y', $data['date'])->format('Y-m-d');
            $data['amount'] = floatval($data['amount']);
            $data['balance'] = floatval($data['balance']);
            $data['type'] = $data['amount'] < 0 ? 'debit' : 'credit';
            $data['account_id'] = $accountId;

            $transaction = Transaction::where('date', $data['date'])
                ->where('amount', $data['amount'])
                ->where('balance', $data['balance'])
                ->first();
            if (empty($transaction)) {
                Transaction::create($data);
            }
        }

    }
}
