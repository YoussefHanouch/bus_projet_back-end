<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bus;
class DemandeCart extends Model
{
    use HasFactory;

    protected $table = 'demande_cartes';

    protected $fillable = [
        'etablissement' ,
        'date_naissance' ,
        'user_id',
        'utilisateur_nom',
        'prenom_utilisateur',
        'numero_de_carte',
        'adresse',
        'mois_demande',
        'bus_id',
        'cart_active',
        'phone_number',
        'genre',
        'dossier_accepte',
        'document_validation'
    ];
   // Dans votre modèle DemandeCart
   public function user()
   {
       return $this->belongsTo(User::class);
   }
public function bus()
{
    return $this->belongsTo(Bus::class, 'bus_id');
}
public function payments()
{
    return $this->hasMany(Payment::class);
}

}
