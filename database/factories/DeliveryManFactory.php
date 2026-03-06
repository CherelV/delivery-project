<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliveryMan>
 */
class DeliveryManFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $vehicleTypes = ['motorcycle', 'car', 'Truck','van'];
        $licenseClasses = ['Class C', 'Class M', 'Class A', 'Class B'];
        return [
            'user_id' => User::factory(),
            'license_number' => Str::random(10),
            'vehicle_type' => $this->faker->randomElement($vehicleTypes),
            'license_class' => $this->faker->randomElement($licenseClasses),
            'number_plate' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{3}[A-Z]{2}'),
        ];
    }
}
