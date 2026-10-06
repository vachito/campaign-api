<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Bucket;

class BucketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            ['uuid' => (string)Str::uuid(), 'organizational_unit' => 'Desarrollo Social', 'assignment_date' => '2026-10-01', 'core_marketing_messages' => 32700, 'state' => 'Activo'],
            ['uuid' => (string)Str::uuid(), 'organizational_unit' => 'Dirección de la mujer', 'assignment_date' => '2026-10-01', 'core_marketing_messages' => 13000, 'state' => 'Activo'],
            ['uuid' => (string)Str::uuid(), 'organizational_unit' => 'Dirección de Asuntos Públicos', 'assignment_date' => '2026-10-01', 'core_marketing_messages' => 10000, 'state' => 'Activo']
        ];

        foreach($data as $item){
            Bucket::create($item);
        }
    }
}
