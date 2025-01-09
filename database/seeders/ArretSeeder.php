<?php

// database/seeders/ArretSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Arret;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ArretSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('fr_FR');

        // Heures de 7:00 à 21:00 avec un intervalle de 15 minutes
        $heures = [];
        $heure = '07:00'; // Début à 7:00
        while ($heure <= '21:00') {
            $heures[] = $heure;
            $heure = date('H:i', strtotime($heure . ' +15 minutes'));
        }

        // Génération des arrêts fictifs avec des heures spécifiques
        $places = [
            'El Hedim',
            'Lalla Aouda',
            'Boujloud',
            'Lahdim',
            'Bab Mansour',
            'Tahrir',
            'du 20 Août',
            'd´Armes',
            'Mohammed V',
            'Ibn Khaldoun',
            'Isly',
            'Ahmed Charci',
            'Moulay Ismaïl',
            'de la Liberté',
            'de la Résistance',
            'Hassan II',
            'Bir Anzarane',
            'Ait Skato',
            'Moulay Youssef',
            'Riad',
            'Agdal',
            'Zerhoun',
            'du 18 Novembre',
            'Souani',
            'des Far',
            'des Nations Unies',
            'Riad Al Andalous',
            'Oued Al-Makhazine',
            'de la Jeunesse',
            'de lUnité',
            'de la Solidarité',
            'de la Gare',
            'des Alaouites',
            'de l´Indépendance',
            'Zouagha',
            'des Oliviers',
            'des Almohades',
            'des Glaoui',
            'des Saadiens',
            'des Alaouites',
            'des Remparts',
            'des Marchés',
            'des Arts',
            'des Frères Bouazzaoui',
            'des Anciens Combattants',
            'des Potiers',
            'des Almohades',
        ];

        $index_heure = 0; // Index pour parcourir les heures

        foreach ($places as $place) {
            Arret::create([
                'lieu_arrete' => $place,
                'heure_arete' => Carbon::createFromFormat('H:i', $heures[$index_heure]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Incrémenter l'index d'heure pour passer à l'heure suivante
            $index_heure++;

            // Si on atteint la dernière heure, réinitialiser l'index à zéro
            if ($index_heure >= count($heures)) {
                $index_heure = 0;
            }
        }
    }
}
