<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape([
        'first_name' => "string",
        'last_name'  => "string",
        'email'      => "string",
        'phone'      => "string",
        'password'   => "string"
    ])] public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name'  => $this->faker->lastName(),
            'email'      => $this->faker->unique()->safeEmail,
            'phone'      => $this->faker->phoneNumber(),
            'password'   => $this->faker->password(),
        ];
    }
}
