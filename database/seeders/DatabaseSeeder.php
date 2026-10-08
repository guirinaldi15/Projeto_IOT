<?php

namespace Database\Seeders;

use App\Models\Ambiente;
use App\Models\Sensor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

      

        Ambiente::create([
            'nome' => 'Laboratório', 'descricao' => 'Monitoramento de equipamentos', 'status' => true,
            'nome' => 'Sala de Servidores', 'descricao' => 'Monitoramento do rack', 'status' => true,
            'nome' => 'Estufa', 'descricao' => 'Controle ambiental da estufa', 'status' => true,
        ]);

        Sensor::create([
            'codigo' => 'TEMP01', 'tipo' => 'Temperatura', 'descricao' => 'Sensor de temperatura do laboratório', 'ambiente_id' => '1',
            'codigo' => 'UMID01', 'tipo' => 'Umidade', 'descricao' => 'Sensor de umidade do rack', 'ambiente_id' => '2',
            'codigo' => 'LUZ01', 'tipo' => 'Luminosidade', 'descricao' => 'Sensor de luz da estufa', 'ambiente_id' => '3',
        ]);
    }
}
