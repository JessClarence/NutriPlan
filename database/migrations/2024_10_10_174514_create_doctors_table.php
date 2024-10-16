<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('condition_type');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('age');
            $table->float('height'); // in cm
            $table->float('weight'); // in kg
            $table->float('bmi')->nullable();
            $table->string('daily_activity');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->date('date_of_admission');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
