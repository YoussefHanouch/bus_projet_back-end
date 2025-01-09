<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DemandeCart;

class Payment extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables.
     *
     * @var array
     */
   
   
   
     protected $fillable = [
        'user_id',
        'cart_id',
        'card_number',
        'card_holder_name',
        'card_expiry',
        'card_cvc',
        'amount',
        'paid_at',
    ];
    

    /**
     * Récupère l'utilisateur associé à ce paiement.
     */
    public function user()
   {
       return $this->belongsTo(User::class);
   }

    /**
     * Récupère la carte associée à ce paiement.
     */
    public function demandeCart()
    {
        return $this->belongsTo(DemandeCart::class, 'cart_id');
    }
}
