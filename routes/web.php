<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Userlisecontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrajetBusController ;
use App\Http\Controllers\BusController;
use App\Http\Controllers\DemandeCarte;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Paymentcontroller;
use App\Http\Controllers\BusArreteController;
use App\Http\Controllers\PDFController;



///route les ligne bus
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/bus-arrete/create', [BusArreteController::class, 'create'])->name('bus-arrete.create'); // Afficher le formulaire de création de trajet
    Route::post('/bus-arrete', [BusArreteController::class, 'store'])->name('bus-arrete.store'); // Afficher le formulaire de création de trajet
    
Route::post('/bus', [BusController::class, 'store'])->name('bus.store'); // Créer un nouveau bus
Route::put('/bus/{bus}', [BusController::class, 'update'])->name('bus.update'); // Mettre à jour un bus
Route::delete('/bus/{bus}', [BusController::class, 'destroy'])->name('bus.destroy'); // Supprimer un bus
Route::get('/bus/create', [BusController::class, 'create'])->name('bus.create'); // Afficher le formulaire de création de trajet
Route::get('/bus', [BusController::class, 'index'])->name('bus.index');
Route::get('/bus/{bus}/edit', [BusController::class, 'edit'])->name('bus.edit'); // Afficher le formulaire de modification d'un trajet


// Routes pour l'affichage et la gestion des trajets
Route::get('/trajets', [TrajetBusController::class, 'index'])->name('trajet_bus.index'); // Afficher tous les trajets
Route::get('/trajets/create', [TrajetBusController::class, 'create'])->name('trajet_bus.create'); // Afficher le formulaire de création de trajet
Route::post('/trajets', [TrajetBusController::class, 'store'])->name('trajet_bus.store'); // Enregistrer un nouveau trajet
Route::get('/trajets/{trajet}/edit', [TrajetBusController::class, 'edit'])->name('trajet_bus.edit'); // Afficher le formulaire de modification d'un trajet
Route::put('/trajets/{trajet}', [TrajetBusController::class, 'update'])->name('trajet_bus.update'); // Mettre à jour un trajet
Route::delete('/trajets/{trajet}', [TrajetBusController::class, 'destroy'])->name('trajet_bus.destroy'); // Supprimer un trajet
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/telecharger-document/{demandeCart}', [DemandeCarte::class, 'telecharger'])->name('telecharger.document');
Route::post('/upload-document/{demandeCart}', [DemandeCarte::class, 'upload'] )->name('upload.pdf');

Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('busma.generate');
Route::get('/succes', [PDFController::class, 'index']);

Route::get('/paymentRecu', [PaymentController::class, 'paymentRecu'])->name('paymentRecu');
Route::get('/downloadRecu', [PaymentController::class, 'downloadReceipt'])->name('downloadRecu');

Route::get('/succes', function () {
    return view('Suuccespdf');
})->name('succes');


Route::get('/succesPayment', function () {
    return view('payments.SuucceRecu');
})->name('succesPayment');



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::put('/demande-carte/{demandeCarte}/accepter', [DemandeCarte::class, 'accepter'])->name('demande-carte.accepter');
Route::put('/demande-carte/{demandeCarte}/refuser', [DemandeCarte::class, 'refuser'])->name('demande-carte.refuser');
Route::get('/pdf/{demandeCart}', [DemandeCarte::class, 'showPDF'])->name('pdf.show');


Route::get('/demande_carte/create', [DemandeCarte::class, 'create'])->name('demande_carte.create');
Route::post('/demande_carte', [DemandeCarte::class, 'store'])->name('demande_carte.store');
Route::get('/demandes-carte', [DemandeCarte::class, 'index'])->name('demandes_carte.index');
Route::get('/demandes_carte/{demandeCarte}',[DemandeCarte::class, 'show'])->name('demandes_carte.show');
Route::middleware(['auth', 'admin'])->group(function () {
Route::put('/demande-carte/{demandeCarte}/accepter', [DemandeCarte::class, 'accepter'])->name('demande-carte.accepter');
Route::put('/demande-carte/{demandeCarte}/refuser', [DemandeCarte::class, 'refuser'])->name('demande-carte.refuser');
Route::put('/activation/{demande_carte}', [DemandeCarte::class, 'activation'])->name('activation');
Route::put('/desactivation/{demande_carte}', [DemandeCarte::class, 'desactivation'])->name('desactivation');
});
//route admin
Route::middleware(['auth', 'admin'])->group(function () {

Route::get('/admins/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admins', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admins', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admins/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admins/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admins/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});
//fin route

//route utilisateur 
Route::middleware(['auth', 'admin'])->group(function () {

Route::get('/utilisateur/create', [Userlisecontroller::class, 'create'])->name('utilisateur.create');
Route::post('/utilisateur', [Userlisecontroller::class, 'store'])->name('utilisateur.store');
Route::get('/utilisateurs', [Userlisecontroller::class, 'index'])->name('utilisateur.index');
Route::get('/utilisateur/{id}/edit', [Userlisecontroller::class, 'edit'])->name('utilisateur.edit');
Route::put('/utilisateur/{id}', [Userlisecontroller::class, 'update'])->name('utilisateur.update');
Route::delete('/utilisateur{id}', [Userlisecontroller::class, 'destroy'])->name('utilisateur.destroy');
//fin route
});
Route::get('/download-receipt/{payment}', [PaymentController::class, 'downloadReceipt'])->name('download.receipt');


Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');

// Enregistrer un nouveau paiement
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

// Afficher les détails d'un paiement spécifique
Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');

// Afficher le formulaire de modification d'un paiement
Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');

// Mettre à jour un paiement existant
Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');

// Supprimer un paiement
Route::delete('/payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');

// Afficher la liste de tous les paiements
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');




require __DIR__.'/auth.php';

