<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutLinks = \App\Models\AboutLink::all();
        return view('admin.about_links.index', compact('aboutLinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about_links.create');
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
            'url' => 'required',
        ]);

        \App\Models\AboutLink::create($request->all());

        return redirect()->route('admin.about_links.index')->with('success', 'About link created successfully.');
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
        $aboutLink = \App\Models\AboutLink::findOrFail($id);
        return view('admin.about_links.edit', compact('aboutLink'));
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
            'url' => 'required',
        ]);

        $aboutLink = \App\Models\AboutLink::findOrFail($id);
        $aboutLink->update($request->all());

        return redirect()->route('admin.about_links.index')->with('success', 'About link updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutLink = \App\Models\AboutLink::findOrFail($id);
        $aboutLink->delete();

        return redirect()->route('admin.about_links.index')->with('success', 'About link deleted successfully.');
    }
}
