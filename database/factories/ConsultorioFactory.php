<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultorioFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company . ' Consultorio',
            'ubicacion' => $this->faker->address,
            'capacidad' => (string) $this->faker->numberBetween(1, 5),
            'telefono' => $this->faker->optional()->phoneNumber,
            'especialidad' => $this->faker->randomElement([
                'Pediatría',
                'Ginecología',
                'Cardiología',
                'Dermatología',
                'Oftalmología',
                'Medicina General'
            ]),
            'estado' => $this->faker->randomElement(['Activo', 'Inactivo']),
        ];
    }
}
