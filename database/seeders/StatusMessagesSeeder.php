<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\StatusMessage;

class StatusMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['uuid' => (string)Str::uuid(),'name' => 'Mensajes enviados'],
            ['uuid' => (string)Str::uuid(),'name' => 'Mensajes entregados'],
            ['uuid' => (string)Str::uuid(),'name' => 'Mensajes leídos'],
            ['uuid' => (string)Str::uuid(),'name' => 'Respuestas únicas'],
            ['uuid' => (string)Str::uuid(),'name' => 'Clicks en botón'],
        ];

        foreach ($data as $item) {
            StatusMessage::create($item);
        }
    }
}
