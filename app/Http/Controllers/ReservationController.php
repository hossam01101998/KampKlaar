<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{


    public function index(Request $request)
    {

        $search = $request->input('search'); // Término de búsqueda general
        $sortBy = $request->input('sort_by', 'reservation_id'); // Ordenar por
        $direction = $request->input('direction', 'asc'); // Dirección de ordenamiento (asc/desc)

        $reservations = Reservation::with(['user', 'item'])
        ->when($search, function ($query, $search) {
            return $query->whereHas('user', function ($q) use ($search) {
                $q->where('username', 'like', '%' . $search . '%');
            })
            ->orWhereHas('item', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->orWhere('start_date', 'like', '%' . $search . '%')
            ->orWhere('end_date', 'like', '%' . $search . '%');
        })
        ->orderBy($sortBy, $direction)
        ->get();

        return view('reservations.index', compact('reservations', 'search', 'sortBy', 'direction'));
    }


    public function create($item_id)
{

    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to make a reservation.');
    }

    $user_id = Auth::user()->user_id;
    return view('reservations.create', compact('user_id', 'item_id'));
}


    public function store(Request $request)
{
    $request->validate([

        'start_date' => 'required|date|before_or_equal:end_date',
        'end_date' => 'required|date|after:start_date',
        'quantity' => 'required|integer|min:1',
        'item_id' => 'required|exists:inventory,item_id'

    ], [
        'start_date.before_or_equal' => 'The start date must be before or equal to the end date.',
        'end_date.after' => 'The end date must be after the start date.',
    ]);

    $item = Item::findOrFail($request->item_id);


    if ($request->quantity > $item->quantity) {

        return back()->with('error', 'The quantity is higher than stock.');
    }

    $item->decrement('quantity', $request->quantity);

    Reservation::create([
        'user_id' => $request->user_id,
        'item_id' => $request->item_id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'quantity' => $request->quantity,
        'status' => true,  // by default it will be condirmed
        ]);


        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function show($id)
    {
        $reservation = Reservation::with(['user', 'item'])->where('reservation_id', $id)->firstOrFail();
        return view('reservations.show', compact('reservation'));
    }

   /* public function edit($id)
    {
        $reservation = Reservation::where('reservation_id', $id)->firstOrFail();
        $users = User::all();
        //$items = Item::all();
        $item = Item::findOrFail($reservation->item_id);
        return view('reservations.edit', compact('reservation', 'users', 'items'));
    }
        */

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);

        $item = Item::findOrFail($reservation->item_id);

        return view('reservations.edit', compact('reservation', 'item'));
    }


public function update(Request $request, $id)
{
    $reservation = Reservation::findOrFail($id);

    if ($reservation->status == false) {
        return back()->withErrors(['status' => 'This reservation has been canceled and cannot be edited.']);
    }
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'quantity' => 'required|integer|min:1',
        'status' => 'required|boolean',

    ]);


    $item = Item::findOrFail($reservation->item_id);


    //check firts if the quantity is higher than the stock

    $quantityChange = $request->quantity - $reservation->quantity;

    if ($quantityChange > 0 && $quantityChange > $item->quantity) {
        return back()->withErrors(['quantity' => 'The quantity is higher than stock.']);
    }

    $item->decrement('quantity', $quantityChange);



    if ($request->status == false && $reservation->status == true) {
        $item->increment('quantity', $reservation->quantity);
    }


    $reservation->update([
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'quantity' => $request->quantity,
        'status' => $request->status,
    ]);

    if (Auth::user()->role == 'admin') {
        $validatedData['status'] = $request->input('status', $reservation->status);
    } else {
        $validatedData['status'] = $reservation->status;
    }

    $reservation->update($validatedData);


    return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
}


    public function destroy($id)
    {
        $reservation = Reservation::where('reservation_id', $id)->firstOrFail();

        $item = Item::findOrFail($reservation->item_id);

        if ($reservation->status) {
            $item->increment('quantity', $reservation->quantity);
        }

        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
