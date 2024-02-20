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
        Schema::create('employee_incentive', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('employee_id');
            $table->unsignedBiginteger('incentive_id');
            $table->timestamps(); 
            
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('incentive_id')->references('id')->on('incentives')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_incentive');
    }
};
