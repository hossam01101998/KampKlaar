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
        if (!auth()->user()->isadmin) {
            return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        }

        return view('items.create');
    }

    public function store(Request $request)
    {

        if (!auth()->user()->isadmin) {
            return redirect()->route('home')->with('error', 'You do not have permission to create an item.');
        }

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/item_photos'), $photoName);
            $photoPath = 'images/item_photos/' . $photoName;
        }


        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'nullable|min:10|string',
            'quantity' => 'required|integer|min:1|max:9999',
            'place' => 'required|string|min:3|max:100',
            //'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        //dd($request->all());


        Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'youth_movement' => Auth::user()->youth_movement,
            'place' => $request->place,
            'photo' => $photoPath,
        ]);

        return redirect()->route('items.index')->with('success', 'Article created succesfully.');
    }





    public function edit($id)
    {
        if (!auth()->user()->isadmin) {
            return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        }

        $item = Item::where('item_id', $id)->firstOrFail();
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {

        if (!auth()->user()->isadmin) {
            return redirect()->route('home')->with('error', 'You do not have permission to update an item.');
        }

        $item = Item::where('item_id', $id)->firstOrFail();

        $photoPath = $item->photo;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/item_photos'), $photoName);
            $photoPath = 'images/item_photos/' . $photoName;
        }

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'nullable|min:10|string',
            'quantity' => 'required|integer|min:1|max:9999',
            'place' => 'required|string|min:3|max:100',
            //'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        //$item->update($request->all());
        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'place' => $request->place,
            'photo' => $photoPath,
        ]);

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

        if (!auth()->user()->isadmin) {
            return redirect()->route('home')->with('error', 'You do not have permission to delete an item.');
        }

        $item = Item::where('item_id', $id)->firstOrFail();
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }


}
