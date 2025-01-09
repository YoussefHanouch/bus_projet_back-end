<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bus;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bus::create([
            'numéro_de_bus' => '1234',
            'modèle' => 'Modèle 1',
            'immatriculation' => 'ABC123',
            'Origine' => 'Origine 1',
            'Destination' => 'Destination 1',
            'Tarifs' => 'Tarifs 1',
        ]);

        Bus::create([
            'numéro_de_bus' => '5678',
            'modèle' => 'Modèle 2',
            'immatriculation' => 'DEF456',
            'Origine' => 'Origine 2',
            'Destination' => 'Destination 1',
            'Tarifs' => 'Tarifs 2',
        ]);

        // Ajoutez plus de lignes si nécessaire
    }
}
