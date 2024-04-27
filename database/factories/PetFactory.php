<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sex = $this->faker->randomElement(['male', 'female']);
        $is_ready_to_breed = $this->faker->randomElement(['yes', 'no']);
        $breed = $this->faker->randomElement(['Labrador Retriever', 'Golden Retriever', 'German Shepherd', 'French Bulldog', 'Beagle']);
        $age = $this->faker->numberBetween(1, 20);

        return [
            'customer_id' => Customer::factory(),
            'name' => $this->faker->name($gender = null),
            'breed' => $breed,
            'color' => $this->faker->safeColorName,
            'age' => $age,
            'sex' => $sex,
            'is_ready_to_breed' => $is_ready_to_breed,
        ];
    }
}
