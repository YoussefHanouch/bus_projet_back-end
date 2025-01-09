<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use App\Models\DemandeCart;
use App\Models\Bus;

class DemandeCarte extends Controller
{
    public function create()
    {
        $buses = Bus::all();
        return view('Demandecart.create',compact('buses'));
    }
    public function index()
    {
        if(auth()->user()->type === 'admin') {
            // Si l'utilisateur est un administrateur, récupérer toutes les demandes de cartes
            $demandesCartes = DemandeCart::simplePaginate(3);
        } else {
            // Si l'utilisateur n'est pas un administrateur, récupérer les demandes de cartes de l'utilisateur connecté
            $demandesCartes = DemandeCart::where('user_id', auth()->user()->id)->simplePaginate(3);
        }
    
        // Passer les demandes de cartes à la vue pour les afficher
        return view('Demandecart.index', ['demandesCartes' => $demandesCartes]);
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'utilisateur_nom' => 'required|string',
            'prenom_utilisateur' => 'required|string',
            'numero_de_carte' => 'required|string|unique:demande_cartes', // Assurez-vous qu'il est unique dans la table demande_cartes
            'adresse' => 'required|string',
            'mois_demande' => 'required|integer',
            'bus_id' => 'required|exists:bus,id', 
            'etablissement' => 'nullable|string', // Champ facultatif
            'date_naissance' => 'nullable|date',
            'genre' => 'nullable|in:Homme,Femme', // Validation rule for 'genre' field
            'phone_number' => 'nullable|string|max:20', // Validation rule for 'phone_number' field // Champ facultatif de type date// Assurez-vous que l'ID de bus existe dans la table buses
        ]);

        // Créer une nouvelle instance de DemandeCarte avec les données validées
        DemandeCart::create([
            'utilisateur_nom' => $validatedData['utilisateur_nom'],
            'prenom_utilisateur' => $validatedData['prenom_utilisateur'],
            'numero_de_carte' => $validatedData['numero_de_carte'],
            'adresse' => $validatedData['adresse'],
            'user_id' => auth()->id(),
            'mois_demande' => $validatedData['mois_demande'],
            'etablissement' => $validatedData['etablissement'], // Champ facultatif
            'date_naissance' => $validatedData['date_naissance'], // Champ facultatif
            'bus_id' => $validatedData['bus_id'],
            'genre' => $validatedData['genre'], // Champ facultatif
            'phone_number' => $validatedData['phone_number'],
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('succes')->with('success', 'Demande de carte ajoutée avec succès.');
    }
 
public function activation(Request $request, $id)
{
    $demandeCarte = DemandeCart::findOrFail($id);
    
    // Vérifiez si l'utilisateur est un administrateur
    if (auth()->user()->type !== 'admin') {
        return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à effectuer cette action.');
    }

    $demandeCarte->update(['cart_active' => 0]);

    return redirect()->back()->with('success', 'La carte a été activée avec succès.');
}

// Méthode pour désactiver une carte
public function desactivation(Request $request, $id)
{
    $demandeCarte = DemandeCart::findOrFail($id);

    // Vérifiez si l'utilisateur est un administrateur
    if (auth()->user()->type !== 'admin') {
        return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à effectuer cette action');

    }
    $demandeCarte->update(['cart_active' => 1]);
    return redirect()->back()->with('success', 'La carte a été desactive avec succès.');

}
public function show($id)
{
    // Récupérer la demande de carte par son ID
    $demandeCarte = DemandeCart::findOrFail($id);

    // Passer la demande de carte à la vue pour l'afficher
    return view('Demandecart.show', compact('demandeCarte'));
}
public function upload(Request $request, DemandeCart $demandeCart)
{
    $request->validate([
        'document_validation' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour la photo
    ]);



    if ($request->hasFile('document_validation')) {
        // Enregistrer la nouvelle photo
        $photoFile = $request->file('document_validation');
        $photoFileName = $photoFile->getClientOriginalName();
        $photoFile->move(public_path('photos'), $photoFileName);
        $demandeCart->document_validation = $photoFileName;
    }

    $demandeCart->save();

    return redirect()->route('payments.create', $demandeCart)->with('success', 'Demande de carte mise à jour avec succès.');
}


    
public function telecharger($id)
{
    $demandeCart = DemandeCart::findOrFail($id);

    return view('Upload_document',compact('demandeCart'));
}


public function accepter(DemandeCart $demandeCarte)
{
    $demandeCarte->update(['dossier_accepte' => 'Accepté']);
    return redirect()->back()->with('success', 'La demande de carte a été acceptée avec succès.');
}

public function refuser(DemandeCart $demandeCarte)
{
    $demandeCarte->update(['dossier_accepte' => 'Refusé']);
    return redirect()->back()->with('error', 'La demande de carte a été refusée.');
}









}
