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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('address');
            $table->text('problem_description');
            $table->enum('device_type', [
                'coffee_machine',
                'ice_machine',
                'air_conditioner',
                'cooling_system',
                'washing_machine',
                'dishwasher',
                'oven',
                'mixer',
                'stove',
                'other'
            ]);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
