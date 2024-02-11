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
        Schema::create('encouragement_personnel', function (Blueprint $table) {
            $table->id();
            $table->integer('encouragement_id');
            $table->integer('personnel_id');
            $table->timestamps(); 
            
            $table->foreign('encouragement_id')->references('id')->on('encouragements')->onDelete('cascade');
            $table->foreign('personnel_id')->references('id')->on('personnel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encouragement_personnel');
    }
};
