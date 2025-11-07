<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeadOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headOffices = \App\Models\HeadOffice::all();
        return view('admin.head_offices.index', compact('headOffices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.head_offices.create');
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

        \App\Models\HeadOffice::create($request->all());

        return redirect()->route('admin.head_offices.index')->with('success', 'Head office created successfully.');
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
        $headOffice = \App\Models\HeadOffice::findOrFail($id);
        return view('admin.head_offices.edit', compact('headOffice'));
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

        $headOffice = \App\Models\HeadOffice::findOrFail($id);
        $headOffice->update($request->all());

        return redirect()->route('admin.head_offices.index')->with('success', 'Head office updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $headOffice = \App\Models\HeadOffice::findOrFail($id);
        $headOffice->delete();

        return redirect()->route('admin.head_offices.index')->with('success', 'Head office deleted successfully.');
    }
}
