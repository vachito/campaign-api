<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TemplateMeta;
class TemplateMetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['category' => 'Marketing', 'unit_price' => '0.0450'],
            ['category' => 'Utility', 'unit_price' => '0.0150'],
            ['category' => 'Authentication', 'unit_price' => '0.0125'],
            ['category' => 'Service', 'unit_price' => '0.0100'],
        ];

        foreach($data as $item){
            TemplateMeta::create($item);
        }
    }
}
