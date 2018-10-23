<?php

namespace App\Http\Controllers;

use App\BillCategory;
use App\Icon;
use Illuminate\Http\Request;

class BillCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BillCategory::get();
        return view('bill-categories.index', ['tab' => 'bills', 'categories' => $categories]);
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
        $billCategory = BillCategory::where('id', $id)->firstOrFail();

        $icon = Icon::where('id', $billCategory->icon_id)->first();

        return view(
            'bill-categories.form',
            [
                'tab' => 'bills',
                'billCategory' => $billCategory,
                'icon' => $icon
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
        $billCategory = BillCategory::where('id', $id)
            ->firstOrFail();

        $data = $request->all();
        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('icons');
            $icon = new Icon();
            $icon->path = $path;
            $icon->save();
            $data['icon_id'] = $icon->id;
        }

        $billCategory->fill($data)
            ->update();

        return $this->edit($billCategory->id);
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
