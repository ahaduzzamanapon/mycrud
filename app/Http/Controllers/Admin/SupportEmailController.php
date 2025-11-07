<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supportEmails = \App\Models\SupportEmail::all();
        return view('admin.support_emails.index', compact('supportEmails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.support_emails.create');
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
            'email' => 'required|email',
        ]);

        \App\Models\SupportEmail::create($request->all());

        return redirect()->route('admin.support_emails.index')->with('success', 'Support email created successfully.');
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
        $supportEmail = \App\Models\SupportEmail::findOrFail($id);
        return view('admin.support_emails.edit', compact('supportEmail'));
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
            'email' => 'required|email',
        ]);

        $supportEmail = \App\Models\SupportEmail::findOrFail($id);
        $supportEmail->update($request->all());

        return redirect()->route('admin.support_emails.index')->with('success', 'Support email updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supportEmail = \App\Models\SupportEmail::findOrFail($id);
        $supportEmail->delete();

        return redirect()->route('admin.support_emails.index')->with('success', 'Support email deleted successfully.');
    }
}
