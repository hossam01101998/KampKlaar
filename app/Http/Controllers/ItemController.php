<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{


    public function index(Request $request)
    {

        $youthMovement = auth()->user()->youth_movement;

        // search bar
        $search = $request->input('search');

        //sortings
        $sortBy = $request->input('sort_by', 'item_id');
        $direction = $request->input('direction', 'asc');


        $user = Auth::user();
        $items = Item::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', '%' . $search . '%')
                         ->orWhere('description', 'LIKE', '%' . $search . '%')
                         ->orWhere('place', 'LIKE', '%' . $search . '%');
        })->orderBy($sortBy, $direction)
        ->where('youth_movement', $youthMovement)->get();


        return view('items.index', compact('items', 'user', 'search', 'sortBy', 'direction'));
    }

    public function create ()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'nullable|min:10|string',
            'quantity' => 'required|integer|min:1|max:9999',
            'place' => 'required|string|min:3|max:100'
        ]);


        Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'youth_movement' => Auth::user()->youth_movement,
            'place' => $request->place
        ]);


        return redirect()->route('items.index')->with('success', 'Artícle created succesfully.');
    }





    public function edit($id)
    {
        $item = Item::where('item_id', $id)->firstOrFail();
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'nullable|min:10|string',
            'quantity' => 'required|integer|min:1|max:9999',
            'place' => 'required|string|min:3|max:100',
        ]);


        $item = Item::where('item_id', $id)->firstOrFail();
        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Article updated successfully.');
    }

    public function show($id)
    {
        $youthMovement = auth()->user()->youth_movement;

        $item = Item::where('item_id', $id)
        ->where('youth_movement', $youthMovement)
        ->firstOrFail();

        if (!$item) {
            return redirect()->route('items.index')->with('error', 'Item not found');
        }


        return view('items.show', compact('item'));
    }

    public function destroy($id)
    {

        $item = Item::where('item_id', $id)->firstOrFail();
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }


}
