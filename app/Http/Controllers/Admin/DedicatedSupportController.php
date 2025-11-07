<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DedicatedSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dedicatedSupports = \App\Models\DedicatedSupport::all();
        return view('admin.dedicated_supports.index', compact('dedicatedSupports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dedicated_supports.create');
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
            'title' => 'required',
            'number' => 'required',
        ]);

        \App\Models\DedicatedSupport::create($request->all());

        return redirect()->route('admin.dedicated_supports.index')->with('success', 'Dedicated support created successfully.');
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
        $dedicatedSupport = \App\Models\DedicatedSupport::findOrFail($id);
        return view('admin.dedicated_supports.edit', compact('dedicatedSupport'));
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
            'title' => 'required',
            'number' => 'required',
        ]);

        $dedicatedSupport = \App\Models\DedicatedSupport::findOrFail($id);
        $dedicatedSupport->update($request->all());

        return redirect()->route('admin.dedicated_supports.index')->with('success', 'Dedicated support updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dedicatedSupport = \App\Models\DedicatedSupport::findOrFail($id);
        $dedicatedSupport->delete();

        return redirect()->route('admin.dedicated_supports.index')->with('success', 'Dedicated support deleted successfully.');
    }
}
