<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table='bus';
    protected $fillable = [
        'numéro_de_bus', 'Destination','modèle', 'immatriculation', 'Origine', 'Tarifs',
    ];
    

  

    public function trajetBuses()
    {
        return $this->hasMany(TrajetBus::class);
    }

    public function busArrets()
    {
        return $this->hasMany(BusArret::class, 'bus_id');
    }
    
    public function arrets()
    {
        return $this->hasManyThrough(
            Arret::class,
            BusArret::class,
            'bus_id', // Clé étrangère de la table intermédiaire 'bus_arrets'
            'id',     // Clé locale de la table 'buses'
            'id',     // Clé locale de la table 'arrets'
            'arret_id' // Clé étrangère de la table 'arrets'
        );
    }
    public function arretes()
    {
        return $this->hasMany(BusArret::class, 'bus_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }






}
