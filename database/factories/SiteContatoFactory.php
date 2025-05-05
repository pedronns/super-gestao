<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'nome' => $faker->name(),
            'telefone' => $faker->phoneNumber(),
            'email' => $faker->email(),
            'motivo_contato' => $faker->numberBetween(1, 3),
            'mensagem' => $faker->text(200)
        ];
    }
}
