<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\CartBus;
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'prenom',
        'email',
        'password',
        'type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function demandeCart()
    {
        return $this->hasOne(DemandeCart::class, 'user_id');
    }
    public function payments()
{
    return $this->hasMany(Payment::class);
}
}
