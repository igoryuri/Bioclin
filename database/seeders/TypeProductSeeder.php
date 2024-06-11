<?php

namespace Database\Seeders;

use App\Models\TypeProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        TypeProduct::create([
            'name' => 'Reagentes',
        ]);
        TypeProduct::create([
            'name' => 'Equipamentos',
        ]);
    }
}
