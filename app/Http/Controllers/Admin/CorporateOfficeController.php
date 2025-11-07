<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CorporateOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corporateOffices = \App\Models\CorporateOffice::all();
        return view('admin.corporate_offices.index', compact('corporateOffices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.corporate_offices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'address_line1' => 'required',
            'phone' => 'required',
        ]);

        \App\Models\CorporateOffice::create($request->all());

        return redirect()->route('admin.corporate_offices.index')->with('success', 'Corporate office created successfully.');
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
        $corporateOffice = \App\Models\CorporateOffice::findOrFail($id);
        return view('admin.corporate_offices.edit', compact('corporateOffice'));
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
        $request->validate([
            'address_line1' => 'required',
            'phone' => 'required',
        ]);

        $corporateOffice = \App\Models\CorporateOffice::findOrFail($id);
        $corporateOffice->update($request->all());

        return redirect()->route('admin.corporate_offices.index')->with('success', 'Corporate office updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $corporateOffice = \App\Models\CorporateOffice::findOrFail($id);
        $corporateOffice->delete();

        return redirect()->route('admin.corporate_offices.index')->with('success', 'Corporate office deleted successfully.');
    }
}
