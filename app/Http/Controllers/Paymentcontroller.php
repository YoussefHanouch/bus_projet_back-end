<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\User;
use App\Models\DemandeCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;


class Paymentcontroller extends Controller
{
    public function index()
    {
        // Vérifier si l'utilisateur connecté est un administrateur
        if(auth()->user()->type === 'admin') {
            // Si c'est un administrateur, récupérer tous les paiements
            $payments = Payment::all();
        } else {
            // Si ce n'est pas un administrateur, récupérer les paiements de l'utilisateur connecté
            $payments = auth()->user()->payments;
        }
    
        return view('payments.index', compact('payments'));
    }
    
    public function showPaymentDetails($paymentId)
{
    $payment = Payment::findOrFail($paymentId);
    return view('payments.details', compact('payment'));
}

    /**
     * Affiche le formulaire de création d'un nouveau paiement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        // $carts = Payment::all();
        $users = Auth::user();
        // Retrieve demand carts for the authenticated user
        // $carts = $users->demandeCart()->get();
        $carts= $users->demandeCart()->with('bus')->get();
        $userName = $users->name . ' ' . $users->prenom;
        return view('payments.create', compact('carts','userName','users'));

    }

   
    
    public function downloadReceipt()
    {
        // Récupérer le paiement correspondant à l'ID
        //     
           $latestPayment = Payment::with('demandeCart.bus')->latest()->first();
        
        // Si un paiement existe
        if ($latestPayment) {
            // Récupérer les détails
            $paymentId = $latestPayment->user->name . '-' . $latestPayment->user->prenom;
            $price = $latestPayment->amount;
            $cardNumber = $latestPayment->demandeCart->numero_de_carte;
            $lineNumber = $latestPayment->demandeCart->bus->numéro_de_bus;
            $paidAt = Carbon::parse($latestPayment->paid_at); // Convertir en objet Carbon
            
            // Ajouter 5 jours à la date de paiement
            $rendezVousDate = $paidAt->addDays(5)->format('Y-m-d'); // Formatage de la date
            
            // Passer les détails à la vue
       
        // Générer le contenu HTML du reçu de paiement
        $html = view('payments.details', compact('paymentId', 'price', 'cardNumber', 'lineNumber', 'rendezVousDate'))->render();
    
        // Initialiser Dompdf
        $dompdf = new Dompdf();
    
        // Charger le contenu HTML dans Dompdf
        $dompdf->loadHtml($html);
    
        // (Optionnel) Définir les options de rendu PDF
        $dompdf->setPaper('A4', 'portrait');
    
        // Rendre le PDF
        $dompdf->render();
    
        // Nom de fichier pour le téléchargement
        $filename = 'Receipt_' . $paymentId . '.pdf';
    
        // Télécharger le PDF
        return $dompdf->stream($filename);
    }
}   

  
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'user_id' => 'required',
            'cart_id' => 'required',
            'card_number' => 'required',
            'card_holder_name' => 'required',
            'card_expiry' => 'required',
            'card_cvc' => 'required',
            'amount' => 'required',
            'paid_at' => 'required|date',
        ]);

        // Création du paiement avec les données validées
        Payment::create($validatedData);

        // Redirection avec un message de succès
        return redirect()->route('succesPayment')->with('success', 'Le paiement a été ajouté avec succès.');
    }


    public function paymentRecu()
    {
        // Récupérer le dernier paiement effectué avec toutes les informations associées
        $latestPayment = Payment::with('demandeCart.bus')->latest()->first();
        
        // Si un paiement existe
        if ($latestPayment) {
            // Récupérer les détails
            $paymentId = $latestPayment->user->name . '-' . $latestPayment->user->prenom;
            $price = $latestPayment->amount;
            $cardNumber = $latestPayment->demandeCart->numero_de_carte;
            $lineNumber = $latestPayment->demandeCart->bus->numéro_de_bus;
            $paidAt = Carbon::parse($latestPayment->paid_at); // Convertir en objet Carbon
            
            // Ajouter 5 jours à la date de paiement
            $rendezVousDate = $paidAt->addDays(5)->format('Y-m-d'); // Formatage de la date
            
            // Passer les détails à la vue
            return view('payments.details', compact('paymentId', 'price', 'cardNumber', 'lineNumber', 'rendezVousDate'));
        } else {
            // Retourner une vue avec un message si aucun paiement n'est trouvé
            return view('payments.details')->with('message', 'Aucun paiement trouvé.');
        }
    }
    
    
}
