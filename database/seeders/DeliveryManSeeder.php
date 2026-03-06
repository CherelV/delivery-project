<?php

namespace Database\Seeders;

use App\Models\DeliveryMan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryManSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5;$i++) {
            $fakeUser = User::factory()->create();
    
            $deliveryMen = DeliveryMan::factory()->create([
                'user_id' => $fakeUser->id
            ]);
        }
    }
}
