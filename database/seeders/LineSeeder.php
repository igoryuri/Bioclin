<?php

namespace Database\Seeders;

use App\Models\Line;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Line::create([
            'name' => 'Aglutinação',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
        Line::create([
            'name' => 'Bioclin Care',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
        Line::create([
            'name' => 'Bio Gene',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
        Line::create([
            'name' => 'Biopoct',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
        Line::create([
            'name' => 'Biolisa',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
        Line::create([
            'name' => 'VetLISA',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
        Line::create([
            'name' => 'BioclinFast',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
        Line::create([
            'name' => 'Bio Gene Research',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
        Line::create([
            'name' => 'Bio Gene VET',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
        Line::create([
            'name' => 'Hematologia',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
        Line::create([
            'name' => 'CLIA',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
        Line::create([
            'name' => 'VetFAST',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
        Line::create([
            'name' => 'Coagulação',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
        Line::create([
            'name' => 'Bulk & OEM',
            'image' => 'lines/medicine-capsules-global-health-with-geometric-pattern-digital-remix.webp',
        ]);
    }
}
