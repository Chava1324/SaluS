<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Secretaria;

class SecretariaSeeder extends Seeder
{
    public function run(): void
    {
        Secretaria::factory()->count(2000)->create();
    }
}
