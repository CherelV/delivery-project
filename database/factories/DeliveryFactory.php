<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\DeliveryMan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        
        return [
            'customer_id'=>Customer::factory(),
            'delivery_man_id'=>DeliveryMan::factory(),
            'item_description' => $this->faker->sentence(2),
            'status' => fake()->randomElement(['pending', 'completed','canceled']),
            'delivered_on' => $this->faker->dateTimeThisYear(),
            'fee' => fake()->randomFloat(2000, 650, 1500)

        ];
    }
}
