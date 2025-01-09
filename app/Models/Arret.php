<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arret extends Model
{
    protected $fillable = [
        'lieu_arrete', 'heure_arret',
    ];
   protected $table='arret';

    public function busArrets()
    {
        return $this->hasMany(BusArret::class);
    }
}
