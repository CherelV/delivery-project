<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Delivery;
use App\Models\DeliveryMan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $fakeCustomerUser = User::factory()->create();
        // $fakeDeliveryManUser = User::factory()->create();

       


        $deliveries= Delivery::factory(5)->create([
        ]);
    }
}
