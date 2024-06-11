<?php

namespace Database\Seeders;

use App\Models\TypeAttachment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Type_AttachmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeAttachment::create([
            'name' => 'Certificados',
        ]);
        TypeAttachment::create([
            'name' => 'Manual',
        ]);
        TypeAttachment::create([
            'name' => 'Registros',
        ]);
        TypeAttachment::create([
            'name' => 'FISPQ',
        ]);
    }
}
