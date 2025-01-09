<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\DemandeCart;
class PDFController extends Controller
{

    public function index()
    {
        // Retrieve the latest record from the database
        $demandeCarte = DemandeCart::latest()->first();
    
        // Pass the latest record to the view
        return view('ImprimeFille', compact('demandeCarte'));
    }

    public function generatePDF()
    {
        // Créez une instance de Dompdf
        $dompdf = new Dompdf();
        $demandeCarte = DemandeCart::latest()->first();

        // Chargez votre vue Blade dans une variable
        $html = view('ImprimeFille',compact('demandeCarte'))->render();

        // Chargez le HTML dans Dompdf
        $dompdf->loadHtml($html);

        // (Optionnel) Définissez des options de rendu PDF
        $dompdf->setPaper('A4', 'portrait');

        // Rendre le PDF
        $dompdf->render();

        // Envoyez le PDF à l'utilisateur ou enregistrez-le sur le serveur
        $filename = 'demande_abonnement_' . uniqid() . '.pdf';

        // Envoyez le PDF à l'utilisateur avec un nom de fichier unique
        return $dompdf->stream($filename);        
    }
}
