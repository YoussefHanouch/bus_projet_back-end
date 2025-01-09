<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrajetBus extends Model

{  
    protected $primaryKey = 'idtrajet';
    protected $table='trajet_bus';
    protected $fillable = [
        'bus_id', 'lieu_depart', 'lieu_arrivee', 'heure_depart', 'heure_arrivee',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
