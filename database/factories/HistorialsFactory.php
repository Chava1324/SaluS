<?php

namespace Database\Factories;

use App\Models\Paciente;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistorialsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'detalle' => $this->faker->paragraphs(2, true),
            'fecha_visita' => $this->faker->date(),
            'pacientes_id' => Paciente::factory(),
            'doctor_id' => Doctor::factory(),
        ];
    }
}
