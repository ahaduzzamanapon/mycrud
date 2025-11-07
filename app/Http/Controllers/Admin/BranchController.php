<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = \App\Models\Branch::all();
        return view('admin.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.branches.create');
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
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required|string|max:255|unique:frontend_manager_branches',
        ]);

        $branch = new \App\Models\Branch($request->except('logo'));

        if ($request->hasFile('logo')) {
            $imageName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('images/branches'), $imageName);
            $branch->logo = 'images/branches/'.$imageName;
        }

        $branch->save();

        return redirect()->route('admin.branches.index')->with('success', 'Branch created successfully.');
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
        $branch = \App\Models\Branch::findOrFail($id);
        return view('admin.branches.edit', compact('branch'));
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
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required|string|max:255|unique:frontend_manager_branches,slug,'.$id,
        ]);

        $branch = \App\Models\Branch::findOrFail($id);
        $branch->fill($request->except('logo'));

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($branch->logo && file_exists(public_path($branch->logo))) {
                unlink(public_path($branch->logo));
            }
            $imageName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('images/branches'), $imageName);
            $branch->logo = 'images/branches/'.$imageName;
        }

        $branch->save();

        return redirect()->route('admin.branches.index')->with('success', 'Branch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy($id)
    {
        $branch = \App\Models\Branch::findOrFail($id);
        // Delete logo if exists
        if ($branch->logo && file_exists(public_path($branch->logo))) {
            unlink(public_path($branch->logo));
        }
        $branch->delete();

        return redirect()->route('admin.branches.index')->with('success', 'Branch deleted successfully.');
    }

    public function getCategories(\App\Models\Branch $branch)
    {
        return response()->json($branch->categories);
    }
}
