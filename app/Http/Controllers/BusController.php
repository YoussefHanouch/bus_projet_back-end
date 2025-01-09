<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class BusController extends Controller
{
    public function indexApi()
    {
        $buses = Bus::all();
        return response()->json($buses);
    }
    public function index()
    {
        $buses = Bus::simplePaginate(6);
        return view('buslign.index',compact('buses'));
    }
    public function create()
    {
        return view('buslign.create');
    }
    public function edit(Bus $bus)
    {
        return view('buslign.edit', compact('bus'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'numéro_de_bus' => 'required',
            'modèle' => 'required',
            'immatriculation' => 'required',
            'Origine' => 'required',
            'Destination' => 'required',
            'Tarifs' => 'required',
        ]);

        Bus::create($request->all());

        return redirect()->route('bus.index')->with('success', 'Bus créé avec succès.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bus $bus)
    {
        $request->validate([
            'numéro_de_bus' => 'required',
            'modèle' => 'required',
            'immatriculation' => 'required',
            'Origine' => 'required',
            'Destination' => 'required',
            'Tarifs' => 'required',
        ]);

        $bus->update($request->all());

        return redirect()->route('bus.index')->with('success', 'Bus mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
   
    
    public function destroy($busId)
    {
        // Find the bus by ID
        $bus = Bus::findOrFail($busId);
    
        // Delete all related records in the bus_arrete table
        $bus->arretes()->delete();
    
        // Now delete the bus
        $bus->delete();
    
        return redirect()->route('bus.index')->with('success', 'Bus supprimé avec succès !');
    }
    






}
