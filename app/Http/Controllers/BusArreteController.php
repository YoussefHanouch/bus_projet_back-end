<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;
use App\Models\BusArret;
use App\Models\Bus;
use App\Models\Arret;

class BusArreteController extends Controller
{
    // public function getBusArrets($busId)
    // {
    //     $busArretes = BusArret::where('bus_id', $busId)->get();
    //     return response()->json($busArretes);
    // }

    public function index()
    {
        // Récupérer tous les bus avec leurs arrêts
        $buses = Bus::with('arrets')->get();
    
        // Formatter les données pour envoyer uniquement les numéros de bus et les arrêts
        $formattedData = $buses->map(function ($bus) {
            return [
                'numéro_de_bus' => $bus->numéro_de_bus,
                'arrets' => $bus->arrets->map(function ($arret) {
                    return [
                        'lieu_arrete' => $arret->lieu_arrete,
                        'heure_arete' => $arret->heure_arete,
                    ];
                }),
            ];
        });
    
        // Retourner les données formatées au format JSON
        return Response::json($formattedData);
    }
  
    // public function create()
    // {
    //     $buses = Bus::all();
    //     $arrets = Arret::all();
        
    //     return view('bus_arrete.create', compact('buses', 'arrets'));
    // }

    public function create()
    {
        $buses = Bus::all();
        $arrets = Arret::all();
        $heureArretes = Arret::pluck('heure_arete')->toArray(); // Récupérer les heures d'arrêt existantes
        
        return view('bus_arrete.create', compact('buses', 'arrets', 'heureArretes'));
    }
    

    public function Apiarret()
    {
        // Récupérer tous les bus avec leurs arrêts
        $buses = Bus::with('arrets')->get();
    
        // Formatage des données pour inclure le numéro de bus avec chaque arrêt
        $formattedData = $buses->map(function ($bus) {
            $arrets = $bus->arrets->map(function ($arret) use ($bus) {
                return [
                    'numéro_de_bus' => $bus->numéro_de_bus,
                    'lieu_arrete' => $arret->lieu_arrete,
                    'heure_arete' => $arret->heure_arete,
                ];
            });
            return $arrets->all();
        })->flatten();
    
        return Response::json($formattedData);
    }


   







    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'bus_id' => 'required|exists:bus,id',
            'arret_ids' => 'required|array',
            'arret_ids.*' => 'exists:arret,id',
            'heure_arretes' => 'required|array',
            'heure_arretes.*' => 'required|date_format:H:i',
        ]);
    
        // Récupération des données du formulaire
        $busId = $request->bus_id;
        $arrets = $request->arret_ids;
        $heuresArretes = $request->heure_arretes;
    
        // Création des entrées BusArret pour chaque paire d'arrêt et heure d'arrêt
        foreach ($arrets as $key => $arretId) {
            if (isset($heuresArretes[$key])) {
                BusArret::create([
                    'bus_id' => $busId,
                    'arret_id' => $arretId,
                    'heure_arrete' => $heuresArretes[$key],
                ]);
            } else {
                // Gérez le cas où la clé n'existe pas dans le tableau $heuresArretes
                // Vous pouvez définir une valeur par défaut ou gérer l'erreur d'une autre manière
            }
        }
        
    
        // Redirection vers une page après la création des entrées BusArret
        return redirect()->route('bus-arrete.create')->with('success', 'Les arrêts de bus ont été enregistrés avec succès.');
    }

    
}

