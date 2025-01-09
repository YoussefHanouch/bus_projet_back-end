<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrajetBus;
use App\Models\Bus;
use App\Models\BusArret;
use App\Models\Arret;
class TrajetBusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiIndex()
    {
        // Charger les trajets avec la relation bus préchargée
        $trajets = TrajetBus::with('bus')->get();
    
        // Préparer les données à retourner sous forme de tableau
        $trajetsData = $trajets->map(function ($trajet) {
            return [
                'id' => $trajet->id,
                'lieu_depart' => $trajet->lieu_depart,
                'lieu_arrivee' => $trajet->lieu_arrivee,
                'heure_depart' => $trajet->heure_depart,
                'heure_arrivee' => $trajet->heure_arrivee,
                'numéro_de_bus' => $trajet->bus->numéro_de_bus // Accéder au numéro de bus via la relation
            ];
        });
    
        // Retourner les données JSON
        return response()->json($trajetsData);
    }



    
    
    public function index()
    {
        $trajets = TrajetBus::paginate(4);
    
        
        return view('trajet.index', compact('trajets'));
    }
    public function getBusArrets()
    {
        $busArretes = BusArret::all();
        return response()->json($busArretes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Bus::paginate(4);
        $arrets = Arret::all();
        
        return view('trajet.create', compact('buses','arrets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'bus_id' => 'required',
            'lieu_depart' => 'required',
            'lieu_arrivee' => 'required',
            'heure_depart' => 'required',
            'heure_arrivee' => 'required',
        ]);

        // Création du trajet
        TrajetBus::create($request->all());

        // Redirection vers la liste des trajets avec un message
        return redirect()->route('trajet_bus.index')->with('success', 'Trajet créé avec succès.');
    }

    public function edit($id)
    {
        $trajet = TrajetBus::findOrFail($id);
        $arrets = Arret::all();
        $buses = Bus::all();
        return view('trajet.edit', compact('trajet', 'buses','arrets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'bus_id' => 'required',
            'lieu_depart' => 'required',
            'lieu_arrivee' => 'required',
            'heure_depart' => 'required',
            'heure_arrivee' => 'required',
        ]);

        // Recherche du trajet à mettre à jour
        $trajet = TrajetBus::findOrFail($id);

        // Mise à jour des données du trajet
        $trajet->update($request->all());

        // Redirection vers la liste des trajets avec un message
        return redirect()->route('trajet_bus.index')->with('success', 'Trajet mis à jour avec succès.');
    }
        public function destroy($id)
    {
        $trajet = TrajetBus::findOrFail($id);
        $trajet->delete();
        return redirect()->route('trajet_bus.index')->with('success', 'Trajet supprimé avec succès.');
   
}
}

