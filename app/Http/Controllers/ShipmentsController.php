<?php

namespace App\Http\Controllers;

use App\Models\Shipments;
use Illuminate\Http\Request;

class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shipments = shipments::all();
        return view("shipments.index", compact("shipments"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("shipments.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cargo_id' => 'required|integer',
            'ship_id' => 'required|integer',
            'origin_port_id' => 'required|integer',
            'destination_port_id' => 'required|integer',
            'departure_date' => 'nullable|date',
            'arrival_estimate' => 'nullable|date',
            'actual_arrival_date' => 'nullable|date',
            'status' => 'required|in:pending,in_transit,delivered,delayed',
            'is_active' => 'boolean'
        ]);
        $shipments = shipments::create($request->all());    
        return redirect()->route('')->with('success','');

    }

    /**
     * Display the specified resource.
     */
    public function show(Shipments $shipments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipments $shipments)
    {
        $shipments = shipments::all();
        return view('shipments.edit', compact('shipments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipments $shipments)
    {
        $this->validate($request, [
            'cargo_id' => 'required|integer',
            'ship_id' => 'required|integer',
            'origin_port_id' => 'required|integer',
            'destination_port_id' => 'required|integer',
            'departure_date' => 'nullable|date',
            'arrival_estimate' => 'nullable|date',
            'actual_arrival_date' => 'nullable|date',
            'status' => 'required|in:pending,in_transit,delivered,delayed',
            'is_active' => 'boolean'
        ]);
        $shipments->update($request->all());
        return redirect()->route('')->with('success', '');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipments $shipments)
    {
        $shipments->delete();
        $this->authorize('delete', $shipments);
        $shipments->delete();
        return redirect()->route('')->with('success','');

    }
}
