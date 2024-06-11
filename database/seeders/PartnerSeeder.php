<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::create([
            'name' => 'Awareness',
        ]);
        Partner::create([
            'name' => 'Bioer',
        ]);
        Partner::create([
            'name' => 'Monobind',
        ]);
        Partner::create([
            'name' => 'Dynex',
        ]);
        Partner::create([
            'name' => 'Mindray',
        ]);
        Partner::create([
            'name' => 'Quidel',
        ]);
    }
}
