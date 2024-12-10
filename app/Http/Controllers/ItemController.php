<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{


    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create ()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'youth_movement' => 'required|string|max:100',
            'place' => 'required|string|max:100'
        ]);


        Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'youth_movement' => $request->youth_movement,
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'youth_movement' => 'required|string|max:100',
            'place' => 'required|string|max:100',
        ]);


        $item = Item::where('item_id', $id)->firstOrFail();
        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Article updated successfully.');
    }

    public function show($id)
    {

        $item = Item::where('item_id', $id)->firstOrFail();
        return view('items.show', compact('item'));
    }

    public function destroy($id)
    {
        
        $item = Item::where('item_id', $id)->firstOrFail();
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }


}
