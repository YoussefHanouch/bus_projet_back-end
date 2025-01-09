<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartBus extends Model
{
    protected $fillable = [
        'utilisateur_id', 'numéro_de_cart', 'solde', 'date_expiration',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }
}
