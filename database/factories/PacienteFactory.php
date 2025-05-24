<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'curp' => $this->faker->regexify('[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[0-9A-Z]{2}'),
            'nss' => $this->faker->regexify('[0-9]{11}'),
            'fecha_nacimiento' => $this->faker->date('Y-m-d'),
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'telefono' => $this->faker->numerify('##########'),
            'correo' => $this->faker->unique()->safeEmail(),
            'direccion' => $this->faker->address(),
            'grupo_sanguineo' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'alergias' => $this->faker->text(50),
            'contacto_emergencia' => $this->faker->numerify('##########'),
            'observaciones' => $this->faker->optional()->text(250),
        ];
    }
}
