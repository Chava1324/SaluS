<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Secretaria;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Secretaria>
 */
class SecretariaFactory extends Factory
{
    protected $model = Secretaria::class;

    public function definition(): array
    {
        return [
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'curp' => $this->faker->regexify('[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[0-9A-Z]{2}'),
            'celular' => $this->faker->numerify('##########'),
            'fecha_nacimiento' => $this->faker->date('Y-m-d'),
            'direccion' => $this->faker->address(),
            'user_id' => User::factory(),
        ];
    }
}
