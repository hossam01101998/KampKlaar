<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DamageReport;
use App\Models\Item;

class DamageReportController extends Controller
{
    public function index()
    {
        $damageReports = DamageReport::with(['user', 'item'])->get();
        return view('damage_reports.index', compact('damageReports'));
    }

    public function show($id)
    {
       // $damageReport = DamageReport::with(['user', 'item'])->findOrFail($id);
       $damageReport = DamageReport::findOrFail($id);
        //dd($damageReport);
        return view('damage_reports.show', compact('damageReport'));
    }

    public function create()
    {
        $items = Item::all();
        return view('damage_reports.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'item_id' => 'required|exists:inventory,item_id',
        ]);

        // Create the damage report
        DamageReport::create([
            'user_id' => auth()->user()->user_id,
            'item_id' => $request->input('item_id'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('damage_reports.index')->with('success', 'Damage report created successfully!');
    }

   /* public function edit($id)
    {
        $damageReport = DamageReport::findOrFail($id);
        $items = Item::all();
        return view('damage_reports.edit', compact('damageReport', 'items'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'item_id' => 'required|exists:inventory,item_id',
        ]);

        $damageReport = DamageReport::findOrFail($id);
        $damageReport->update([
            'description' => $request->input('description'),
            'item_id' => $request->input('item_id'),
        ]);

        return redirect()->route('damage_reports.index')->with('success', 'Damage report updated successfully!');
    }*/

    public function destroy($id)
    {
        $damageReport = DamageReport::findOrFail($id);
        $damageReport->delete();

        return redirect()->route('damage_reports.index')->with('success', 'Damage report deleted successfully!');
    }
}
