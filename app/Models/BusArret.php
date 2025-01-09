<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusArret extends Model
{
    protected $fillable = [
        'bus_id', 'arret_id', 'heure_arrete',
        
    ];
    protected $table = 'bus_arrete'; // Assurez-vous que le nom de table est correct

    
    public function arrets()
    {
        return $this->belongsToMany(Arret::class)->withTimestamps()->withPivot('heure_arrete');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

  
}
