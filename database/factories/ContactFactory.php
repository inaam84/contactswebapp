<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'forenames' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'address_line_1' => $this->faker->streetAddress(),
            'address_line_2' => $this->faker->secondaryAddress(),
            'address_line_3' => $this->faker->city(),
            'address_line_4' => $this->faker->county(),
            'postcode' => $this->faker->postcode(),
            'telephone' => substr($this->faker->numerify('+44##########'), 0, 12),
            'mobile' => substr($this->faker->numerify('+44##########'), 0, 12),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
