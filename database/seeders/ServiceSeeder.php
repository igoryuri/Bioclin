<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Cáculos',
            'route' => 'calculos',
            'image' => 'services/calculos.webp',
        ]);
        Service::create([
            'name' => 'Bioclin Educar',
            'route' => 'educar',
            'image' => 'services/educar.webp',
        ]);
        Service::create([
            'name' => 'Programações',
            'route' => 'directories',
            'image' => 'services/programacoes.webp',
        ]);
        Service::create([
            'name' => 'Certificações',
            'route' => 'certificate',
            'image' => 'services/certificacoes.webp',
        ]);
    }
}
