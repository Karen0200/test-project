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
        Schema::create('car_model_mark', function (Blueprint $table) {
            $table->id();
            $table->foreignId("mark_id")->constrained('marks')->onDelete('CASCADE')->onUpdate("CASCADE");
            $table->foreignId("model_id")->constrained('car_models')->onDelete('CASCADE')->onUpdate("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mark_model');
    }
};
