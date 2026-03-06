<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Customer::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\DeliveryMan::class)->constrained()->onDelete('cascade');
            $table->string('item_description');
            $table->string('status')->default('pending');
            $table->dateTime('delivered_on');
            $table->double('fee');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
