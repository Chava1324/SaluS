<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Historials;

class HistorialsSeeder extends Seeder
{
    public function run(): void
    {
        Historials::factory()->count(2000)->create();
    }
}
