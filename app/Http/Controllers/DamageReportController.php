<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DamageReport;
use App\Models\Item;

class DamageReportController extends Controller
{
    public function index()
    {
        $userYouthMovement = auth()->user()->youth_movement;

        $items = Item::where('youth_movement', $userYouthMovement)->pluck('item_id');

        $damageReports = DamageReport::whereIn('item_id', $items)
        ->with(['item', 'user'])
        ->get();


        return view('damage_reports.index', compact('damageReports'));
    }

    public function show($id)
    {
        $damageReport = DamageReport::with(['user', 'item'])->findOrFail($id);

        $userYouthMovement = auth()->user()->youth_movement;

    if ($damageReport->item->youth_movement !== $userYouthMovement) {
        abort(403, 'You are not authorized to view this damage report.');
    }

        return view('damage_reports.show', compact('damageReport'));
    }

    public function create()
    {

        $userYouthMovement = auth()->user()->youth_movement;

        $items = Item::where('youth_movement', $userYouthMovement)->get();
        return view('damage_reports.create', compact('items'));
    }

    public function store(Request $request)
    {

        $userYouthMovement = auth()->user()->youth_movement;

        $request->validate([
            'description' => 'required',
            'item_id' => 'required|exists:inventory,item_id',
        ]);
            $item = Item::find($request->input('item_id'));

            if (!$item) {
                return back()->withErrors(['item_id' => 'The selected item does not exist.']);
            }
            if ($item->youth_movement !== $userYouthMovement) {
                return back()->withErrors(['item_id' => 'The selected item does not belong to your youth movement.']);
            }

            $photoPath = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/damage_photos'), $photoName);
            $photoPath = 'images/damage_photos/' . $photoName;
        }


        DamageReport::create([
            'user_id' => auth()->user()->user_id,
            'item_id' => $request->input('item_id'),
            'description' => $request->input('description'),
            'photo' => $photoPath,
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

        if (auth()->user()->isadmin || auth()->user()->id === $damageReport->user_id) {
        $damageReport->delete();

        return redirect()->route('damage_reports.index')->with('success', 'Damage report deleted successfully!');
        }

        return redirect()->route('damage_reports.index')->with('error', 'You do not have permission to delete this damage report.');

    }
}
