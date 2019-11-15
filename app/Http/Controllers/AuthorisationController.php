<?php

namespace App\Http\Controllers;

use App\Authorisation;
use App\Services\FileService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthorisationController extends Controller
{
    private $types = [
        'licence' => 'Licence',
        'passport' => 'Passport'
    ];

    private $notifyPeriods = [
        '1' => 'A day',
        '2' => 'Two days',
        '7' => 'A week',
        '30' => 'A month',
        '90' => 'Three months',
        '180' => 'Six months',
        '365' => 'A year'
    ];

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
        $authorisations = Authorisation::get();
        return view('authorisations.index', [
            'tab' => 'authorisations',
            'authorisations' => $authorisations,
            'types' => $this->types,
            'notifyPeriods' => $this->notifyPeriods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authorisations.form', [
            'tab' => 'authorisations',
            'types' => $this->types,
            'notifyPeriods' => $this->notifyPeriods
        ]);
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
        $data['valid_from'] = Carbon::createFromFormat('d/m/Y', $data['valid_from'])->format('Y-m-d');
        $data['valid_until'] = Carbon::createFromFormat('d/m/Y', $data['valid_until'])->format('Y-m-d');
        $data['file_id'] = $fileService->save($request);

        $authorisation = Authorisation::create($data);
        return redirect('/authorisations/' . $authorisation->id . '/edit');
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
        $authorisation = Authorisation::find($id);

        return view('authorisations.form', [
            'tab' => 'authorisations',
            'authorisation' => $authorisation,
            'types' => $this->types,
            'notifyPeriods' => $this->notifyPeriods
        ]);
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
        $data = $request->all();
        $data['valid_from'] = Carbon::createFromFormat('d/m/Y', $data['valid_from'])->format('Y-m-d');
        $data['valid_until'] = Carbon::createFromFormat('d/m/Y', $data['valid_until'])->format('Y-m-d');
        $data['file_id'] = $fileService->save($request);

        $authorisation = Authorisation::find($id);
        $authorisation->fill($data);
        $authorisation->save();

        return redirect('/authorisations/' . $authorisation->id . '/edit');
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
