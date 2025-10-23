<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::orderBy('order')->get();
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
        ]);

        $data = $request->except(['_token', 'image']);

        if ($request->hasFile('image')) {
            $data['image'] = uploadFile($request->file('image'), 'promotions');
        }

        Promotion::create($data);

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion created successfully.');
    }

    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
        ]);

        $data = $request->except(['_token', '_method', 'image']);

        if ($request->hasFile('image')) {
            $data['image'] = uploadFile($request->file('image'), 'promotions');
        }

        $promotion->update($data);

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion updated successfully.');
    }

    public function destroy(Promotion $promotion)
    {
        if ($promotion->image) {
            Storage::disk('public')->delete($promotion->image);
        }
        $promotion->delete();

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion deleted successfully.');
    }
}