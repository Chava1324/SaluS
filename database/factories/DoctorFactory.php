<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'telefono' => $this->faker->numerify('##########'),
            'licencia_medica' => strtoupper($this->faker->bothify('MED-#######')),
            'especialidad' => $this->faker->randomElement([
                'Cardiología',
                'Pediatría',
                'Dermatología',
                'Neurología',
                'Ortopedia',
                'Psiquiatría',
                'Oftalmología',
                'Ginecología',
                'Urología'
            ]),
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
