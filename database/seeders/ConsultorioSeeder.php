<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultorio;

class ConsultorioSeeder extends Seeder
{
    public function run(): void
    {
        Consultorio::factory()->count(2000)->create();
    }
}
