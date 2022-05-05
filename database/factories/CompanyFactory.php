<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * @return array
     */
    #[ArrayShape(['title' => "string", 'phone' => "string", 'description' => "string"])]
    public function definition(): array
    {
        return [
            'title'       => $this->faker->company(),
            'phone'       => $this->faker->phoneNumber(),
            'description' => $this->faker->text(160),
        ];
    }
}
