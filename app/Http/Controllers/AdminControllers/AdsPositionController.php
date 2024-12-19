<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\AdsPosition;
use Illuminate\Http\Request;

class AdsPositionController extends Controller
{
    public function index()
    {
        $positions = AdsPosition::all();
        return view('admin_dashboard.ads_position.index', compact('positions'));
    }

    public function create()
    {
        return view('admin_dashboard.ads_position.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required|unique:ads_position,position',
            'price' => 'required|numeric|min:0',
        ]);

        AdsPosition::create($request->all());
        return redirect()->route('admin.ads_position.index')->with('success', 'Position created successfully.');
    }

    public function edit($id)
    {
        $position = AdsPosition::findOrFail($id);
        return view('admin_dashboard.ads_position.edit', compact('position'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'position' => 'required|unique:ads_position,position,' . $id,
            'price' => 'required|numeric|min:0',
        ]);

        $position = AdsPosition::findOrFail($id);
        $position->update($request->all());

        return redirect()->route('admin.ads_position.index')->with('success', 'Position updated successfully.');
    }

    public function destroy($id)
    {
        $position = AdsPosition::findOrFail($id);
        $position->delete();

        return redirect()->route('admin.ads_position.index')->with('success', 'Position deleted successfully.');
    }
}
