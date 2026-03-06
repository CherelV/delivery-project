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
        Schema::table('deliveries', function (Blueprint $table) {
            $table->dropForeign('deliveries_departure_address_id_foreign');
            $table->dropColumn('departure_address_id');
            $table->dropForeign('deliveries_destination_address_id_foreign');
            $table->dropColumn('destination_address_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deliveries', function (Blueprint $table) {
            $table->foreign('departure_address_id')->references('id')->on('delivery_addresses');
            $table->foreign('destination_address_id')->references('id')->on('delivery_addresses');
        });}
};
