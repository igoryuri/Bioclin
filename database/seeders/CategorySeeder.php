<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::create([
            'name' => 'Reagentes',
            'step' => '1',
            'category_id_sankhya' => '',
            'category_id' => null,
        ]);
            ProductCategory::create([
                'name' => 'Humano',
                'step' => '2',
                'category_id_sankhya' => '',
                'category_id' => 1,
            ]);
                ProductCategory::create([
                    'name' => 'Anticoagulantes',
                    'step' => '3',
                    'category_id_sankhya' => '',
                    'category_id' => 2,
                ]);
                ProductCategory::create([
                    'name' => 'Bio Gene',
                    'step' => '3',
                    'category_id_sankhya' => '',
                    'category_id' => 2,
                ]);
                ProductCategory::create([
                    'name' => 'Bioquímica',
                    'step' => '3',
                    'category_id_sankhya' => '',
                    'category_id' => 2,
                ]);
                ProductCategory::create([
                    'name' => 'Controles de Qualidade',
                    'step' => '3',
                    'category_id_sankhya' => '',
                    'category_id' => 2,
                ]);
                ProductCategory::create([
                    'name' => 'Hematologia',
                    'step' => '3',
                    'category_id_sankhya' => '',
                    'category_id' => 2,
                ]);
                ProductCategory::create([
                    'name' => 'Imunologia',
                    'step' => '3',
                    'category_id_sankhya' => '',
                    'category_id' => 2,
                ]);
                ProductCategory::create([
                    'name' => 'Íons Seletivos',
                    'step' => '3',
                    'category_id_sankhya' => '',
                    'category_id' => 2,
                ]);
                    ProductCategory::create([
                        'name' => 'Bioquímica',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'slug' => 'bioquimica-reag-hum',
                        'category_id' => 3,
                    ]);
                    ProductCategory::create([
                        'name' => 'Hematologia',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'slug' => 'hematologia-reag-hum',
                        'category_id' => 3,
                    ]);
                    ProductCategory::create([
                        'name' => 'Extração',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 4,
                    ]);
                    ProductCategory::create([
                        'name' => 'Real Time PCR',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 4,
                    ]);
                    ProductCategory::create([
                        'name' => 'Automação',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 5,
                    ]);
                    ProductCategory::create([
                        'name' => 'Calibradores Bioquímica',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 5,
                    ]);
                    ProductCategory::create([
                        'name' => 'Controles Bioquímica',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 5,
                    ]);
                    ProductCategory::create([
                        'name' => 'Semiautomação',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 5,
                    ]);
                    ProductCategory::create([
                        'name' => 'Água',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 6,
                    ]);
                    ProductCategory::create([
                        'name' => 'Etanol',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 6,
                    ]);
                    ProductCategory::create([
                        'name' => 'Lactose',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 6,
                    ]);
                    ProductCategory::create([
                        'name' => 'Matéria Prima Vegetal',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 6,
                    ]);
                    ProductCategory::create([
                        'name' => 'Sacarose',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 6,
                    ]);
                    ProductCategory::create([
                        'name' => 'Coagulação',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 7,
                    ]);
                    ProductCategory::create([
                        'name' => 'Controles de Coagulação',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 7,
                    ]);
                    ProductCategory::create([
                        'name' => 'Corantes Hematológicos',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 7,
                    ]);
                    ProductCategory::create([
                        'name' => 'Solução de Limpeza Hemato',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 7,
                    ]);
                    ProductCategory::create([
                        'name' => 'Aglutinação - Latex',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 8,
                    ]);
                    ProductCategory::create([
                        'name' => 'Elisa',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 8,
                    ]);
                    ProductCategory::create([
                        'name' => 'Calibradores Turbidimetria',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 8,
                    ]);
                    ProductCategory::create([
                        'name' => 'Turbidimetria',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 8,
                    ]);
                    ProductCategory::create([
                        'name' => 'Controles Turbidimetria',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 8,
                    ]);
                    ProductCategory::create([
                        'name' => 'Testes Rápidos',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 8,
                    ]);
                    ProductCategory::create([
                        'name' => 'Triage - Point of Care IFA',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 8,
                    ]);
                    ProductCategory::create([
                        'name' => 'Bioclin POCT',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 8,
                    ]);
                    ProductCategory::create([
                        'name' => 'Bio Íons',
                        'step' => '4',
                        'category_id_sankhya' => '',
                        'category_id' => 9,
                    ]);
            ProductCategory::create([
                'name' => 'Veterinário',
                'step' => '2',
                'category_id_sankhya' => '',
                'category_id' => 1,
            ]);
                ProductCategory::create([
                    'name' => 'Anticoagulantes',
                    'step' => '3',
                    'slug' => 'anticoagulates-vet',
                    'category_id_sankhya' => '',
                    'category_id' => 36,
                ]);
                ProductCategory::create([
                    'name' => 'Bio Gene',
                    'step' => '3',
                    'slug' => 'bio-gene-vet',
                    'category_id_sankhya' => '',
                    'category_id' => 36,
                ]);
                ProductCategory::create([
                    'name' => 'Bioquímica',
                    'step' => '3',
                    'slug' => 'bioquimica-vet',
                    'category_id_sankhya' => '',
                    'category_id' => 36,
                ]);
                ProductCategory::create([
                    'name' => 'Hematologia',
                    'step' => '3',
                    'slug' => 'hematologia-vet',
                    'category_id_sankhya' => '',
                    'category_id' => 36,
                ]);
                ProductCategory::create([
                    'name' => 'Imunologia',
                    'step' => '3',
                    'slug' => 'imunologia-vet',
                    'category_id_sankhya' => '',
                    'category_id' => 36,
                ]);
                    ProductCategory::create([
                        'name' => 'Bioquímica',
                        'step' => '4',
                        'slug' => 'bioquimica-reag-ant-vet',
                        'category_id_sankhya' => '',
                        'category_id' => 37,
                    ]);
                    ProductCategory::create([
                        'name' => 'Hematologia',
                        'step' => '4',
                        'slug' => 'hematologia-reag-ant-vet',
                        'category_id_sankhya' => '',
                        'category_id' => 37,
                    ]);
                    ProductCategory::create([
                        'name' => 'Extração',
                        'step' => '4',
                        'slug' => 'extracao-reag-biog-vet',
                        'category_id_sankhya' => '',
                        'category_id' => 38,
                    ]);
                    ProductCategory::create([
                        'name' => 'Real Time PCR',
                        'step' => '4',
                        'slug' => 'real-time-pcr-reag-biog-vet',
                        'category_id_sankhya' => '',
                        'category_id' => 38,
                    ]);
                    ProductCategory::create([
                        'name' => 'Automação',
                        'step' => '4',
                        'slug' => 'automacao-reag-bioq-vet',
                        'category_id_sankhya' => '',
                        'category_id' => 39,
                    ]);
                    ProductCategory::create([
                        'name' => 'Calibradores Bioquímica',
                        'step' => '4',
                        'slug' => 'calibradores-bioquimica-reag-bioq-vet',
                        'category_id_sankhya' => '',
                        'category_id' => 39,
                    ]);
                    ProductCategory::create([
                        'name' => 'Controles Bioquímica',
                        'step' => '4',
                        'slug' => 'controle-bioquimica-reag-bioq-vet',
                        'category_id_sankhya' => '',
                        'category_id' => 39,
                    ]);
                    ProductCategory::create([
                        'name' => 'Semiautomação',
                        'step' => '4',
                        'slug' => 'semiatumacao-reag-bioq-vet',
                        'category_id_sankhya' => '',
                        'category_id' => 39,
                    ]);
                    ProductCategory::create([
                        'name' => 'Corantes Hematológicos',
                        'step' => '4',
                        'slug' => 'corantes-hematologicos-reag-hema-vet',
                        'category_id_sankhya' => '',
                        'category_id' => 40,
                    ]);
                    ProductCategory::create([
                        'name' => 'Elisa',
                        'step' => '4',
                        'slug' => 'elisa-reag-imun-vet',
                        'category_id_sankhya' => '',
                        'category_id' => 41,
                    ]);
                    ProductCategory::create([
                        'name' => 'Testes Rápidos',
                        'step' => '4',
                        'slug' => 'testes-rápidos-reag-imun-vet',
                        'category_id_sankhya' => '',
                        'category_id' => 41,
                    ]);
        ProductCategory::create([
            'name' => 'Equipamentos',
            'step' => '1',
            'category_id_sankhya' => '',
            'category_id' => null,
        ]);
            ProductCategory::create([
                'name' => 'Humano',
                'step' => '2',
                'slug' => 'humano-equip',
                'category_id_sankhya' => '',
                'category_id' => 53,
            ]);
            ProductCategory::create([
                'name' => 'Veterinário',
                'step' => '2',
                'slug' => 'veterinario-equip',
                'category_id_sankhya' => '',
                'category_id' => 53,
            ]);
                ProductCategory::create([
                    'name' => 'Biologia Molecular',
                    'step' => '3',
                    'slug' => 'biologia-molecular-equip',
                    'category_id_sankhya' => '',
                    'category_id' => 54,
                ]);
                ProductCategory::create([
                    'name' => 'Bioquímica',
                    'step' => '3',
                    'slug' => 'bioquimica-equip',
                    'category_id_sankhya' => '',
                    'category_id' => 54,
                ]);
                ProductCategory::create([
                    'name' => 'Coagulação',
                    'step' => '3',
                    'slug' => 'coagulacao-equip',
                    'category_id_sankhya' => '',
                    'category_id' => 54,
                ]);
                ProductCategory::create([
                    'name' => 'Elisa',
                    'step' => '3',
                    'slug' => 'elisa-equip',
                    'category_id_sankhya' => '',
                    'category_id' => 54,
                ]);
                ProductCategory::create([
                    'name' => 'Hematológicos',
                    'step' => '3',
                    'slug' => 'hematologicos-equip',
                    'category_id_sankhya' => '',
                    'category_id' => 54,
                ]);
                ProductCategory::create([
                    'name' => 'Íons Seletivos',
                    'step' => '3',
                    'slug' => 'ions-seletivos-equip',
                    'category_id_sankhya' => '',
                    'category_id' => 54,
                ]);
                ProductCategory::create([
                    'name' => 'Limpeza de Equipamentos',
                    'step' => '3',
                    'slug' => 'limpeza-equipamentos-equip',
                    'category_id_sankhya' => '',
                    'category_id' => 54,
                ]);
                ProductCategory::create([
                    'name' => 'Point of Care',
                    'step' => '3',
                    'slug' => 'point-of-care-equip',
                    'category_id_sankhya' => '',
                    'category_id' => 54,
                ]);
                ProductCategory::create([
                    'name' => 'Bioquímica',
                    'step' => '3',
                    'slug' => 'bioquimica-vet-equip',
                    'category_id_sankhya' => '',
                    'category_id' => 55,
                ]);
                ProductCategory::create([
                    'name' => 'Hematológicos',
                    'step' => '3',
                    'slug' => 'hematologicos-vet-equip',
                    'category_id_sankhya' => '',
                    'category_id' => 55,
                ]);
                ProductCategory::create([
                    'name' => 'Biologia Molecular',
                    'step' => '3',
                    'slug' => 'biologia-molecular-vet-equip',
                    'category_id_sankhya' => '',
                    'category_id' => 55,
                ]);
                    ProductCategory::create([
                        'name' => 'Real Time Termociclador',
                        'step' => '4',
                        'slug' => 'real-time-termociclador-hum-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 56,
                    ]);
                    ProductCategory::create([
                        'name' => 'Real Time Termociclador',
                        'step' => '4',
                        'slug' => 'real-time-termociclador-vet-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 66,
                    ]);
                    ProductCategory::create([
                        'name' => 'Automático',
                        'step' => '4',
                        'slug' => 'automatico-hum-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 57,
                    ]);
                    ProductCategory::create([
                        'name' => 'Semiautomático',
                        'step' => '4',
                        'slug' => 'semiautomatico-hum-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 57,
                    ]);
                    ProductCategory::create([
                        'name' => 'Automático',
                        'step' => '4',
                        'slug' => 'automatico-vet-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 64,
                    ]);
                    ProductCategory::create([
                        'name' => 'Semiautomático',
                        'step' => '4',
                        'slug' => 'semiautomatico-vet-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 64,
                    ]);
                    ProductCategory::create([
                        'name' => 'Hematoclin',
                        'step' => '4',
                        'slug' => 'hematoclin-vet-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 60,
                    ]);
                    ProductCategory::create([
                        'name' => 'Hematoclin',
                        'step' => '4',
                        'slug' => 'hematoclin-vet-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 65,
                    ]);
                    ProductCategory::create([
                        'name' => 'Automático',
                        'step' => '4',
                        'slug' => 'automatico-coag-vet-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 58,
                    ]);
                    ProductCategory::create([
                        'name' => 'Semiautomático',
                        'step' => '4',
                        'slug' => 'semiautomatico-coag-vet-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 58,
                    ]);
                    ProductCategory::create([
                        'name' => 'Leitora',
                        'step' => '4',
                        'slug' => 'leitora-elisa-vet-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 59,
                    ]);
                    ProductCategory::create([
                        'name' => 'Semiautomático',
                        'step' => '4',
                        'slug' => 'semiautomatico-ions-vet-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 61,
                    ]);
                    ProductCategory::create([
                        'name' => 'Automático',
                        'step' => '4',
                        'slug' => 'automatico-limp-vet-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 62,
                    ]);
                    ProductCategory::create([
                        'name' => 'Semiautomático',
                        'step' => '4',
                        'slug' => 'semiautomatico-limp-vet-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 62,
                    ]);
                    ProductCategory::create([
                        'name' => 'Triage',
                        'step' => '4',
                        'slug' => 'triage-point-vet-equip',
                        'category_id_sankhya' => '',
                        'category_id' => 63,
                    ]);


    }
}
